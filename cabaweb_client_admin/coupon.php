<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';

//ファンクションファイル読み込み
require_once '../cabaweb_master_admin/parts/function.php';

$master_id = $_GET['master_id'];

$result=mysqli_query($sql, "SELECT * From `shop` WHERE `master_id` = '$master_id'");
while($row=mysqli_fetch_assoc($result)){
include('../cabaweb_master_admin/parts/basic_hensu.php');
}

?><!doctype html>
<html lang="ja"><head>
<meta charset="utf-8">
<title>クーポン設定｜Admin Tool</title>
<meta name="description" content="管理画面ツール　クーポン設定">

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
				<h2>クーポン設定</h2>
				<div class="page_base_in">
					<div class="page_base_box">
						<h3>新規クーポンを登録</h3>
						<div class="button_area_2"><a href="coupon_new.php?master_id=<?php echo $master_id; ?>" class="btn_main">クーポンを登録する</a></div>
					</div>
					<div class="page_base_box_2">
						<h3>クーポン一覧</h3>
						<div class="attention_1">
							有効期限を過ぎると自動的に削除されます。
						</div>
						
						<?php
  $result=mysqli_query($sql, "SELECT * From `coupon` WHERE coupon_shop='$login_id' AND `coupon2` >=$news_today ORDER by coupon_id DESC");
$cnt=mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result)){
include('../cabaweb_master_admin/parts/basic_hensu6.php');

//▽表示内容ここから
	
	$coupon_day = date("Y年m月d日",strtotime("$coupon2"));

echo "<div class=\"coupon_page_ticket_box_base\">
      <div class=\"coupon_page_ticket_box\">
        <div class=\"coupon_page_ticket_box_1\">".$coupon1."</div>
        <div class=\"coupon_page_ticket_box_2\">有効期限：".$coupon_day."まで</div>
        <div class=\"coupon_page_ticket_box_3\">
        ".$coupon3."
        </div>\n";

echo "<div class=\"wrapper\">
      <div class=\"element_calendar\">
        <a href=\"coupon_edit.php?coupon_id=".$coupon_id."\" class=\"btn_sub\">クーポンを編集</a>
      </div>
      <div class=\"element_calendar\">
        <a data-target=\"modal".$coupon_id."\" class=\"btn_sub modal_open\">クーポンを削除</a>
      </div>
      <div class=\"clear\"></div>\n";

echo "<div id=\"modal".$coupon_id."\" class=\"modal_box\">          
          <p>
            <div class=\"castschedule_modal_box_title\">クーポンを削除</div>
            <div class=\"cast_sakujyo\">本当に削除しますか？</div>
            <div class=\"under_button_area_2\"><a href=\"coupon_rewrite2.php?coupon_id=".$coupon_id."&master_id=".$master_id."\" class=\"formbtn_2\">削除する</a></div>
          </p>
          <p><a class=\"modal_close\"><i class=\"zmdi zmdi-close\">✕<br></i></a></p>
        </div>
      <!--モーダル1--> 
    </div>\n";

echo "</div></div>";
}

	
?>					
					
					</div>
				
				</div>
			</div>
			<?php include ('php/footer.php'); ?>
		</div>
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