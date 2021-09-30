<!doctype html>
<html lang="ja"><head>
<meta charset="utf-8">
<title>契約内容｜Admin Tool</title>
<meta name="description" content="管理画面ツール　契約内容">

<link rel="shortcut icon" href="img/favicon.ico">
<link rel="apple-touch-icon" href="img/iphone.jpg">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/drawer.min.css">
<link rel="stylesheet" href="css/iziModal.min.css">

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

</head>

<body>

<div class="drawer drawer--left">

  <?php include ('php/header.php'); ?>

<div id="page_base">
  <h2>契約内容</h2>
  
<div class="page_base_in">  
  
  <div class="page_base_box_2">
  <div class="mypage_page_base">
    <h3>注意事項</h3>
    <div class="todayscast_attention">
    制作依頼を受けた時点で本契約と締結したこととなります。<br />
    </div>
  </div>
  <div class="mypage_page_base_2">
    <h3>契約内容</h3>
    <div class="agreement">
    制作依頼元（以下、「甲」という。）ときゃばweb（以下、「乙」という。）は、WEB サイト制作に関する業務（以下、「本業務」という。）について、下記のとおり契約（以下、「本契約」という。）を締結する。 <br />
    <br />
    第１条（目的）<br />
    甲は乙に対し、本業務を委託し、乙はこれを受託する。甲は、乙が本業務を遂行するに際して、必要な協力を行なう。<br />
    <br />
    第２条(本業務) <br />
    乙が甲に提供する業務は次の通りとする。<br />
    （１）甲から提供されるテキスト原稿、画像等のデータと、乙の提供するHTMLによるデザイン・レイアウトデータ、およびスクリプト等と組み合わせて、ＷＥＢサイトを制作すること。<br />
    <br />
    第３条（契約期間）<br />
    本契約の有効期間は、本契約締結の日から満１ヶ年間とする。但し期間満了までに、甲乙いずれからも何らの意思表示もないときは、本基本契約と同一条件で更に１ヶ年間延長するものとし１ヶ年間の契約料が発生するものとする。契約料は乙が定める料金とする。<br />
    <br />
    第４条（制作料金）<br />
    （１）甲は納入物の対価として、乙からの請求にもとづきその制作等に関する料金及び消費税相当額を乙に支払う。<br />
    （２）本契約に基づく料金額は、乙のホームページ上の料金表及び料金案内に定める通りとする。なお、乙は、ホームページ上の料金表及び料金案内については、告知せずに価格変更をできるものとする。<br />
    （３）料金の支払条件は、請求書記載の納品日より１週間以内とし、甲は乙が指定した銀行口座に振り込んで支払う。振込手数料は甲の負担とする。<br />
    <br />
    第５条（納品）<br />
    （１）乙が甲に制作物の納品を行なう前に、甲はインターネット上にてその確認を行なうものとする。<br />
    （２）甲は、乙からの確認依頼通知を受領後速やかに、その内容の確認を行なう。甲から乙への確認通知は確認依頼通知への返信メール、または文書により行なう。確認依頼通知の受領後７日以内に乙宛への連絡が無い場合は、甲により制作物の内容が承認されたものとする。<br />
    （３）甲が制作完了後の更新や修正を希望する場合は、乙規定の方法で知らせる。<br />
    <br />
    第６条(公開) <br />
    乙は、甲による委託料金の完済後、制作物を公開するものとする。なお公開後、制作物に掲載された内容に関しては、乙は一切の責任を負わない。<br />
    <br />
    第８条 (制作物の返品・キャンセル・再制作) <br />
    （１）制作前のキャンセルは制作費の50%を甲が負担しなければならない。<br />
    （２）納品物の再制作の必要がある場合は、費用は甲が負担し、乙が合理的な根拠に基づいて計算した追加料金を支払う。なお納品物の返品はできないものとする。<br />
    <br />
    第９条（所有権の移転、危険負担）<br />
    本制作物の所有権は、甲の内容確認後、且つ当該契約に係る委託料が完済されたときに、乙から甲に移転する。なお本制作物の滅失、毀損その他全ての危険負担についても同時に甲に移転する。<br />
    <br />
    第１０条（瑕疵担保責任）<br />
    前条の所有権移転から３０日以内に、本制作物に隠れた瑕疵が発見された場合、乙は速やかに甲と協議し、必要な無償修補、対価の減額等を含む合理的措置を取り決めるものとする。但し当該瑕疵の原因が、本制作物に対して乙以外の者による造作・工作がなされたことによる場合にはこの限りではない。<br />
    <br />
    第１１条（アフターサービス）<br />
    本制作物の更新・修正は費用内に含まれているが以下の場合は対象外となる。<br />
    （１）画像更新が月制限回数（トップ・求人各1回/月）を超えた場合。<br />
    （２）大幅なページ修正・追加等の場合。<br />
    <br />
    第１２条（著作権）<br />
    （１）本制作物の著作権は、当該契約に係る委託料が完済されたときに、乙から甲に移転する。<br />
    （２）甲が本制作物の使用に関して、第三者から権利侵害等の理由に基づく苦情又は請求を受けた場合は、甲は乙に対し遅滞なくその旨を通知し、甲乙は、協議により必要且つ可能な対策を講ずるものとする。但し、甲と第三者との紛争の原因が、制作物作成過程において甲の指示、仕様に起因する場合は、乙は責任を負わない。<br />
    <br />
    第１３条（知的財産権の帰属）<br />
    （１）本制作物の制作過程において行なった考案等の著作権その他の権利を含む知的財産権は、甲が行なった場合は甲に、 乙が行った場合は乙に、甲乙共同で行なった場合には甲乙共有（持分は別段の定めがない限り均等）に帰属する。<br />
    （２）甲及び乙は、本制作物に限り、前項に定める双方の知的財産権を無償で全部又は一部を改変、加工その他の変更を含む自己利用をすることができる。<br />
    （３）甲は、乙を除く第三者の利用に対して、本制作物の複製、翻案等を行なってはならない。また、甲が新たに制作するサイトに対して、本制作物の複製、翻案等を使用する場合は、甲乙は事前に協議し、合意の上これを行なう。<br />
    （４）乙は、本制作物に関する商品名又はサイト名に関する商標権登録のための出願をしてはならない。<br />
    <br />
    第１４条（再委託）<br />
    （１）乙は、本業務の全部又は一部を第三者に再委託することができる。<br />
    （２）乙は、本業務の再委託先に関して、秘密保持義務については本契約に基づき、乙が負うと同様の義務を再委託先に対して負わせなければならないものとし、当該再委託先と連帯して責任を負うものとする。<br />
    <br />
    第１５条（秘密保持）<br />
    （１）甲及び乙は、本契約に基づいて相手方から開示され、又は本業務の遂行過程で取得した相手方の業務上、技術上、その他一切の情報（個人情報を含む。）については秘密情報として扱うものとし、相手方の事前の書面による承諾なく、これらの情報を公表若しくは第三者へ開示し、又は本契約で定められた業務以外の目的で使用してはならない。<br />
    （２）前項の秘密保持義務は、本契約終了後においても存続する。<br />
    <br />
    第１６条（不可抗力）<br />
    （１）地震、台風、津波その他の天災地変、輸送機関の事故、不慮の事故や疾病その他の不可抗力により、本契約の全部又は一部の履行の遅延又は履行不能が生じた場合には、甲乙ともにその責任は負わないものとする。<br />
    （２）前項に定める事由が生じた場合には、直ちに相手方に対しその旨の通知をし、以後の対応について協議する。<br />
    <br />
    第１７条（損害賠償）<br />
    甲及び乙は、本契約の履行に関し、相手方の責めに帰すべき事由により直接且つ現実に被った通常の損害に限り、相手方に対して損害賠償を請求することができる。但し損害賠償額については、甲乙が本業務の対価として定めた委託料相当額を累積限度額とする。<br />
    <br />
    第１８条（契約の解除）<br />
    甲及び乙は、次の場合に本契約を解除することができるものとする。<br />
    なお乙に対する契約解除の返金・返品はできないものとする。<br />
    ただし乙の損害が発生した契約解除の場合はその限りではない。<br />
    （１）甲からの契約解除の申し入れがあったとき。<br />
    （２）相手方が本契約の条項に違反し、且つ、当該違反の書面による是正要求を受けた後３０日以内に当該違反が是正されなかったとき。<br />
    （３）甲から提供されたテキスト原稿及び画像等のデータに、法令または公序良俗に反するものが含まれる、もしくは含まれる可能性があると乙が判断したとき。<br />
    （４）甲及び乙が自らの責めに帰すべき事由によって本契約が解除されたことにより相手方に損害が発生した場合、相手方の請求により、第１７条の規定にもとづく損害賠償をしなければならない。<br />
    <br />
    第１９条（協議）<br />
    本契約について甲乙間に疑義が生じたときは、甲乙協議のうえ、信義誠実をもってこれを解決するものとする。
    </div>            

  </div><!--mypage_page_base_2-->
 
  </div><!--page_base_box-->

</div><!--base-->

</div>

  <?php include ('php/footer.php'); ?>

</main>

</div><!--drawer drawer--left-->

</body>

</html>