<?php
	//セッションの生成
	session_start();
	
	
	require_once ('conf.php');
	
	//ユーザー名/パスワード
	$user = htmlspecialchars($_POST['user'], ENT_QUOTES);
	$pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);
	
	$result=mysqli_query($sql, "SELECT * From `shop` WHERE shop_id='$user' ORDER by shop_id");
while($row=mysqli_fetch_assoc($result)){
include('../../master_admin/parts/basic_hensu.php');

}
	
	
	
	if (($user == $shop_id) && ($pass == $shop_pass)) {
		$login = 'OK';
	} else {
		$login = 'Error';
	}
	
	$_SESSION['login'] = $login;
	
	if ($login == 'OK') {
		header("Location: login_top.php?shop_id=$shop_id");
	} else {
		header('Location: error_login.php');
	}
?>