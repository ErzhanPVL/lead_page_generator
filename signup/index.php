<!DOCTYPE html>
<html lang="ru" id="homepage">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AmoTarget</title>
  <meta name="description" content="Создайте сайт который поможет клиентам удобно связаться с вами">
  <link rel="preload" href="/home/website/fonts/Inter-Black.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="/home/website/fonts/Cera.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="/home/website/css/style.css?v=1.4" type="text/css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=block"
    rel="stylesheet">
</head>

<body>

  <div class="page-container">
    <header class="header">
      <a href="https://messg.ru" class="logo">
        <img src="/home/website/img/ui/logo_home.svg" alt="messg.ru logo">
      </a>
      <ul class="auth-buttons">
        <li>
          <a href="https://next.messg.ru/auth/login?lang=ru&amp;utm_source=website&amp;utm_medium=login_click&amp;utm_campaign=mssgme_website"
            class="right">Войти</a>
        </li>
        <li>
          <a href="#reg" onclick="$('#name').focus();">Начать</a>
        </li>
      </ul>
    </header>

    <section class="footer-cta-section" id="reg">
      <div class="content">
        <h2 class="gradiented">Войти</h2>
        <p></p>
        <div class="ovform-body">
          <div class="row">
            <div class="ovform-holder">
              <div class="ovform-content">
                <div class="ovform-items">
                  <!-- <h3>Register Today</h3>
                                    <p>Fill in the data below.</p> -->
                  <form class="requires-validation" novalidate>
                    <div class="col-md-12">
                      <input name="tel" type="tel" class="ovform-control" data-tel-input placeholder="Номер телефона"
                        required>
                      <div class="valid-feedback"></div>
                      <div class="invalid-feedback">Укажите телефон — он используется в
                        качестве логина</div>
                    </div>
                    <div class="col-md-12">
                      <input class="ovform-control" type="password" name="password" placeholder="Пароль" minlength="6"
                        required>
                      <div class="valid-feedback"></div>
                      <div class="invalid-feedback">Введите пароль</div>
                    </div>

                  
                    <div class="form-button mt-3 button-container center">
                      <button id="submit" type="submit" class="button">Войти</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="content">
        <ul class="footer-list">
          <li>
            <a href="/privacy-policy">Политика конфиденциальности</a>
          </li>
          <li>
            <a href="/terms-of-use">Условия использования</a>
          </li>
        </ul>
        <span class="copyright">AmoTarget © 2024</span>
        <span class="made-in">Made<img width="17" height="12" src=""></span>
        <div class="bbg-label-footer"><span>backed by MESSG</span></div>
      </div>
    </footer>

  </div>
  <div class="cookie-message" id="cookie-message">
    <span>Мы используем файлы cookie и рекомендательные технологии. Продолжив работу с сайтом, вы соглашаетесь с <a
        href="https://messg.ru/ru/privacy-policy" style="color: #007aff;"><u>Политикой обработки персональных
          данных</u></a>.</span>

    <div class="close-cookie" id="close-cookie"></div>
  </div>
  <div class="wh-popup-fade">
    <div class="wh-popup-close"></div>
    <div id="wh-popup-root" style="opacity: 1;">
      <div class="wh-popup-main" id="wh-popup-main">
        <div class="wh-popup-main__header">
          <h1 class="wh-popup-title">Ответить нам в WhatsApp</h1>
          <img class="wh-popup-whatsapp-logo" src="static/images/whatsapp.svg" alt="">
        </div>
        <div class="wh-popup-main__content">
          <div class="wh-popup-qr-code" id="wh-popup-qr">
            <img
              src="https://api.qrserver.com/v1/create-qr-code/?data=https://wa.me/undefined&amp;size=184x184&amp;format=svg"
              alt="">
          </div>
          <div class="wh-popup-instruction">
            <p class="wh-popup-instruction__item">
              <span class="step-circle">1</span> Откройте WhatsApp на своём телефоне
            </p>
            <p class="wh-popup-instruction__item">
              <span class="step-circle">2</span> Нажмите на иконку «Камера» и наведите на QR
            </p>
          </div>
          <div class="wh-popup-phone-number">
            или с компьютера
          </div>
          <center>
            <div class="wh-popup-US0AfLML"><a class="wh-popup-XTlBTQWc"
                href="https://api.whatsapp.com/send/?phone=undefined&amp;text=Добрый%20день!"
                style="background-color: rgb(36, 211, 102);">Отправить сообщение</a></div>
          </center>
          <div class="wh-popup-line"></div>
          <a href="https://messg.ru" class="wh-popup-logo">
            <img src="https://chatwa.ru/i/footerc.svg" alt="Logo teletype">
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="/home/website/dist/jquery.min.js"></script>
  <script src="/home/website/js/home.js"></script>
  <script src="/home/website/dist/jquery.inputmask.bundle.js"></script>
  <script src="/home/website/js/main.js"></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
    integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
    data-cf-beacon='{"rayId":"8e31f93e0b7a9f94","version":"2024.10.5","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"cf95228921064830b2715d8f4b228e4d","b":1}'
    crossorigin="anonymous"></script>
</body>

</html>