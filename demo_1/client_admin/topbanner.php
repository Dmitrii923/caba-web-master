<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';
	
	$shop_id = $_GET['shop_id'];

$result=mysqli_query($sql, "SELECT * From `shop` WHERE `shop_id` = '$shop_id'");
while($row=mysqli_fetch_assoc($result)){
include('../master_admin/parts/basic_hensu.php');
}

$result=mysqli_query($sql, "SELECT * From `data6` WHERE `name2` = '$shop_id'");
while($row=mysqli_fetch_assoc($result)){
include('parts/basic_hensu3.php');
}

?><!doctype html>
<html lang="ja"><head>
<meta charset="utf-8">
<title>トップバナー画像設定｜CLIENT Admin Tool</title>
<meta name="description" content="管理画面ツール　トップバナー画像設定">

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

<!--画像調整-->
<script>
$(document).ready(function () {
    var imgWidth = $(".slider_page_box_wrap").width();
    var imgheight = (imgWidth*0.6);
    $(".slider_page_box_wrap").css('height',imgheight);
});
$(window).resize(function () {  
    var imgWidth = $(".cast_page_box_wrap").width();
    var imgheight = (imgWidth*0.6);
    $(".slider_page_box_wrap").css('height',imgheight);
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
  <h2>トップバナー設定</h2>
  
<div class="page_base_in">
  
  <div class="page_base_box_2">
    <h3>店舗トップ バナー画像設定</h3>
    
    <div class="castnew_top">
    最後に必ず「登録」ボタンを押して下さい。<br />
    「登録」ボタンを押さないと反映されません。
    </div>
    <div class="slider_caution">
    <font color="#FF0000">― 画像サイズ ―</font><br />
    <span class="slider_caution_sub">【横：1500px　縦：1100px】</span><br />
    <span class="slider_caution_sub_2">必ず推奨サイズでアップして下さい。</span>
    </div>
    <div class="slider_caution">
    <font color="#FF0000">― リンク設定 ―</font><br />
    <span class="slider_caution_sub_2">
    【リンク設定欄】にURLを入力して下さい。<br />
    入力がない場合はリンク設定されません。
    </span>
    </div>    
    
    <form action="topbanner_write.php" method="post" id="form_3" enctype="multipart/form-data">
    
    <table>
      <tr>
        <td class="t_td10">
          <div class="castphoto_number">1枚目</div>
			<?php
if ($photo1 == $empty) {
	echo '<img src="img/nophoto_3.jpg" alt="準備中" class="castphoto_contain" />';
} else {
	echo '<img src="' . $photo1 . '.jpg?' . $koshin . '" alt="photo1" class="castphoto_contain" />';
}
?>
        </td>
        <td class="t_td10-2">
          <label class="file-btn">
          <div class="file-btn2">アップロード</div>
          <div class="view_box">
          <input type="file" class="file" name="photo1" />
          </div>
          </label>
          <div class="slider_link_area">
          <p>
          リンク設定          
          <label><input type="text" name="link1" class="txtfiled" placeholder="例）http://www.monochrome-ds.com/" value="<?php echo $link1; ?>" ></label>         
          </p>
          </div>
			<?php
if($photo1!=$empty){
	echo "<div class=\"slider_link_area\">
          <label><input type=\"checkbox\" name=\"delete1\" value=\"delete\" />削除する</label>
          </div>";
}
?>
                 
        </td>
      </tr>                                                            
    </table>

      <div class="todayscast_button_2"><input type="hidden" name="id" value="<?php echo $id; ?>" /><input type="hidden" name="name" value="<?php echo $name; ?>" /><input type="hidden" name="name2" value="<?php echo $name2; ?>" /><input type="hidden" name="operation" value="edit" />
      <button type="submit" class="formbtn_2">登録する</button>
      </div>
    </form>

  

  </div>

</div><!--base-->

</div>

  <?php include ('php/footer.php'); ?>

</main>

</div><!--drawer drawer--left-->

</body>

</html>