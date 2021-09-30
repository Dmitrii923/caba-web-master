<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once '../conf.php';

//ファンクションファイル読み込み
require_once '../parts/function.php';

$master_id = $_GET['master_id'];

$result=mysqli_query($sql, "SELECT * From `shop` WHERE `master_id` = '$master_id'");
while($row=mysqli_fetch_assoc($result)){
include('../parts/basic_hensu.php');
}


$name2 = $login_id;

$result=mysqli_query($sql, "SELECT * From `data3` WHERE `name2` = '$name2'");
while($row=mysqli_fetch_assoc($result)){
include('../parts/basic_hensu5.php');
}

?><!doctype html>
<html lang="ja"><head>
<meta charset="utf-8">
<title>店内写真設定｜Admin Tool</title>
<meta name="description" content="管理画面ツール　店内写真設定">

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
				<h2>店内写真設定</h2>
				<div class="page_base_in">
					<div class="page_base_box_2">
						<div class="attention_1">
							最後に必ず「登録」ボタンを押して下さい。<br />
							「登録」ボタンを押さないと反映されません。<br />
							<br />
							ROOM数は最大4ROOMまで登録できます。
						</div>
						<form action="shopphoto_check.php" method="post" id="form" enctype="multipart/form-data">
							<div class="shopphoto_page_box">
								<p>
									<label><span>ROOM名 ①</span><input type="text" name="link1" class="txtfiled" placeholder="例）Main Room" value="<?php echo $link1; ?>"></label>
								</p>
								<table>
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">1枚目</div>
											<?php
if ($photo1 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo1 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo1!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete1\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo1"  class="file" />
												</div>
											</label>
										</td>
									</tr>
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">2枚目</div>
											<?php
if ($photo2 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo2 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo2!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete2\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo2" class="file" />
												</div>
											</label>
										</td>
									</tr>									
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">3枚目</div>
											<?php
if ($photo3 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo3 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo3!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete3\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo3" class="file" />
												</div>
											</label>
										</td>
									</tr>
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">4枚目</div>
											<?php
if ($photo4 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo4 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo4!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete4\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo4" class="file" />
												</div>
											</label>
										</td>
									</tr>
								</table>
							</div>
							<div class="shopphoto_page_box_2">
								<p>
									<label><span>ROOM名 ②</span><input type="text" name="link2" class="txtfiled" placeholder="例）VIP Room" value="<?php echo $link2; ?>"></label>
								</p>
								<table>
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">1枚目</div>
											<?php
if ($photo5 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo5 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo5!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete5\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo5" class="file" />
												</div>
											</label>
										</td>
									</tr>
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">2枚目</div>
											<?php
if ($photo6 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo6 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo6!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete6\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo6" class="file" />
												</div>
											</label>
										</td>
									</tr>									
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">3枚目</div>
											<?php
if ($photo7 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo7 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo7!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete7\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo7" class="file" />
												</div>
											</label>
										</td>
									</tr>
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">4枚目</div>
											<?php
if ($photo8 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo8 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo8!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete8\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo8" class="file" />
												</div>
											</label>
										</td>
									</tr>
								</table>
							</div>
							<div class="shopphoto_page_box_2">
								<p>
									<label><span>ROOM名 ③</span><input type="text" name="link3" class="txtfiled" placeholder="例）EXECUTIVE Room" value="<?php echo $link3; ?>"></label>
								</p>
								<table>
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">1枚目</div>
											<?php
if ($photo9 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo9 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo9!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete9\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo9" class="file" />
												</div>
											</label>
										</td>
									</tr>
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">2枚目</div>
											<?php
if ($photo10 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo10 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo10!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete10\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo10" class="file" />
												</div>
											</label>
										</td>
									</tr>									
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">3枚目</div>
											<?php
if ($photo11 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo11 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo11!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete11\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo11" class="file" />
												</div>
											</label>
										</td>
									</tr>
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">4枚目</div>
											<?php
if ($photo12 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo12 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo12!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete12\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo12" class="file" />
												</div>
											</label>
										</td>
									</tr>
								</table>
							</div>
							<div class="shopphoto_page_box_2">
								<p>
									<label><span>ROOM名 ④</span><input type="text" name="link4" class="txtfiled" placeholder="例）KARAOKE Room" value="<?php echo $link4; ?>"></label>
								</p>
								<table>
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">1枚目</div>
											<?php
if ($photo13 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo13 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo13!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete13\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo13" class="file" />
												</div>
											</label>
										</td>
									</tr>
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">2枚目</div>
											<?php
if ($photo14 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo14 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo14!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete14\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo14" class="file" />
												</div>
											</label>
										</td>
									</tr>									
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">3枚目</div>
											<?php
if ($photo15 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo15 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo15!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete15\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo15" class="file" />
												</div>
											</label>
										</td>
									</tr>
									<tr>
										<td class="t_castgallery">
											<div class="castphoto_number">4枚目</div>
											<?php
if ($photo16 == $empty) {
	echo '<img src="" data-src="img/nophoto_1.jpg" class="lozad castphoto_contain"><br />';
} else {
	echo '<img src="" data-src="https://www.caba-web.com/client_admin/' . $photo16 . '.jpg?' . $koshin . '" class="lozad castphoto_contain"><br />';
}
?>
											<?php
if($photo16!=$empty){
	echo "<div class=\"sakujyo_check\">
          <label><input type=\"checkbox\" name=\"delete16\" class=\"checkbox-input\" value=\"delete\" /><span class=\"checkbox-parts\">削除する</span></label>
          </div>";
}
?>
										</td>
										<td class="t_castgallery-2">
											<label class="file-btn">
												<div class="file-btn2">画像選択</div>
												<div class="view_box">
													<input type="file" name="photo16" class="file" />
												</div>
											</label>
										</td>
									</tr>
								</table>
							</div>
							<div class="castphoto_button">
								<input type="hidden" name="id" value="<?php echo $id; ?>" /><input type="hidden" name="name" value="<?php echo $name; ?>" /><input type="hidden" name="name2" value="<?php echo $name2; ?>" /><input type="hidden" name="operation" value="edit" /><input type="hidden" name="master_id" value="<?php echo $master_id; ?>" />
								<button type="submit" class="formbtn_2">登録する</button>
							</div>
						</form>
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
</body>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script>
const observer = lozad('.lozad', {
    rootMargin: '50%',
});
observer.observe();
</script>
</html>