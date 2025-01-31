<?php include($_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>


        <main class="main without-aside">
            <section class="section">
                <h1 class="section__header">Интеграция с amoCRM</h1>


    <div class="background__a7hhP"></div>
    <div class="containerWrapper__Rby5g fullScreen__koXt5 scroll">
        <div class="content__KVypX">
            <div class="contentWrapper__D2sPU" data-qa-id="email-channel-create">
                <div class="popupTitle__cwn_7">Подключить amoCRM</div>
                <div class="picture__MefQk"
                    style="background-image: url(&quot;https://app.jivo.ru/images/email.png&quot;);"></div>
                <div class="controlsWrapper__OIroH field">
                    <div class="container__yz0HL mousetrap input-group ym-disable-keys"
                        data-qa-id="email-channel-channel-name"><input id="integrationId" 
                            class="container__yz0HL mousetrap input-group ym-disable-keys"
                            data-qa-id="email-channel-channel-name-input" name="emailChannelName" maxlength="255"
                            placeholder="ID интеграции" type="text" value=""></div>
                            
                            <div class="container__yz0HL mousetrap input-group ym-disable-keys"
                        data-qa-id="email-channel-channel-name">
	                        <input id="secretKey" class="container__yz0HL mousetrap input-group ym-disable-keys"
                            data-qa-id="email-channel-channel-name-input" name="emailChannelName" maxlength="255"
                            placeholder="Секретный ключ" type="text" value=""></div>
                    <div class="btnContainer__SRTSV"><button id="connectButton" data-qa-id="email-channel-create-button"
                            class="btn btn-success">Подключить</button></div>
                </div>
                <div class="description___zFs6" data-qa-id="email-channel-description">
                    <p>Вы можете принимать письма, которые клиенты отправляют на ваш общий адрес email (например, это
                        info@yourcompany.ru) прямо во "Входящие" в Jivo! Письма будут распределены между операторами
                        наравне с чатами с сайта, из соцсетей и мессенджеров. Настроить просто – надо включить
                        переадресацию в настройках вашего почтового сервиса.</p>
                </div>
            </div>
        <div class="close__Z6s0S close" data-qa-id="popup-close-button"></div>
    </div>
</div>

      </section>
        </div>
        </main>
    </div>
	
	
	<!-- Попап -->
<div id="popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background: white; border: 1px solid black;">
    <p>Ваша ссылка:</p>
    <a id="popupLink" href="" target="_blank">Открыть</a>
</div>
	
	
	
	
    <div class="overlay1"></div>
	
	
	
	
	<script>
document.getElementById('connectButton').addEventListener('click', async function() {
    const integrationId = document.getElementById('integrationId').value;
    const secretKey = document.getElementById('secretKey').value;

    if (!integrationId || !secretKey) {
        alert('Пожалуйста, заполните все поля!');
        return;
    }

    // Отправляем данные на сервер
    const response = await fetch('/process_integration.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ integrationId, secretKey })
    });

    const result = await response.json();

    if (result.success) {
        // Показываем попап с ссылкой
		
		window.open(result.redirectLink,'','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,Width=615,Height=570');

        //const popup = document.getElementById('popup');
        //const popupLink = document.getElementById('popupLink');

        //popupLink.href = result.redirectLink;
        //popupLink.textContent = result.redirectLink;
        //popup.style.display = 'block';
    } else {
        alert(result.message || 'Произошла ошибка.');
    }
});
</script>
	
	
	
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/static/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>




</html>