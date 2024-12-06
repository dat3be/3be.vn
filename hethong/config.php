<?php
session_start();
$khangapi_local   = 'localhost';
$khangapi_ten     = 'hu9kxplf50ot_dichvumight';//user
$khangapi_matkhau = 'hu9kxplf50ot_dichvumight';//pass
$khangapi_dulieu  = 'hu9kxplf50ot_dichvumight';//database
$ketnoi = @mysqli_connect($khangapi_local,$khangapi_ten,$khangapi_matkhau,$khangapi_dulieu) or die("Error => DATABASE");
@mysqli_set_charset($ketnoi,"utf8");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$_SESSION['session_request'] = time();
$time = date('h:i d-m-Y');
$chinhapi = $ketnoi->query("SELECT * FROM `setting` ")->fetch_array();
include_once('SMTP/class.smtp.php');
include_once('SMTP/PHPMailerAutoload.php');
include_once('SMTP/class.phpmailer.php');

if(isset($_SESSION['session'])) {
$session = $_SESSION['session'];
$user = $ketnoi->query("SELECT * FROM `users` WHERE `session` = '$session' ")->fetch_array();
$username = $user['username'];
if(empty($user['id'])) {
session_start();
session_destroy();
header('location: /');
}
    if($user['bannd'] == 1) {
    session_start();
    session_destroy();
    header('location: /band.php');
    }
    if($user['level'] == 9) {
    $_SESSION['admin'] = $username;
    }else{
    unset($_SESSION['admin']);
    }
}


if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  
$ip_address = $_SERVER['HTTP_CLIENT_IP'];  
} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];  
} else {  
$ip_address = $_SERVER['REMOTE_ADDR'];  
}
//Mail auto
$smtp_server = $chinhapi['smtp'];
$smtp_port = $chinhapi['port_smtp'];
$site_gmail_momo = $chinhapi['email_auto']; // NHẬP ĐỊA CHỈ EMAIL CỦA BẠN TẠI ĐÂY
$site_pass_momo = $chinhapi['pass_mail_auto']; // NHẬP MK EMAIL CỦA BẠN TẠI ĐÂY
function sendCSM($mail_nhan,$ten_nhan,$chu_de,$noi_dung,$bcc)
{
    global $site_gmail_momo, $site_pass_momo,$smtp_server,$smtp_port;
        // PHPMailer Modify
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail ->Debugoutput = "html";
        $mail->isSMTP();
        $mail->Host = $smtp_server;
        $mail->SMTPAuth = true;
        $mail->Username = $site_gmail_momo; // GMAIL STMP
        $mail->Password = $site_pass_momo; // PASS STMP
        $mail->SMTPSecure = 'tls';
        $mail->Port = $smtp_port;
        $mail->setFrom($site_gmail_momo, $bcc);
        $mail->addAddress($mail_nhan, $ten_nhan);
        $mail->addReplyTo($site_gmail_momo, $bcc);
        $mail->isHTML(true);
        $mail->Subject = $chu_de;
        $mail->Body    = $noi_dung;
        $mail->CharSet = 'UTF-8';
        $send = $mail->send();
        return $send;
}
function hideName($name) {
    $length = strlen($name);
    
    // Kiểm tra nếu chiều dài tên ngắn hơn hoặc bằng 4, không cần ẩn
    if ($length <= 4) {
        return $name;
    }

    // Lấy 4 ký tự đầu tiên của tên
    $firstPart = substr($name, 0, 4);

    // Tạo chuỗi với ký tự '*' nằm sau
    $hiddenPart = str_repeat('*', $length - 4);

    // Kết hợp phần đầu và phần ẩn
    $hiddenName = $firstPart . $hiddenPart;

    return $hiddenName;
}
function checkmien($domain)
{
$url = 'https://tenten.vn/api/check/?domain='.$domain;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
return json_decode($data, true);
}
function ngay($date) {
    return date('h:i d-m-Y', $date);
}
function giftcode($code, $type)
{
    global $ketnoi;
    
    // Kiểm tra xem mã giảm giá có tồn tại và có sẵn để sử dụng không
    $check = $ketnoi->query("SELECT * FROM `gift_code` WHERE `giftcode` = '$code' AND `type` = '$type' AND `soluong` > `dadung` AND `status` = 'ON'")->fetch_array();
    
    if (empty($check)) {
        $giamgia = 0; // Nếu mã giảm giá không hợp lệ hoặc đã hết số lượng, trả về 0
    } else {
        $giamgia = $check['giamgia']; // Nếu mã hợp lệ, trả về mức giảm giá
    }
    
    return $giamgia;
}

function update_code($code)
{
    global $ketnoi;
    
    // Kiểm tra xem mã có tồn tại và có thể cập nhật không
    $check = $ketnoi->query("SELECT * FROM `gift_code` WHERE `giftcode` = '$code' AND `soluong` > `dadung` AND `status` = 'ON'")->fetch_array();
    
    if (!empty($check)) {
        // Nếu mã hợp lệ và chưa hết số lượng, tiến hành cập nhật số lần sử dụng
        $ketnoi->query("UPDATE `gift_code` SET `dadung` = `dadung` + 1 WHERE `giftcode` = '".$code."'");
    } else {
        // Trường hợp không cập nhật được, có thể thêm xử lý tùy theo yêu cầu
        return false;
    }
    
    return true;
}

function dv_the($web_gach_the, $parter)
{
$url = 'https://'.$web_gach_the.'/chargingws/v2/getfee?partner_id='.$parter;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
return json_decode($data, true);
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
function tien($price) {
return str_replace(",", ".", number_format($price));
}
function antixss($data)
{
    // Fix &entity\n;
    $data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
    $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
    $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
    $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

    // Remove any attribute starting with "on" or xmlns
    $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

    // Remove javascript: and vbscript: protocols
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

    // Remove namespaced elements (we do not need them)
    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

    do {
        // Remove really unwanted tags
        $old_data = $data;
        $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
    } while ($old_data !== $data);

    // we are done...
    $xoa = htmlspecialchars(addslashes(trim($data)));

    return $xoa;
}
function random($string, $int) {  
return substr(str_shuffle($string), 0, $int);
}

function capbac($data) {
if($data == 9) {
$show = 'Quản Trị viên';
} elseif($data == 3){
$show = 'Cộng tác viên';
}else {
$show = 'Thành Viên';
}
return $show;
}
function randomip() {
    // Generate four random numbers in the range 1-255
    $octet1 = rand(1, 255);
    $octet2 = rand(1, 255);
    $octet3 = rand(1, 255);
    $octet4 = rand(1, 255);

    // Concatenate the numbers to form the IP address
    $ipAddress = $octet1 . '.' . $octet2 . '.' . $octet3 . '.' . $octet4;

    return $ipAddress;
}
function code($data) {
 if ($data == "thanhcong") {
$show = '<span type="span" class="badge badge-light-success fs-6">Thành Công</span>';
}else if($data == "loi") {
$show = '<span type="span" class="badge badge-light-warning fs-6">Lỗi</span>';
}else if($data == "ON") {
    $show = '<span type="span" class="badge badge-light-success fs-6">ON</span>';
}else if($data == "OFF") {
    $show = '<span type="span" class="badge badge-light-warning fs-6">OFF</span>';
}else{
$show = '<span type="span" class="badge badge-light-danger fs-6">Khác</span>';
}
return $show;
}
function license($data) {
 if ($data == "hoatdong") {
$show = '<span type="span" class="badge badge-light-success fs-6">Hoạt Động</span>';
}else if($data == "gianlan") {
$show = '<span type="span" class="badge badge-light-danger fs-6">Gian Lận</span>';
}else if($data == "tamdung") {
    $show = '<span type="span" class="badge badge-light-warning fs-6">Tạm Dừng</span>';
}else{
$show = '<span type="span" class="badge badge-light-danger fs-6">Khác</span>';
}
return $show;
}

function napthe($data) {
if ($data == "xuly") {
$show = '<span type="span" class="badge badge-light-info fs-6">Đang Xử Lý</span>';
} else if ($data == "hoantat") {
$show = '<span type="span" class="badge badge-light-success fs-6">Thành Công</span>';
} else if($data == "thatbai") {
$show = '<span type="span" class="badge badge-light-danger fs-6">Thất Bại</span>';
} else {
$show = '<span type="span" class="badge badge-light-warning fs-6">Khác</span>';
}
return $show;
}
function status($data) {
    if ($data == "xuly") {
    $show = '<span type="span" class="badge badge-light-info fs-6">Đang Xử Lý</span>';
    } else if ($data == "dangtao") {
    $show = '<span type="span" class="badge badge-light-primary fs-6">Đang Tạo</span>';
    } else if ($data == "hoatdong") {
    $show = '<span type="span" class="badge badge-light-success fs-6">Hoạt Động</span>';
    } else if ($data == "hoantat") {
    $show = '<span type="span" class="badge badge-light-success fs-6">Thành Công</span>';
    }else if ($data == "ON") {
    $show = '<span type="span" class="badge badge-light-success fs-6">ON</span>';
    } else if($data == "OFF") {
    $show = '<span type="span" class="badge badge-light-warning fs-6">OFF</span>';
    } else if($data == "KHOA") {
    $show = '<span type="span" class="badge badge-light-danger fs-6">KHOÁ</span>';
    }else if($data == "loi") {
    $show = '<span type="span" class="badge badge-light-danger fs-6">LỖI</span>';
    }else if($data == "hethan") {
    $show = '<span type="span" class="badge badge-light-danger fs-6">HẾT HẠN</span>';
    }else if($data == "xoa") {
    $show = '<span type="span" class="badge badge-light-danger fs-6">Xoá</span>';
    }else if($data == "thatbai") {
    $show = '<span type="span" class="badge badge-light-danger fs-6">Thất Bại</span>';
    } elseif($data == "tamkhoa") {
    $show = '<span type="span" class="badge badge-light-warning fs-6">Tạm Khoá</span>';
    }else {
    $show = '<span type="span" class="badge badge-light-warning fs-6">Khác</span>';
    }
    return $show;
    }
function host($data) {
if ($data == "xuly") {
$show = '<span type="span" class="badge badge-light-info fs-6">Đang Xử Lý</span>';
} else if ($data == "hoatdong") {
$show = '<span type="span" class="badge badge-light-success fs-6">Hoạt Động</span>';
} else if($data == "reset") {
$show = '<span type="span" class="badge badge-light-warning fs-6">Reset</span>';
}else if($data == "tamkhoa") {
$show = '<span type="span" class="badge badge-light-warning fs-6">Tạm Khoá</span>';
}else if($data == "dangtao") {
$show = '<span type="span" class="badge badge-light-primary fs-6">Đang Tạo</span>';
}else if($data == "xoa") {
$show = '<span type="span" class="badge badge-light-danger fs-6">Đang Xoá</span>';
} else if($data == "daxoa") {
$show = '<span type="span" class="badge badge-light-danger fs-6">Đã Xoá</span>';
} else if($data == "huy") {
$show = '<span type="span" class="badge badge-light-warning fs-6">Đã Hủy Và Hoàn Tiền.</span>';
} else if($data == "loi") {
$show = '<span type="span" class="badge badge-light-danger fs-6">Lỗi!!!</span>';
} else if($data == "dangxuly") {
$show = '<span type="span" class="badge badge-light-info fs-6">Đang Xử Lý</span>';
} else if($data == "choxuly") {
$show = '<span type="span" class="badge badge-light-primary fs-6">Chờ Xử Lý</span>';
} else if($data == "hoantat") {
$show = '<span type="span" class="badge badge-light-success fs-6">Thành Công</span>';
} else {
$show = '<span type="span" class="badge badge-light-danger fs-6">Khác</span>';
}
return $show;
}
function bannd($data) {
if ($data == 0) {
$show = '<span type="span" class="btn btn-success">Hoạt Động</span>';
} else if($data == 1) {
$show = '<span type="span" class="btn btn-danger">Band</span>';
} else {
$show = '<span type="span" class="btn btn-info">Khác</span>';
}
return $show;
}
function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/',' ', $text));
}
function xoadau($strTitle) {
$strTitle=strtolower($strTitle);
$strTitle=trim($strTitle);
$strTitle=str_replace(' ','-',$strTitle);
$strTitle=preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/",'o',$strTitle);
$strTitle=preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/",'o',$strTitle);
$strTitle=preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/",'a',$strTitle);
$strTitle=preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/",'a',$strTitle);
$strTitle=preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/",'e',$strTitle);
$strTitle=preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/",'e',$strTitle);
$strTitle=preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/",'u',$strTitle);
$strTitle=preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/",'u',$strTitle);
$strTitle=preg_replace("/(ì|í|ị|ỉ|ĩ)/",'i',$strTitle);
$strTitle=preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/",'i',$strTitle);
$strTitle=preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/",'y',$strTitle);
$strTitle=preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/",'y',$strTitle);
$strTitle=str_replace('đ','d',$strTitle);
$strTitle=str_replace('Đ','d',$strTitle);
$strTitle=preg_replace("/[^-a-zA-Z0-9]/",'',$strTitle);
return $strTitle;
}
function parse_order_id($des, $MEMO_PREFIX)
{
    $re = '/'.$MEMO_PREFIX.'\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0) {
        return null;
    }
    // Print the entire match result
    $orderCode = $matches[0][0];
    $prefixLength = strlen($MEMO_PREFIX);
    $orderId = intval(substr($orderCode, $prefixLength));
    return $orderId ;
}

$tele_token = $chinhapi['token_tele'];
$tele_chatid = $chinhapi['id_tele'];
function sendTele($message)
{
    global $tele_token,$tele_chatid;
    $data = http_build_query([
        'chat_id' => $tele_chatid,
        'text' => "🔔 THÔNG BÁO 
📝 Nội dung: " .$message.
              "
🕒 Thời gian: " .
        date('d/m/Y H:i:s'),
    ]);
    $url = 'https://api.telegram.org/bot' . $tele_token . '/sendMessage';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    if ($data) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function sendKh($message,$id_tele)
{
    global $tele_token,$id_tele;
    $data = http_build_query([
        'chat_id' => $id_tele,
        'text' => " " .$message.
                      "
Thời gian: " .
        date('d/m/Y H:i:s'),
    ]);
    $url = 'https://api.telegram.org/bot' . $tele_token . '/sendMessage';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    if ($data) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
?>