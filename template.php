<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8"><title>{{form_name}}</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="format-detection" content="telephone=no">
		<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=block" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=block" rel="stylesheet">
		<link rel="stylesheet" href="https://amotarget.ru/leadform1/style.css?v=1.5">
		<script src="https://amotarget.ru/leadform1/js/jquery-1.11.2.min.js"></script>
		
		<script>
  window.myIDacc = "<?php echo $_COOKIE['lead_id'] ?>";
</script>

		
		<!-- Yandex.Metrika counter -->{{metrix}}<!-- /Yandex.Metrika counter -->
	</head>
	<body>
		<div class="site-wrap">
			<main>
				<section class="banner2">
					<div class="container">
					
					<div class="banner2-img">{{image}}</div><div class="banner2-wrap" style="z-index: 1;"><div class="banner2-text" style="padding: 0px 0px;"><h3 class="banner2-header">{{title}}</h3><p>{{description}}</p></div></div>
					

				{{questions}}
										
<div class="banner2-wrap social-wrap" style="z-index:1;"><div class="banner2-social"><b>Выберите мессенджер:</b><input name="land_phone" type="tel" class="phone" data-tel-input maxlength="18" placeholder="Номер телефона" id="land_phone" style="display:none;"><ul class="banner2-social-list">

{{VK}}

{{WhatsApp}}

{{Telegram}}

</ul></div><div class="banner2-text1"><p>Нажимая на кнопку, вы соглашаетесь с <a href="#openModal">политикой обработки персональных данных</a></p></div></div></div></div></section></main></div>
<script type="text/javascript">let content = document.getElementById("land_phone")
let show1 = document.getElementById("showContent1")
let show2 = document.getElementById("showContent2")
show1.addEventListener("click", () => { content.style.display = "block";	$('#land_phone').focus();
})
show2.addEventListener("click", () => { content.style.display = "block";	$('#land_phone').focus();
})</script>
	<script src="https://amotarget.ru/leadform1/js/jquery.formstyler.min.js"></script>
	<script src="https://amotarget.ru/leadform1/js/common.js"></script>
	<script src="https://amotarget.ru/leadform1/js/phone-mask.js?v=1.1"></script>
	<script async src="https://amotarget.ru/integration/tracking_no_metric.js"></script>
	
	<!--  <script type="text/javascript">ym(95429729, 'getClientID', function (clientID) {	var _tmr = window._tmr || (window._tmr = []);	_tmr.push({ id: "3264613", type: "pageView", start: (new Date()).getTime(), pid: clientID });	(function (d, w, id) {	if (d.getElementById(id)) return;	var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;	ts.src = "https://top-fwz1.mail.ru/js/code.js";	var f = function () { var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s); };	if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }	})(document, window, "tmr-code");	});</script><noscript><div><img src="https://top-fwz1.mail.ru/counter?id=3264613;js=na" style="position:absolute;left:-9999px;" alt="Top.Mail.Ru" /></div></noscript>  -->
	
	<div id="openModal" class="modal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h3 class="modal-title">Согласие на обработку персональных данных (далее — Согласие)</h3><a href="#close" title="Close" class="close">×</a></div><div class="modal-body"> Нажимая на кнопку "Отправить" (мессенджер–кнопка), я соглашаюсь на обработку моих персональных данных, в соответствии со ст. 9 Федерального закона от 27.07.2006 № 152-ФЗ «О персональных данных» (далее — 152-ФЗ), свободно, своей волей и в своем интересе я (далее — пользователь) даю согласие:<br><br>Оператору персональных данных (далее Оператор) — ООО «Месседж маркетинг» ОГРН 1215000031234, на обработку персональных данных с использованием средств автоматизации и без их использования (смешанная обработка) в следующем объеме:<ul><li>— общие: имя; номер телефона; иные данные, предоставленные пользователем при заполнении формы сбора контактов (анкеты);</li><li>— с целью: участия пользователя в рекламной кампании Оператора, в отношении которой заполнялась форма сбора контактов (анкеты) (в т.ч. для взаимодействия Оператора с пользователем);</li><li>— сроком: до окончания проведения рекламной кампании Оператора или до момента отзыва Согласия, в зависимости от того, какое событие наступит раньше.</li></ul><br><br>Оператор вправе:<ul><li>— осуществлять с моими персональными данными: сбор, запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение, использование, блокирование, удаление, поручение обработки персональных данных третьим лицам, уничтожение и уничтожение части персональных данных.</li></ul><br>Я проинформирован (-а) о праве на получение информации, касающейся обработки персональных данных, в соответствии с 152-ФЗ, и уведомлен (-а), что данное Согласие может быть отозвано мной в любой момент посредством направления заявления в письменном виде по адресу местонахождения Оператора. </div></div></div></div></body></html>
	
	
	
	
	
	

<!-- Top.Mail.Ru counter -->

<script type="text/javascript">


function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : '';
}


let idvisit = getCookie('idvisit');
var _tmr = window._tmr || (window._tmr = []);
_tmr.push({id: "1111", type: "pageView", start: (new Date()).getTime(), pid: idvisit});
(function (d, w, id) {
  if (d.getElementById(id)) return;
  var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
  ts.src = "https://top-fwz1.mail.ru/js/code.js";
  var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
  if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window, "tmr-code");
</script>
<noscript><div><img src="https://top-fwz1.mail.ru/counter?id=1111;js=na" style="position:absolute;left:-9999px;" alt="Top.Mail.Ru" /></div></noscript>
<!-- /Top.Mail.Ru counter -->
