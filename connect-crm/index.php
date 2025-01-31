<?php include($_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>


<script>
        function handleConnect() {
            const input = document.querySelector('input[name="emailChannelName"]');
            const url = input.value.trim();

            if (!url.includes('.amocrm.ru')) {
                alert('Пожалуйста, введите правильный адрес amoCRM!');
                return;
            }

            // Извлекаем субдомен
            const subdomain = url.replace('https://', '').replace('.amocrm.ru', '').replace('/', '');

            // Отправляем данные на сервер
            fetch('https://amotarget.ru/process.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ subdomain })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'https://amotarget.ru/connect-amocrm';
                } else {
                    alert('Ошибка: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Ошибка:', error);
                alert('Произошла ошибка при подключении.');
            });
        }
    </script>

        <main class="main without-aside">
            <section class="section">
                <h1 class="section__header">Подключить CRM</h1>
        <div class="links-block">
          <a href="#" class="links-block__item amocrm view-modal-ov">
            <img class="links-block__item-img" src="/static/images/amo-crm.740fed7a439daeb9.svg">
            <div class="links-block__item-name">
              amoCRM
            </div>
          </a>
          <a href="#" class="links-block__item kommo">
            <img class="links-block__item-img" src="/static/images/kommo.aec4340b69f798e7.svg">
            <div href="#" class="links-block__item-name">
              Kommo
            </div>
          </a>
          <a href="#" class="links-block__item b24">
            <img class="links-block__item-img" src="/static/images/b-24@3x.1d081310fe28eb3c.png">
            <div href="#" class="links-block__item-name">
              Битрикс24
            </div>
          </a>
        </div>
      </section>
    <div class="popup overlay__ywMG7 noTransparent__bS8KA light-theme show__C_Teh">
    <div class="background__a7hhP"></div>
    <div class="containerWrapper__Rby5g fullScreen__koXt5 scroll">
        <div class="content__KVypX">
            <div class="contentWrapper__D2sPU" data-qa-id="email-channel-create">
                <div class="popupTitle__cwn_7">Подключить amoCRM</div>
                <div class="picture__MefQk"
                    style="background-image: url(&quot;https://app.jivo.ru/images/email.png&quot;);"></div>
                <div class="controlsWrapper__OIroH field">
                    <div class="container__yz0HL mousetrap input-group ym-disable-keys"
                        data-qa-id="email-channel-channel-name"><input
                            class="container__yz0HL mousetrap input-group ym-disable-keys"
                            data-qa-id="email-channel-channel-name-input" name="emailChannelName" maxlength="255"
                            placeholder="Адрес аккаунта amoCRM" type="text" value=""></div>
                    <div onclick="handleConnect()" class="btnContainer__SRTSV"><button data-qa-id="email-channel-create-button"
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
        </div>
        </main>
    </div>
    <div class="overlay1"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/static/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>