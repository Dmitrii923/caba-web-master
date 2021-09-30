<!doctype html>
<html lang="ja"><head>
<meta charset="utf-8">
<title>イベント詳細｜キャバクラ「きゃばWEB」</title>
<meta name="description" content="キャバクラ「きゃばWEB」の公式ホームページです。">
<meta name="keywords" content="キャバクラ">

<link rel="shortcut icon" href="img/favicon.ico">
<link rel="apple-touch-icon" href="img/iphone.jpg">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/drawer.min.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">	
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">
	
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">	
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">

<link rel="canonical" href="event_info.php">

<meta name="format-detection" content="telephone=no">

</head>

<body>
	<div id="top_fade">
		<div class="drawer drawer--top">
			<?php include ('php/header.php'); ?>
			<div id="page_top_bg">
				<div class="page_title_area">
					<h2>EVENT<br /><span class="h_sub">イベント詳細</span></h2>
				</div>
			</div>
			
			<div class="page_base_area">
				<div class="top_contents_in">
					<div class="event_page_base">
						<div class="eventinfo_page_icon" style="color: #FF0000;">誕生日</div>
						<div class="eventinfo_page_ymd">2020.3.2</div>
						<div class="eventinfo_page_title">タイトルが入ります。タイトルが入ります。タイトルが入ります。タイトルが入ります。</div>
						<div class="eventinfo_page_naiyou">
							テキストが入ります。テキストが入ります。テキストが入ります。<br />
							<br />
							テキストが入ります。テキストが入ります。<br />
							テキストが入ります。テキストが入ります。<br />
							<br />
							テキストが入ります。テキストが入ります。
						</div>
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
var topBtn = $('#page_top');	
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