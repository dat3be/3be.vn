<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';


$date = date('h:i d-m-Y', $now);
$user = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ")->fetch_array();
$username = antixss($_POST['username']);
$idtele = antixss($_POST['idtele']);
if($username==""){
    $response = array('success' => false, 'message' => 'Đăng nhập để thực hiện tính năng này');
}elseif($_POST['idtele'] == '') {
       $response =  array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin');
}else {

          
          $check_money = $ketnoi->query("UPDATE `users` SET `id_tele` = '$idtele' WHERE `username` = '".$username."' ");
          if($check_money){
          $response = array('success' => true);
          }
      }

// Trả về kết quả dưới dạng JSON
echo json_encode($response);

?>