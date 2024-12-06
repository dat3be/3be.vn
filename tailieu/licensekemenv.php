$license = $_ENV['LICENSE'];
$lincense = json_decode(checkLicense($license), true);
if ($lincense['status'] !== '200') {
    print_r($lincense['msg']);
    die;
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function checkLicense($license) {
    $curl = curl_init();
    $dataPost = array(
        "type" => "license",
        "domain" => $_SERVER['SERVER_NAME'],
        "key" => $license
    );
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://khocodevip.com/license', 
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $dataPost,
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $status = json_decode($response, true);

    if ($status['status'] == '198') {
        return json_encode(array('status' => '198', 'msg' => 'License của domain đã tạm dừng'));
    } else if ($status['status'] == '100') {
        return json_encode(array('status' => '100', 'msg' => 'License của bạn đã hết hạn sử dụng. Vui lòng gia hạn để tiếp tục sử dụng! Liên hệ Telegram @ndk_vnteam'));
    } else if ($status['status'] == '999') {
        return json_encode(array('status' => '999', 'msg' => 'License và domain không hợp lệ'));
    } else if ($status['status'] == '222') {
        return json_encode(array('status' => '222', 'msg' => 'License và domain đã bị khóa do gian lận'));
    } else if ($status['status'] == '99') {
        return json_encode(array('status' => '99', 'msg' => 'Vui lòng nhập license và domain'));
    } else {
        return json_encode(array('status' => '200', 'msg' => 'Success'));
    }
}