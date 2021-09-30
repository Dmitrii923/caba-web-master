<?php
//セッションの復元
session_start();

	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';

$master_id = $_GET['master_id'];

$result=mysqli_query($sql, "SELECT * From `shop` WHERE `master_id` = '$master_id'");
while($row=mysqli_fetch_assoc($result)){
include('../cabaweb_master_admin/parts/basic_hensu.php');
}

//フォームからデータ受け取り
$news_id = $_POST['news_id'];
$news_no = $_POST['news_no'];
$start = htmlspecialchars($_POST['start'],ENT_QUOTES);
$end = htmlspecialchars($_POST['end'],ENT_QUOTES);
$sort = $_POST['start'];
$sort2 = $_POST['end'];
$time = $_POST['start'];
$newstitle = htmlspecialchars($_POST['newstitle'],ENT_QUOTES);
$input = htmlspecialchars($_POST['input'],ENT_QUOTES);
$photo1 = htmlspecialchars($_POST['photo1'],ENT_QUOTES);
$jpeg = htmlspecialchars($_POST['jpeg'],ENT_QUOTES);
$link = htmlspecialchars($_POST['link'],ENT_QUOTES);
$blank = $_POST['blank'];
$hotnews = $_POST['hotnews'];
$sort_order = $_POST['sort_order'];
$n_area = $_POST['n_area'];
$n_area2 = $_POST['n_area2'];
$n_gyoushu = $_POST['n_gyoushu'];
$n_link = $_POST['n_link'];

//データを整形
$input = mb_convert_kana($input,'KaV','utf-8');

//追加
$input = str_replace('\\' , '' , $input);
//改行コードの前に改行タグを入れる
$input = nl2br($input);
//改行コードを削除
$input = str_replace("\r\n" , "" , $input);

$sort = str_replace('/' , '' , $sort);
$sort = str_replace('(' , '' , $sort);
$sort = str_replace(')' , '' , $sort);
$hankaku1 = preg_replace('/[^0-9a-zA-Z]/', '', $sort);
$sort2 = str_replace('/' , '' , $sort2);
$sort2 = str_replace('(' , '' , $sort2);
$sort2 = str_replace(')' , '' , $sort2);
$hankaku2 = preg_replace('/[^0-9a-zA-Z]/', '', $sort2);

$y = substr($hankaku1,0,4);
$m = substr($hankaku1,4,2);
$d = substr($hankaku1,-2);

$m = (int)$m;
$d = (int)$d;
$sort2 = $y.$m.$d;
?><!doctype html>
<html lang="ja"><head>
<meta charset="utf-8">
<title>イベント確認｜Admin Tool</title>
<meta name="description" content="管理画面ツール　イベント確認">

<link rel="shortcut icon" href="img/favicon.ico">
<link rel="apple-touch-icon" href="img/iphone.jpg">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/drawer.min.css">
<link rel="stylesheet" href="css/animate.min.css">
	
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<link rel="canonical" href="">

<meta name="robots" content="noindex,nofollow">

</head>

<body>
	<div id="top_fade">		
	<div class="drawer drawer--left">
		<?php include ('php/header.php'); ?>
		
		<div id="page_base">
			<h2>イベント確認</h2>
			<div class="page_base_in">
				<div class="page_base_box_2">
					<div class="attention_1">
						最後に必ず「登録」ボタンを押して下さい。<br />
						「登録」ボタンを押さないと反映されません。
					</div>
					<form action="event_write.php" method="post" id="form" enctype="multipart/form-data">
						<p>
							<label>
								<span>■イベントカテゴリ</span>
								<span style="font-size: 80%; color: #4D4D4D;"><?php 
  if($link=='2'){
	echo "Event";
	}elseif($link=='3'){
	  echo "Closed";
	}elseif($link=='4'){
	  echo "Birthday";
	}else{
	echo "";
	}
   ?></span>
							</label>
						</p>
						<p>
							<label>
								<span>■イベント日</span>
								<span style="font-size: 80%; color: #4D4D4D;"><?php echo $start; ?></span>
							</label>
						</p>						
						<p>
							<label>
								<span>■タイトル</span>
								<span style="font-size: 80%; color: #4D4D4D;"><?php echo $newstitle; ?></span>
							</label>
						</p>
						<p>
							<label>
								<span>■内容</span>
								<span style="font-size: 80%; color: #4D4D4D;">
									<?php echo $input; ?></span>
							</label>
						</p>
						<input type="hidden" name="news_id" value="<?php echo $news_id; ?>" />
							<input type="hidden" name="news_no" value="<?php echo $news_no; ?>" />
<input type="hidden" name="start" value="<?php echo $start; ?>" />
<input type="hidden" name="end" value="<?php echo $end; ?>" />
<input type="hidden" name="sort" value="<?php echo $hankaku1; ?>" />
<input type="hidden" name="sort2" value="<?php echo $sort2; ?>" />
<input type="hidden" name="time" value="<?php
if($wdate == $empty){
	echo date('Y.m.d / G:i');
}else{
	echo $wdate;
}
?>" />
							<input type="hidden" name="newstitle" value="<?php echo $newstitle; ?>" />
<input type="hidden" name="input" value="<?php echo $input; ?>" />
<input type="hidden" name="photo1" value="<?php echo $photo1; ?>" />
<input type="hidden" name="jpeg" value="<?php echo $jpeg; ?>" />
<input type="hidden" name="link" value="<?php echo $link; ?>" />
<input type="hidden" name="blank" value="<?php echo $blank; ?>" />
<input type="hidden" name="hotnews" value="<?php echo $hotnews; ?>" />
		<input type="hidden" name="sort_order" value="<?php echo $sort_order; ?>" />
		<input type="hidden" name="n_area" value="<?php echo $n_area; ?>" />
		<input type="hidden" name="n_area2" value="<?php echo $n_area2; ?>" />
		<input type="hidden" name="n_gyoushu" value="<?php echo $n_gyoushu; ?>" />
							<input type="hidden" name="n_link" value="<?php echo $n_link; ?>" />
							<input type="hidden" name="master_id" value="<?php echo $master_id; ?>" />
						<div class="under_button_area_2">
							<button type="submit" class="formbtn_2">登録する</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php include ('php/footer.php'); ?>
	
	</div><!--drawer drawer--left-->
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!--ヘッダー-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/js/drawer.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
<!--ヘッダー　プラグイン-->
<script>
 $(document).ready(function() {
   $('.drawer').drawer();
 });
</script>
<!--サイド　プラグイン-->
<script>
$(function() {
var topBtn = $('#page-top');	
topBtn.hide();
//スクロールが100に達したらボタン表示
$(window).scroll(function () {
　if ($(this).scrollTop() > 100) {
　　topBtn.fadeIn();}
 　　　else { topBtn.fadeOut();
	}
	});
//スクロールしてトップ
    topBtn.click(function () {
	$('body,html').animate({
	scrollTop: 0}, 500);
		return false;
    });
});
</script>	
</body>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script>
const observer = lozad('.lozad', {
    rootMargin: '50%',
});
observer.observe();
</script>
</html>