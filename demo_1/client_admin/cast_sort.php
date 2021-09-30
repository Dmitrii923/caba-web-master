<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';
	
	$id = $_POST['id'];
	$name2 = $_POST['name2'];
	
$shop_id = $_GET['shop_id'];

$result=mysqli_query($sql, "SELECT * From `shop` WHERE `shop_id` = '$shop_id'");
while($row=mysqli_fetch_assoc($result)){
include('../master_admin/parts/basic_hensu.php');
}

?><!doctype html>
<html lang="ja"><head>
<meta charset="utf-8">
<title>キャスト並び替え｜Admin Tool</title>
<meta name="description" content="管理画面ツール　キャスト並び替え">

<link rel="shortcut icon" href="img/favicon.ico">
<link rel="apple-touch-icon" href="img/iphone.jpg">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/drawer.min.css">

<link href="https://fonts.googleapis.com/earlyaccess/sawarabigothic.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<link rel="canonical" href="">

<meta name="robots" content="noindex,nofollow">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<!--ヘッダー-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/js/drawer.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
<!--ヘッダー-->
<!--ソータブル-->
<link href="sortable/css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="sortable/js/jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="sortable/js/jquery-ui-1.8.21.custom.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.touch-punch.js"></script>
<style type="text/css">

#order_list {
	cursor: move;
}

.hover {
	background: #808080;
}
</style>
	<!--ソータブル-->
<!--画像調整-->
<script>
$(document).ready(function () {
    var imgWidth = $(".top_cast_box_wrap").width();
    var imgheight = (imgWidth*1.0);
    $(".top_cast_box_wrap").css('height',imgheight);
});
$(window).resize(function () {  
    var imgWidth = $(".top_cast_box_wrap").width();
    var imgheight = (imgWidth*1.0);
    $(".top_cast_box_wrap").css('height',imgheight);
});
</script>
<!--画像調整-->

<!--ヘッダー　プラグイン-->
<script>
 $(document).ready(function() {
   $('.drawer').drawer();
 });
</script>

<script>
$(function() {
  var $win = $(window),
      $header = $('#global'),
      headerHeight = $header.outerHeight(),
      startPos = 0;

  $win.on('load scroll', function() {
    var value = $(this).scrollTop();
    if ( value > startPos && value > headerHeight ) {
      $header.css('top', '-' + headerHeight + 'px');
    } else {
      $header.css('top', '0');
    }
    startPos = value;
  });
});
</script>

<script>
$(function() {
  var $win = $(window),
      $header = $('.drawer-hamburger'),
      headerHeight = $header.outerHeight(),
      startPos = 0;

  $win.on('load scroll', function() {
    var value = $(this).scrollTop();
    if ( value > startPos && value > headerHeight ) {
      $header.css('top', '-' + headerHeight + 'px');
    } else {
      $header.css('top', '0');
    }
    startPos = value;
  });
});
</script>

<script>
$(function() {
  var $win = $(window),
      $header = $('.header_space'),
      headerHeight = $header.outerHeight(),
      startPos = 0;

  $win.on('load scroll', function() {
    var value = $(this).scrollTop();
    if ( value > startPos && value > headerHeight ) {
      $header.css('top', '-' + headerHeight + 'px');
    } else {
      $header.css('top', '0');
    }
    startPos = value;
  });
});
</script>
<!--ヘッダー　プラグイン-->

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
<!--サイド　プラグイン-->

<script>
$(document).ready(function () {
  $(".file").on('change', function(){
     var fileprop = $(this).prop('files')[0],
         find_img = $(this).parent().find('img'),
         filereader = new FileReader(),
         view_box = $(this).parent('.view_box');
    
    if(find_img.length){
       find_img.nextAll().remove();
       find_img.remove();
    }
    
    var img = '<div class="img_view"><img alt="" class="img contain"><p><a href="#" class="img_del">画像を削除</a></p></div>';
    
    view_box.append(img);
    
    filereader.onload = function() {
      view_box.find('img').attr('src', filereader.result);
      img_del(view_box);
    }
    filereader.readAsDataURL(fileprop);
  });
  
  function img_del(target){
    target.find("a.img_del").on('click',function(){
      var self = $(this),
          parentBox = self.parent().parent().parent();
      if(window.confirm('画像を削除します。\nよろしいですか？')){
        setTimeout(function(){
          parentBox.find('input[type=file]').val('');
          parentBox.find('.img_view').remove();
        } , 0);            
      }
      return false;
    });
  }  
    
});
</script>

</head>

<body>

<div class="drawer drawer--left">

  <?php include ('php/header.php'); ?>

<div id="page_base">
  <h2>キャスト並び替え</h2>
  
<div class="page_base_in">
  
  <div class="page_base_box">
    
  <div class="castsort_attention">
  ※移動させたい人をドラッグ&amp;ドロップをして、確定ボタンを必ず押して下さい。<br />
  <br />
  ※①移動させたい人を押し続ける。 → ②押し続けたまま移動させたい場所まで動かす。 → ③移動させたい場所で離す。 → ④最後に確定ボタンを押す。
  </div>
    
  <div id="castsort_area">
	  <script type="text/javascript">
jQuery.noConflict();

jQuery(function($) {
	$("#order_list").sortable({ 
		items: "li" ,
		hoverClass: "hover" ,
		stop : function(){
			var data=[];
			$("li","#order_list").each(function(i,v){
				data.push(v.id);
			});
			$('#order').val(data.toString());
		},
		update : function(){
			$('#submit').removeAttr('disabled');
		}
	});
});
</script>
    <ul id="order_list">
		<?php
$result=mysqli_query($sql, "SELECT * From `data` WHERE yobi1='$shop_id' ORDER by id");
$cnt=mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result)){
//include('parts/basic_hensu.php');
include('parts/basic_hensu.php');
include('parts/starttime_conversion2.php');	/* 出勤開始時間を変換 */
include('parts/schetime.php');

//▽表示内容ここから

echo '<li id="' ."$name2".'">';
			
	echo '<div class="cast_page_box_wrap">';			
			
	if($photo1 == $empty){
	echo "<img src=\"photo/nophoto_1.jpg\" alt=\"".$name."\" />\n";
}else{
	echo "<img src=\"".$photo1.".jpg\" alt=\"".$name."\"/>\n";
}
	echo "</div>\n";

if($option1=='1'){
	echo '<div class="todayscast_hyouji">表示中</div>';
}elseif($option1=='2'){
	echo '<div class="todayscast_hyouji_no">非表示</div>';
}else{
	echo '<div class="todayscast_hyouji">表示中</div>';
}
echo "<div class=\"castsort_area_name\">".$name."</div>\n";

//△表示内容ここまで
echo "</li>\n";

}
?>

      
                                                
    </ul>
  </div>   
  
  </div>

<form action="sort.php" method="post">
<input type="hidden" name="order" id="order" size=10 readonly>
<input type="hidden" name="shop_id" value="<?php echo $shop_id; ?>" />
<div class="todayscast_button_2">
<button name="submit" type="submit"	disabled="disabled" class="formbtn_2" id="submit" >順番を確定する</button>
 </div> 
</form>


</div><!--base-->

</div>

  <?php include ('php/footer.php'); ?>

</main>

</div><!--drawer drawer--left-->

</body>

</html>