<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once '../conf.php';

//ファンクションファイル読み込み
require_once '../parts/function.php';


$no = $_GET['no'];

$result=mysqli_query($sql, "SELECT * From `shop_tb` WHERE `no` = '$no'");
while($row=mysqli_fetch_assoc($result)){
include('../parts/basic_hensu.php');
	
include('../parts/area_link_job.php');
}

?><!doctype html>
<html lang="ja"><head>
<meta charset="utf-8">
<title>キャスト設定｜Admin Tool</title>
<meta name="description" content="管理画面ツール　キャスト設定">

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
			<h2><?php echo $s_name; ?><br /><span style="font-size: 70%;">キャスト設定</span></h2>
			<div class="page_base_in">
				<div class="page_base_box">
					<h3>新しいキャストを登録</h3>
					<div class="button_area_2"><a href="cast_new.php?no=<?php echo $no; ?>" class="btn_main">新規キャスト登録</a></div>
				</div>
				<div class="page_base_box_2">				
					<h3>キャスト一覧</h3>
					<div class="cast_people">現在のキャスト登録数<br />「<?php

$result=mysqli_query($sql2, "SELECT * From `data` WHERE yobi1='$data5' ORDER by id");
$cnt=mysqli_num_rows($result);


echo $cnt;

if ($cnt == '0') {
	echo '0';
}
?>名」</div>
					<div class="wrapper">
						<?php
						
$j=100;
$k=200;	
						
while($row=mysqli_fetch_assoc($result)){
//include('parts/basic_hensu.php');
include('../parts/basic_hensu2.php');
include('../parts/starttime_conversion2.php');	/* 出勤開始時間を変換 */
include('../parts/schetime.php');
$id = $row['id'];

//▽表示内容ここから

echo "<div class=\"element_cast\"><div class=\"top_cast_box\"><div class=\"top_cast_box_in\"><div class=\"photo_thumbs\">\n";

	

	//写真を表示
	
if($sphoto10 == $empty){
	//写真を表示
if($photo10 == $empty){
	echo "<img src=\"\" data-src=\"img/nophoto_1.jpg\" class=\"lozad\" alt=\"".$name."\">\n";
}else{
	echo "<img src=\"https://www.caba-web.com/client_admin/".$photo10.".jpg\" alt=\"".$name."\"/>\n";
}
}else{
	if($photo10 == $empty){
	echo "<img src=\"https://www.caba-web.com/client_admin/".$sphoto10.".jpg\" alt=\"".$name."\"/>\n";
}else{
	echo "<img src=\"https://www.caba-web.com/client_admin/".$photo10.".jpg\" alt=\"".$name."\"/>\n";
}

}			
	
echo "</div>";
	
	if($option2==''){
	echo '';
}else{
	echo '<div class="fa_insta"><img src="" data-src="img/cast_instagram.svg" class="lozad"></div>';
}
	if($option4==''){
	echo '';
}else{
	echo '<div class="fa_youtube"><img src="" data-src="img/cast_youtube.svg" class="lozad"></div>';
}
	//出勤データの有効・無効
    $getdays=getDays($tdy_8dig,$yobi7);
    //本日の出勤
      //▽表示内容ここから
      if($getdays<1){
        if($yobi9==$edi){
        if ($yotei1 == '3' || $yotei1 == '1') {
          echo '<div class="fa_schedule"><img src="" data-src="img/cast_schedule.svg" class="lozad"></div>';
        }else{
          echo '';
        }
        }else{
          echo '';
        }
      }else{
        if($yotei1 == '3' || $yotei1 == '1') {
          echo '<div class="fa_schedule"><img src="" data-src="img/cast_schedule.svg" class="lozad"></div>';
        }else{
          echo '';
        }
      }
	
echo "<p>".$name."</p></div><div class=\"top_cast_box_button\">";
		
if($option1=='1'){
	echo '<div class="top_cast_hyouji">公開中</div>';
}elseif($option1=='2'){
	echo '<div class="top_cast_hyouji_no">非公開</div>';
}else{
	echo '<div class="top_cast_hyouji">公開中</div>';
}
	

//写真登録・編集削除画面へ
echo <<<GOLGO
									<div class="top_cast_box_button_b"><a href="https://www.nightgram.com/$blank5/$area_link/shop/prof.php?name2=$name2" class="btn_sub" target="_blank">プロフィール確認</a></div>
									<div class="top_cast_box_button_a"><a href="cast_edit.php?name2=$name2" class="btn_sub">編集</a></div>
									<div class="top_cast_box_button_a"><a href="cast_photo.php?name2=$name2" class="btn_sub">写真設定</a></div>
									<div class="top_cast_box_button_a"><a data-target="modal_display_$name2" class="btn_sub modal_open">公開設定</a></div>
									<div class="top_cast_box_button_a"><a data-target="modal_delete_$name2" class="btn_sub modal_open">削除</a></div>
									<div class="clear"></div>									
								</div>
								<div id="modal_display_$name2" class="modal_box">
									<p>
									<div class="modal_box_title">キャストの公開設定</div>
									<div class="cast_sakujyo"></div>
									<form action="cast_rewrite2.php" method="post">
										<input type="hidden" name="name2" value="$name2" />
										<input type="hidden" name="yobi1" value="$yobi1" />
										<input type="hidden" name="no" value="$no" />
										<input type="hidden" name="operation" value="edit" />
										<table>
											<tr>
												<td class="t_hyouji-1"><input type="radio" name="option1" value="2" class="radio-input" id="radio-$j" checked=""><label for="radio-$j">非公開</label></td>
												<td class="t_hyouji-2"><input type="radio" name="option1" value="1" class="radio-input" id="radio-$k" checked="checked"><label for="radio-$k">公開</label></td>
											</tr>
										</table>
										<div class="under_button_area_2">
											<button type="submit" class="formbtn_2">送信</button>
										</div>
									</form>
									</p>
								<p><a class="modal_close"><i class="zmdi zmdi-close">✕<br></i></a></p>
							</div>
							<div id="modal_delete_$name2" class="modal_box">
								<p>
								<div class="modal_box_title">キャストを削除</div>
								<div class="cast_sakujyo">本当に削除しますか？</div>
								<div class="under_button_area_2"><a href="cast_rewrite3.php?name2=$name2&id=$id&name=$name&yobi1=$yobi1&option2=$option2&option4=$option4" class="formbtn_2">削除する</a></div>
								</p>
							<p><a class="modal_close"><i class="zmdi zmdi-close">✕<br></i></a></p>
						</div>
					</div>
				</div>


GOLGO;
	
$j++;
$k++;
}
?>
				  </div>		
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
<!--モーダル　プラグイン-->
<script>
$(function(){
   
  // 「.modal_open」をクリックしたらモーダルと黒い背景を表示する
  $('.modal_open').click(function(){
 
    // 黒い背景をbody内に追加
    $('body').append('<div class="modal_bg"></div>');
    $('.modal_bg').fadeIn();
 
    // data-targetの内容をIDにしてmodalに代入
    var modal = '#' + $(this).attr('data-target');
 
    // モーダルをウィンドウの中央に配置する
    function modalResize(){
        var w = $(window).width();
        var h = $(window).height();
 
        var x = (w - $(modal).outerWidth(true)) / 2;
        var y = (h - $(modal).outerHeight(true)) / 2;
 
        $(modal).css({'left': x + 'px','top': y + 'px'});
    }
 
    // modalResizeを実行
    modalResize();
 
    // modalをフェードインで表示
    $(modal).fadeIn();
 
    // .modal_bgか.modal_closeをクリックしたらモーダルと背景をフェードアウトさせる
    $('.modal_bg, .modal_close').off().click(function(){
        $('.modal_box').fadeOut();
        $('.modal_bg').fadeOut('slow',function(){
            $('.modal_bg').remove();
        });
    });
 
    // ウィンドウがリサイズされたらモーダルの位置を再計算する
    $(window).on('resize', function(){
        modalResize();
    });
 
    // .modal_switchを押すとモーダルを切り替える
    $('.modal_switch').click(function(){
 
      // 押された.modal_switchの親要素の.modal_boxをフェードアウトさせる
      $(this).parents('.modal_box').fadeOut();
 
      // 押された.modal_switchのdata-targetの内容をIDにしてmodalに代入
      var modal = '#' + $(this).attr('data-target');
 
      // モーダルをウィンドウの中央に配置する
      function modalResize(){
          var w = $(window).width();
          var h = $(window).height();
 
          var x = (w - $(modal).outerWidth(true)) / 2;
          var y = (h - $(modal).outerHeight(true)) / 2;
 
          $(modal).css({'left': x + 'px','top': y + 'px'});
      }
 
      // modalResizeを実行
      modalResize();
 
      $(modal).fadeIn();
 
      // ウィンドウがリサイズされたらモーダルの位置を再計算する
      $(window).on('resize', function(){
          modalResize();
      });
    });
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