<?php
require $_SERVER['DOCUMENT_ROOT'] . '/hethong/config.php';

$tenmien = antixss($_POST['tenmien']);
$duoimien = antixss($_POST['duoimien']);
$giftcode = antixss($_POST['giftcode']);

$check_mien = $ketnoi->query("SELECT * FROM `khodomain` WHERE `duoimien` = '$duoimien' AND `status`='ON'");
$total_mien = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `history_domain` WHERE `status` = 'hoatdong' AND  `duoimien` = '$duoimien' AND  `tenmien` = '$tenmien'"))['COUNT(*)'];
$discount_data = $ketnoi->query("SELECT * FROM `gift_code` WHERE `type` = 'domain' ")->fetch_array();

if ($username == "") {
    $response = array('success' => false, 'message' => 'Đăng nhập để thực hiện');
} elseif (!$check_mien) {
    $response = array('success' => false, 'message' => 'Lỗi truy vấn cơ sở dữ liệu');
} elseif ($total_mien > 0) {
    $response = array('success' => false, 'message' => 'Tên miền đã tồn tại');
} elseif ($giftcode != "" && giftcode($giftcode, 'domain') == 0) {
    $response = array('success' => false, 'message' => 'Mã giảm giá không hợp lệ');
} elseif ($mien['gia'] <= 0 && $giftcode != "") {
    $response = array('success' => false, 'message' => 'Domain có giá trị 0đ, không áp dụng mã giảm giá');
} elseif ($discount_data['soluong'] <= $discount_data['dadung'] && $giftcode != "") {
    $response = array('success' => false, 'message' => 'Mã bạn nhập đã đến giới hạn!');
} else {
    $mien = $check_mien->fetch_array();
    $tongtien = $mien['gia'] * (1 - (giftcode($giftcode, 'domain') / 100));

    if ($_POST['tenmien'] == "" || $_POST['duoimien'] == "") {
        $response = array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin');
    } elseif (empty($mien)) {
        $response = array('success' => false, 'message' => 'Thông tin không hợp lệ');
    } else {
        $now = time();
        $days_to_add = $mien['thoihan'];
        $het = $now + $days_to_add * 24 * 60 * 60;

        if ($user['money'] < $tongtien) {
            $response = array('success' => false, 'message' => 'Số dư không đủ ' . tien($tongtien));
        } else {
            if ($mien['zone_id'] == "") {
                $domain = $tenmien . $duoimien;
                $checkmien = checkmien($domain);
                if ($checkmien != 1) {
                    $response = array('success' => false, 'message' => 'Tên miền đã được bán, hãy chọn miền khác');
                } else {
                    $api_key = $chinhapi['api_cf'];
                    $email = $chinhapi['email_cf'];
                    $api_url = "https://api.cloudflare.com/client/v4/zones";
                    $data = [
                        'name' => $domain,
                        'jump_start' => true,
                    ];

                    $headers = [
                        'X-Auth-Email: ' . $email,
                        'X-Auth-Key: ' . $api_key,
                        'Content-Type: application/json',
                    ];

                    $ch = curl_init($api_url);

                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                    $response_curl = curl_exec($ch);
                    curl_close($ch);

                    if (curl_errno($ch)) {
                        $response = array('success' => false, 'message' => 'Lỗi cURL: ' . curl_error($ch));
                    } else {
                        $decoded_response = json_decode($response_curl, true);

                        if (isset($decoded_response['success']) && $decoded_response['success']) {
                            $nameservers = $decoded_response['result']['name_servers'];
                            $nameservers_formatted = implode("\n", $nameservers);
                            $zone_id = $decoded_response['result']['id'];

                            $toz = $ketnoi->query("INSERT INTO `history_domain` SET 
                                `username` = '$username',
                                `tenmien` = '$tenmien',
                                `duoimien` = '$duoimien',
                                `zone_id` = '$zone_id',
                                `nameserver` = '$nameservers_formatted',
                                `ngaymua` = '$now',
                                `ngayhet` = '$het',
                                `status` = 'xuly'");
                            sendTele($username . " Đã Đăng Kí Miền " . $domain . " Thành Công Trạng Thái Đang Xử Lý.");
                            $toz = $ketnoi->query("INSERT INTO `lich_su_hoat_dong` SET 
                                `username` = '$username',
                                `hoatdong` = 'Mua domain',
                                `gia` = '" . $tongtien . "',
                                `time` = '" . $time . "' ");
                            $newmoney = $user['money'] - $tongtien;
                            $check_money = $ketnoi->query("UPDATE `users` SET `money` = '$newmoney' WHERE `username` = '" . $username . "'");

                            $response = array('success' => true, 'message' => 'Mua Thành Công, Vui Lòng Đợi Kích Hoạt');
                        } else {
                            $response = array('success' => false, 'message' => 'Lỗi: ' . $decoded_response['errors'][0]['message']);
                        }
                    }
                }
            } else {
                $name = $tenmien;
                $api_key = $chinhapi['api_cf'];
                $email = $chinhapi['email_cf'];
                $zone_id = $mien['zone_id'];
                $content = randomip();
                $type = 'A';

                $data = array(
                    'type' => $type,
                    'name' => $name,
                    'content' => $content,
                    'ttl' => 1,
                    'proxied' => true
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "X-Auth-Email: {$email}",
                    "X-Auth-Key: {$api_key}",
                    "Content-Type: application/json"
                ));

                $response_curl = curl_exec($ch);
                curl_close($ch);

                $result = json_decode($response_curl, true);

                if (isset($result['success']) && $result['success']) {
                    $miens = $ketnoi->query("INSERT INTO `history_domain` SET 
                        `username` = '$username',
                        `tenmien` = '$tenmien',
                        `duoimien` = '$duoimien',
                        `zone_id` = '$zone_id',
                        `nameserver` = '',
                        `ngaymua` = '$now',
                        `ngayhet` = '$het',
                        `status` = 'xuly'");
                    sendTele($username . " Đăng Kí Subdomain Thành Công.");
                    $mien_hs = $ketnoi->query("SELECT * FROM `history_domain` WHERE `tenmien` = '$tenmien' AND `duoimien` = '$duoimien' AND `username` = '$username' ")->fetch_array();

                    $record_id = $result['result']['id'];

                    $toz = $ketnoi->query("INSERT INTO `list_record_domain` SET 
                        `id_domain` = '" . $mien_hs['id'] . "',
                        `type` = '$type',
                        `name` = '$name',
                        `content` = '$content',
                        `record_id` = '$record_id',
                        `time` = '$now' ");
                    $toz = $ketnoi->query("INSERT INTO `lich_su_hoat_dong` SET 
                        `username` = '$username',
                        `hoatdong` = 'Mua subdomain',
                        `gia` = '" . $tongtien . "',
                        `time` = '" . $time . "' ");
                   
                     $response = array('success' => true, 'message' => 'Mua Hàng Thành Công');
                } else {
                    $response = array('success' => false, 'message' => 'Lỗi: ' . $result['errors'][0]['message']);
                }
            }
        }
    }
}

echo json_encode($response);
?>