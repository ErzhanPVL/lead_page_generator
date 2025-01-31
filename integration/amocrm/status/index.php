<?php
session_start();
if (isset($_GET['r'])) {
$_SESSION['r'] = $_GET['r'];
}
$title = $_SESSION['r'];
$title_text = 'Статус установки неопределен';
switch ($title) {
case "success":
$title_text = 'Интеграция успешно установлена';
break;
case "error":
$title_text = 'Ошибка интеграции<br>Пожалуйста, свяжитесь с вашим персональным менеджером';
break;
}
?>
<!DOCTYPE html>
<html lang="ru" >
<head>
  <meta charset="UTF-8">
  <link rel="preload" href="/static/website/fonts/Cera.woff2" as="font" type="font/woff2" crossorigin>
  <title>Статус интеграции amoCRM</title>
  
  
      <script>
	  async function sendWebhook() {
	        const data = {
				id: <?php echo $_COOKIE['lead_id'] ?>
            };

            await fetch('https://amotarget.ru/amocrm/webhook2.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });
			
	  }
        function closeAndRedirect() {
			
            if (window.opener) {
				
				sendWebhook();
				
                window.opener.location.href = "https://amotarget.ru/vkads";
                window.close();
            } else {				
                alert("Невозможно выполнить действие: основное окно недоступно.");
            }
        }
    </script>

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
  <head>
    <title>Статус интеграции amoCRM</title>
    <style type="text/css">
@font-face {
  font-family: Cera CY;
  src: url(https://amotarget.ru/home/website/fonts/Cera.woff2) format("woff2");
  font-style: normal;
  font-display: block;
}

@font-face {
  font-family: Cera CY;
  src: url(https://amotarget.ru/home/website/fonts/CeraBold.woff2) format("woff2");
  font-style: normal;
  font-weight: 600;
  font-display: block;
}
      *,*:after, *:before{
      	box-sizing: border-box;
      	font-family: "Cera CY";
      }
      .tick{
      	display: inline-block;
      	transform: rotate(45deg);
      	height: 36px;
      	width: 18px;
      	border-bottom: solid 3px #339dc8;
      	border-right: solid 3px #339dc8;
      	margin-bottom: 8px;
      }
      .tick-container{
      	padding: 20px;
      	border-radius: 100px;
      	height: 56px;
      	width: 56px;
      	display: inline-flex;
      	justify-content:center;
      	align-items: center;
      	background: #fff;
      	margin-bottom: 12px;
      }
      body{
      	background: white;
      	margin:0;
      	background: #339dc8;
      	text-align: center;
      	font-family: "Cera CY";
      }
      .heading{
      	font-size: 1.5rem;
      	display:flex;
      	align-items: center;
      	flex-direction: column;
      	margin-bottom: 32px;
      }
      .container{
      	color: #fff;
      	margin: auto;
      	padding: 32px 16px 16px;
      }
      .text-container{
      	line-height: 1.8em;
      }
      .primary-button{
      	color: #339dc8;
      	background-color: #fff;
      	padding: 12px 16px;
      	display: inline-block;
      	margin-top: 32px;
      	border-radius: 6px;
      	text-decoration: none;
      	text-transform: uppercase;
      	font-weight: 600;
      }
    </style>
  </head>
  <body style="font-family:'Cera CY';">
    <div class="container">
      <div class="heading"><span class="tick-container"><i class="tick" style="color:green;">&nbsp;</i></span><span><?php echo $title_text;?></span></div>
      <div class="text-container">
<a onclick="closeAndRedirect()" class="primary-button" href="">Продолжить настройку</a>
      </div>
    </div>
  </body>
</html>
<!-- partial -->
  
</body>
</html>
