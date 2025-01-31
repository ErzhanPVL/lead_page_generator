<?php include($_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>




<main class="mainleadform">
  <!--h1 class="section__header">Новая лид–форма 2.0</h1-->
  <div class="container-form">
    <div class="progress-bar">
      <div class="step">
        <div class="bullet">
          <span>1</span>
        </div>
        <p>Оформление</p>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <div class="bullet">
          <span>2</span>
        </div>
        <p>Вопросы</p>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <div class="bullet">
          <span>3</span>
        </div>
        <p>Мессенджеры</p>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <div class="bullet">
          <span>4</span>
        </div>
        <p>Настройки</p>

        <div class="check fas fa-check"></div>
      </div>
    </div>
    <div class="form-outer">
      <form id="customForm" enctype="multipart/form-data">
        <div class="page slide-page active-page">
          <div class="title">Задайте оформление</div>
          <div class="field">
            <div class="label">Название лид–формы:</div>
            <input type="text" name="form_name" required placeholder="Название лид-формы" type="text"
              value="Лид-форма #1" />
          </div>
          <!--div class="field">
                        <div class="label">Подзаголовок</div>
                        <input type="text" required placeholder="Например, оставить заявку" type="text"/>
                    </div-->
          <div class="field">
            <div class="label">Заголовок:</div>
            <input type="text" name="title" required placeholder="Текст заголовка" type="text" data-output="#output1"/>
          </div>
          <div class="field textarea-wrapper">
            <div class="label">Описание:</div>
            <textarea type="textarea" name="description" required placeholder="Введите описание, используйте эмодзи"
              type="text" data-output="#output2"></textarea>
          </div>
          <div class="field upload-form__wrapper">
            <div class="label">Обложка:</div>
            <!-- Upload  -->
            <div id="file-upload-form" class="uploader">
              <input id="file-upload" type="file" name="fileUpload" accept="image/*" />

              <label for="file-upload" id="file-drag">
                <img id="file-image" src="#" alt="Preview" class="hidden">
                <div id="start">
                  <i class="fa fa-download" aria-hidden="true"></i>
                  <div>Перетащите сюда изображение</div>
                  <div id="notimage" class="hidden">Please select an image</div>
                  <span id="file-upload-btn" class="btn btn-primary">Или выберите из папки</span>
                </div>
                <div id="response" class="hidden">
                  <div id="messages"></div>
                  <progress class="progress" id="file-progress" value="0">
                    <span>0</span>%
                  </progress>
                </div>
              </label>
            </div>
          </div>
          <div class="field btns">
            <button type="submit" class="firstNext next">Продолжить</button>
          </div>
        </div>

        <div class="page">
          <div class="title">Добавьте вопросы</div>
          <div class="settings__hint">
            <span class="settings__hint-title">Подсказка</span>
            <p>
              <b>Ссылка.</b> Это веб-адрес который ведет на вашу персональную страницу mssg.me.
              Перейдя по
              нему
              люди смогут попасть на вашу mssg.me страницу и связаться с вами.
            </p>
            <p>
              <b>Домен.</b> Подключите собственный домен и используйте его в качестве ссылки на вашу
              страницу
              mssg.me. Подключение собственного домена добавит уникальности, читаемости и узнаваемости
              адресу вашей страницы mssg.me.
            </p>
          </div>
          <div class="field add-quest">
            <div class="quest__add-btn">
              <div style="width: 27px;"></div>
              Добавить вопрос
              <use xlink:href="#add_24" style="fill: currentcolor; width: 27px;"><svg xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24" id="add_24">
                  <g fill="none" fill-rule="evenodd">
                    <path d="M0 0h24v24H0z"></path>
                    <path fill="currentColor"
                      d="M13 11h6.5a1 1 0 0 1 0 2H13v6.5a1 1 0 0 1-2 0V13H4.5a1 1 0 0 1 0-2H11V4.5a1 1 0 0 1 2 0z">
                    </path>
                  </g>
                </svg>
              </use>
            </div>
          </div>
          <div class="field btns">
            <button class="prev-1 prev">Назад</button>
            <button class="next-1 next">Продолжить</button>
          </div>
        </div>

        <div class="page">
          <div class="title">Подключите мессенджеры</div>
		  
		  <input style="display:none;" id="WhatsApp1" name="WhatsApp" maxlength="255" type="text" value="">

            <input style="display:none;" id="Telegram1" name="Telegram" maxlength="255" type="text" value="">

            <input style="display:none;" id="VK1" name="VK" maxlength="255" type="text" value="">
		  
          <div class="msg-link whatsapp">
            <img src="/static/images/whatsapp.svg" alt="" class="msg-link__img">
            <div data-id="WhatsApp" class="msg-link__name">WhatsApp</div>
            <a href="#" class="section__btn msg-link__a"
              onclick="updatePopupTitle('Добавить WhatsApp');show('#WhatsApp');">+ Добавить</a>
          </div>
          <div class="msg-link telegram">
            <img src="/static/images/telegram.svg" alt="" class="msg-link__img">
            <div data-id="Telegram" class="msg-link__name">Telegram</div>
            <a href="#" class="section__btn msg-link__a"
              onclick="updatePopupTitle('Добавить Telegram');show('#Telegram');">+ Добавить</a>
          </div>
          <div class="msg-link viber">
            <img src="/static/images/vk-logo.svg" alt="" class="msg-link__img">
            <div data-id="VK" class="msg-link__name">Вконтакте</div>
            <a href="#" class="section__btn msg-link__a" onclick="updatePopupTitle('Добавить ВКонтакте');show('#VK');">+
              Добавить</a>
          </div>
		  
		  <p><span id="errorWhatsApp" style="color: red; display: none;">Введите номер WhatsApp</span>
		  </p>
		  <p><span id="errorTelegram" style="color: red; display: none;">Введите ссылку на Telegram</span>
		  </p>
		  <p><span id="errorVK" style="color: red; display: none;">Введите ссылку на VK</span>
		  </p>
		  
          <div class="field btns">
            <button class="prev-4 prev">Назад</button>
            <button class="next-4 next">Продолжить</button>
          </div>
        </div>

        <div class="page">
          <div class="title"></div>
          <div class="settings">
            <div class="settings__fields">
			<!--
              <div class="field">
                <div class="label">Адрес лид–формы</div>
                <input name="address" type="text" required />
              </div>
			  -->
              <div class="field">
                <div class="label">Собственный домен</div>
                <input name="domen" type="text" />
              </div>
              <div class="field">
                <div class="label">Номер YM</div>
                <input name="metrix" type="text" />
              </div>
              <div class="field">
                <div class="label">Номер VK</div>
                <input name="VKmetrix" type="text" />
              </div>
            </div>
            
            <div class="settings__hint">
              <span class="settings__hint-title">Подсказка</span>
              <p>
                <b>Ссылка.</b> Это веб-адрес который ведет на вашу персональную страницу mssg.me.
                Перейдя по
                нему
                люди смогут попасть на вашу mssg.me страницу и связаться с вами.
              </p>
              <p>
                <b>Домен.</b> Подключите собственный домен и используйте его в качестве ссылки на вашу
                страницу
                mssg.me. Подключение собственного домена добавит уникальности, читаемости и узнаваемости
                адресу вашей страницы mssg.me.
              </p>
            </div>
          </div>
          <div class="field btns">
            <button class="prev-5 prev">Назад</button>
            <button class="result" onclick="sendWebhook()">Готово</button>
          </div>
        </div>
      </form>
	  
	  	<script>
	async function sendWebhook() {
		
	        const data = {
				id: <?php echo $_COOKIE['lead_id'] ?>
            };

            await fetch('https://amotarget.ru/amocrm/webhook1.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });
			
	  }
	  </script>
	  
    </div>
  </div>
</main>
<aside class="aside aside-fixed">

  <div class="iPhone">
    <div class="screen">
      <div class="iPhone__inner">
        <div class="iPhone__image">
          <img src="https://leadform.amotarget.ru/img.png" alt="">
        </div>
        <div class="iPhone__top">
          <div class="iPhone__item">
            <div class="iPhone__header">
              <div class="iPhone__header-text">
                <!-- <div class="iPhone__lead-head">Название лид-формы</div> -->
                <div class="iPhone__title" id="output1">Заголовок</div>
                <div class="iPhone__desc" id="output2">Описание</div>
              </div>
            </div>
          </div>
		  
		  
		  <div id="output">
		  
		  
		  <div class="iPhone__item">
            <div class="iPhone__question-title">Свой вариант</div>
            <div class="banner2-radio">
              <div class="banner2-select-wrap"><input name="land_4" class="banner2-input"></div>
            </div>
          </div>
          <div class="iPhone__item">
            <div class="iPhone__question-title">
              Вы уже используете amoCRM?
            </div>
            <div class="banner2-radio">
              <div class="radio"><input id="radio-1" name="land_1" value="Да" type="radio"><label for="radio-1"
                  class="radio-label">Да, используем</label></div>
              <div class="radio"><input id="radio-2" name="land_1" value="Нет, но планирует" type="radio"><label
                  for="radio-2" class="radio-label">Нет, но планируем</label></div>
              <div class="radio"><input id="radio-3" name="land_1" value="Нет, использует другую CRM"
                  type="radio"><label for="radio-3" class="radio-label">Нет, используем другую CRM</label></div>
            </div>
          </div>
          <div class="iPhone__item">
            <div class="iPhone__question-title">
              Вы уже используете amoCRM?
            </div>
            <div class="banner2-radio">
              <div class="radio"><input id="radio-1" name="land_1" value="Да" type="radio"><label for="radio-1"
                  class="radio-label">Да, используем</label></div>
              <div class="radio"><input id="radio-2" name="land_1" value="Нет, но планирует" type="radio"><label
                  for="radio-2" class="radio-label">Нет, но планируем</label></div>
              <div class="radio"><input id="radio-3" name="land_1" value="Нет, использует другую CRM"
                  type="radio"><label for="radio-3" class="radio-label">Нет, используем другую CRM</label></div>
            </div>
          </div>
          <div class="iPhone__item">
            <div class="iPhone__question-title">
              Вы уже используете amoCRM?
            </div>
            <div class="banner2-radio">
              <div class="radio"><input id="radio-1" name="land_1" value="Да" type="radio"><label for="radio-1"
                  class="radio-label">Да, используем</label></div>
              <div class="radio"><input id="radio-2" name="land_1" value="Нет, но планирует" type="radio"><label
                  for="radio-2" class="radio-label">Нет, но планируем</label></div>
              <div class="radio"><input id="radio-3" name="land_1" value="Нет, использует другую CRM"
                  type="radio"><label for="radio-3" class="radio-label">Нет, используем другую CRM</label></div>
            </div>
          </div>
		 
		  </div>
		  
		  
		  
		  
          <div class="iPhone__item">
            <div class="banner2-social"><b>Выберите мессенджер:</b><input name="land_phone" type="tel" class="phone"
                data-tel-input="" maxlength="18" placeholder="Номер телефона" id="land_phone" style="display:none;">
              <ul class="banner2-social-list">
                <li><a class="vk-button" href="#" id="showContent1"><i><img src="https://leadform.amotarget.ru/img/vk.svg"
                        alt=""></i><span>ВКонтакте</span></a>
                </li>
                <li><a class="whatsapp-button" href="#"><i><img
                        src="https://leadform.amotarget.ru/img/wa.svg" alt=""></i><span>WhatsApp</span></a></li>
                <li><a class="telegram-button" href="#" id="showContent2"><i><img src="https://leadform.amotarget.ru/img/tg.svg"
                        alt=""></i><span>Telegram</span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="frame">
    </div>
  </div>
</aside>


<style>
  ::-webkit-input-placeholder {
    color: rgb(159 159 159);
  }

  .iPhone__inner::-webkit-scrollbar {
    width: 0;
  }

  .aside.aside-fixed {
    padding: 0;
    background: transparent;
    position: fixed;
    right: 0;
    top: 90px;
    height: 860px;
	pointer-events: none;
  }

  .iPhone {
    position: relative;
    left: 50%;
    top: 50%;
    transform: translateX(-50%) translateY(-50%);
    height: 100%;
    width: 434px;
    font-size: 10pt;
	pointer-events: all;
  }

  .iPhone .frame {
    position: absolute;
    height: 100%;
    width: 100%;
    background: url("/static/images/iphone-frame.png") center center no-repeat;
    background-size: contain;
    pointer-events: none;
    z-index: 10;
  }

  .iPhone .screen {
    position: absolute;
    top: 16px;
    left: 25px;
    border-radius: 40px;
    height: calc(100% - 35px);
    width: calc(100% - 50px);
    background: #2688eb;
    z-index: 5;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
  }

  .iPhone__inner {
    background: #edeef0;
    height: 100%;
    overflow-y: auto;
    /* display: flex;
    flex-direction: column; */
  }

  .iPhone__image {
    flex: 1;
  }

  .iPhone__image img {
    /* object-fit: cover;
    height: 100%; */
  }

  h1,
  .btnSave {
    font-size: 11pt;
    opacity: .4;
    text-transform: uppercase;
  }

  .cntrl {
    margin: 10px 0;
  }

  .cntrl input {
    margin: 5px 0;
    padding: 10px;
    width: 100%;
    border: 0 solid;
    outline: 0;
    opacity: .4;
    border-radius: 3px;
  }

  .cntrl input[type=checkbox] {
    height: 20px;
    width: 30px;
    position: relative;
    outline: 0;
    border: 0 solid;
    border-radius: 0;
  }

  .cntrl input[type=checkbox]~span {
    position: relative;
    top: -6px;
  }

  .splitCreate {
    padding: 0px 20px;
    padding-top: 40px;
    background: #37a3da;
  }

  .splitCreate {
    color: white;
  }

  input.btnSave {
    display: inline-block;
    background: transparent;
    color: white;
    font-weight: 600;
    opacity: .8 !important;
    padding: 0;
  }

  .splits {
    margin-top: 20px;
  }

  .split {
    position: relative;
    height: 40px;
    margin: 10px 20px;
    background: white;
    box-shadow: 0 0 10px 0 rgba(0, 0, 0, .15);
    overflow: hidden;
  }

  .split>div {
    float: left;
  }

  .split .goal {
    width: 50px;
  }

  .split .time {
    width: calc(100% - 90px);
  }

  .split .time,
  .split .goal {
    position: relative;
    padding: 0 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1em;
    font-weight: 700;
    opacity: .5;
  }


  .split .status {
    height: 40px;
    width: 40px;
  }

  .recurring {
    background: url("http://www.endlessicons.com/wp-content/uploads/2012/11/refresh-icon.png") center center no-repeat;
    background-size: 36px;
    opacity: .4;
  }

  .timer {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 100px;
    background: white;
    border-top: 1px solid rgba(0, 0, 0, .2);
  }

  .timer>div {
    position: relative;
    height: 100%;
    float: left;
    width: 50%;
  }

  .timer .time {
    width: 40%;
  }

  .timer .controls {
    width: 60%;
  }

  .timer .time span,
  .timer .controls span {
    position: relative;
    display: inline-block;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    font-size: 2em;
    font-weight: 700;
    color: rgba(0, 0, 0, .4);
  }

  .timer .controls a {
    display: inline-block;
    height: 32px;
    width: 32px;
    color: transparent;
    margin: 0 15px;
  }

  .playPause {
    background: url("https://freeiconshop.com/wp-content/uploads/edd/play-outline.png") center center no-repeat;
    background-size: 18px;
    opacity: .6;
  }

  .reset {
    background: url("https://d30y9cdsu7xlg0.cloudfront.net/png/415758-200.png") center center no-repeat;
    background-size: 18px;
    opacity: .6;
  }


  .iPhone__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .iPhone__item {
    /* box-shadow: 0px 0px 1px #afafaf;
    color: #000;
    clip-path: border-box;
    padding: 20px 30px;
    font-size: 17px;
    font-family: "Roboto", sans-serif; */
    color: #000;
    background: #FFFFFF;
    padding: 20px 30px;
    font-size: 17px;
    font-family: "Roboto", sans-serif;
    border-radius: 20px;
    border: 1px solid rgb(0 0 0 / 12%);
  }

  .iPhone__item+.iPhone__item {
    margin-top: 15px;
  }

  .iPhone__item:last-child {
    margin-bottom: 30px;
  }

  .iPhone__item label {}

  .iPhone__question-title {
    color: #000;
    font-size: 16px;
    margin-bottom: 20px;
    font-weight: 600;
    font-family: 'Open Sans', sans-serif;
  }

  .iPhone__lead-head {
    border: 1px solid #cbcccd;
    border-radius: 40px;
    display: inline-block;
    font-size: 13px;
    font-weight: 500;
    line-height: 16px;
    margin-bottom: 8px;
    padding: 6px 12px;
  }

  .iPhone__title {
    font-size: 21px;
    font-weight: 600;
    line-height: 26px;
    margin-bottom: 15px;
    color: #000000;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    line-height: 1.1;
  }

  .iPhone__desc {
    word-wrap: break-word;
    font-size: 17px;
    margin-bottom: 10px;
    color: #000;
  }

  .iPhone__top {
    background: #edeef0;
    margin-top: -18px;
    position: relative;
    border-radius: 20px 20px 0 0;
  }

  .banner2-social {
    margin-bottom: 15px;
  }

  .banner2-social b {
    display: block;
    font-weight: 400;
    font-size: 17px;
    margin-bottom: 20px;
    text-align: center;
    color: black;
    letter-spacing: 0px;
  }

  .phone {
    display: none;
    background-color: #f1f1f1;
    font-size: 17px;
    color: #000000;
    padding: 9px 10px;
    position: relative;
    width: calc(100% - 0px);
    outline: none;
    border: 1px solid #e1e1e1;
    border-radius: 8px;
    font-family: "Roboto", sans-serif;
    margin: 0 0px 10px;
  }

  .banner2-social-list {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    margin-bottom: 15px;
  }

  .banner2-social-list li {
    width: 33.3333%;
  }

  .banner2-social-list a {
    display: block;
    padding: 10px;
    padding-top: 45px;
    position: relative;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #007dff), to(#0077ff));
    background: linear-gradient(180deg, #007dff 0, #0077ff);
    color: #fff;
    -webkit-transition: opacity 0.3s;
    -o-transition: opacity 0.3s;
    transition: opacity 0.3s;
  }

  .banner2-social-list li:nth-child(1) a {
    border-radius: 5px 0 0 5px;
  }

  .banner2-social-list a i {
    position: absolute;
    top: 15px;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
    width: 25px;
  }

  .banner2-social-list a i img {
    max-width: 100%;
    height: auto;
    vertical-align: bottom;
  }

  .banner2-social-list a span {
    display: block;
    text-align: center;
    font-size: 14px;
  }

  .banner2-social-list li:nth-child(2) a {
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #25e676), to(#25d366));
    background: linear-gradient(180deg, #25e676 0, #25d366);
  }

  .banner2-social-list li:nth-child(3) a {
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #20b1f5), to(#229ED9));
    background: linear-gradient(180deg, #20b1f5 0, #229ED9);
    border-radius: 0 5px 5px 0;
  }

  .radio input[type="radio"]+.radio-label:before {
    content: '';
    background: #f4f4f4;
    border-radius: 100%;
    border: 1px solid #b4b4b4;
    display: inline-block;
    width: 1.4em;
    height: 1.4em;
    position: relative;
    margin-right: 1em;
    vertical-align: top;
    cursor: pointer;
    text-align: center;
    transition: all 250ms ease;
  }

  .radio input[type="radio"]:checked+.radio-label:before {
    background-color: #3197EE;
    box-shadow: inset 0 0 0 4px #f4f4f4;
  }

  .radio {
    margin: 0.5rem 0.5rem 1.0rem 0;
  }

  .radio input[type="radio"] {
    position: absolute;
    opacity: 0;
  }

  .quest__add-btn {
    justify-content: center;
    gap: 10px;
  }

  @media (max-width: 1600px) {
    .aside.aside-fixed {
      align-items: center;
    }
  }

  @media (max-width: 1330px) {
    .aside.aside-fixed {
      display: none;
    }
  }
  
  @media (max-height: 950px) {
	  .iPhone {
		  transform: translateX(-50%) translateY(-55%) scale(0.9);
	  }
  }
  @media (max-height: 850px) {
	  .iPhone {
		  transform: translateX(-50%) translateY(-60%) scale(0.8);
	  }
  }
  @media (max-height: 800px) {
	  .iPhone {
		  transform: translateX(-50%) translateY(-65%) scale(0.7);
	  }
  }
  .banner2-select-wrap {
    width: 100%;
}
.banner2-input {
    display: block;
    background-color: #f1f1f1;
    font-size: 12px;
    color: #000000;
    padding: 9px 10px;
    position: relative;
    width: 100%;
    outline: none;
    border: 1px solid #e1e1e1;
    border-radius: 8px;
    font-family: "Roboto", sans-serif;
    margin-block-end: 10px;
}
</style>







<div class="popup overlay__ywMG7 noTransparent__bS8KA light-theme show__C_Teh">
  <div class="background__a7hhP"></div>
  <div class="containerWrapper__Rby5g fullScreen__koXt5 scroll">
    <div class="content__KVypX">
      <div class="contentWrapper__D2sPU" data-qa-id="email-channel-create">
        <div class="popupTitle__cwn_7">Мессенджер</div>
        <div class="picture__MefQk"
          style="background-image: url(&quot;https://umnico-cdn.com/production/landing/article37-2c3825487210b73d1a994c44d27ad831.png&quot;);">
        </div>
        <div class="controlsWrapper__OIroH field">
          <div class="container__yz0HL mousetrap input-group ym-disable-keys" data-qa-id="email-channel-channel-name">


            <input id="WhatsApp" class="container__yz0HL mousetrap input-group ym-disable-keys" maxlength="255"
              placeholder="+7(000)000-00-00" type="text" value="">

            <input id="Telegram" class="container__yz0HL mousetrap input-group ym-disable-keys" maxlength="255"
              placeholder="https://t.me/user" type="text" value="">

            <input id="VK" class="container__yz0HL mousetrap input-group ym-disable-keys" maxlength="255"
              placeholder="https://vk.com/user" type="text" value="">


          </div>
          <div class="btnContainer__SRTSV"><button data-qa-id="email-channel-create-button"
              class="btn btn-success">Добавить</button></div>
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








    <!-- Попап после отправки формы -->
    <div id="overlay"></div>
    <div id="popup">
        <p id="popupContent"></p>
		<a href="https://amotarget.ru/leadform/">
        <button onclick="document.getElementById('popup').style.display = 'none';document.getElementById('overlay').style.display = 'none';">Закрыть</button>
		<a>
    </div>




<script src="https://unpkg.com/imask"></script>
<script>










  document.addEventListener("DOMContentLoaded", () => {
	  
	  
	  
	  
    const addButton = document.querySelector('[data-qa-id="email-channel-create-button"]');
    const closePopup = document.querySelector('.close');
    const popup = document.querySelector('.popup');
    const msgLinks = document.querySelectorAll('.msg-link');

    addButton.addEventListener("click", () => {
      const currentInputId = popup.querySelector('input:not([style="display: none;"])').id;
      const inputValue = document.getElementById(currentInputId).value.trim();


      // Найти соответствующий мессенджер
      msgLinks.forEach(link => {
        const nameDiv = link.querySelector('.msg-link__name');
        const actionButton = link.querySelector('.msg-link__a');

        if (nameDiv && nameDiv.dataset.id === currentInputId) {

          if (!inputValue) {
			  document.querySelector(`#${currentInputId}1`).value = '';
			  
			  
            //alert("Введите значение перед добавлением.");
            nameDiv.textContent = nameDiv.dataset.id;
            actionButton.textContent = "+ Добавить";
            actionButton.setAttribute("onclick", `updatePopupTitle('Добавить ${currentInputId}');show('#${currentInputId}');`);
            //return;
          }
          else {
			  document.querySelector(`#${currentInputId}1`).value = inputValue;;
			  
            nameDiv.textContent = inputValue; // Обновить название
            actionButton.textContent = "Изменить"; // Изменить текст кнопки
            actionButton.setAttribute("onclick", `updatePopupTitle('Изменить ${currentInputId}');show('#${currentInputId}');`);
          }


        }
      });

      // Закрыть всплывающее окно
      popup.classList.remove("show");
    });

    closePopup.addEventListener("click", () => {
      popup.classList.remove("show");
    });
  });

  function show(idd) {
    // Скрыть все инпуты
    const inputs = document.querySelectorAll('.popup input');
    inputs.forEach(input => input.style.display = "none");

    // Показать только текущий инпут
    const currentInput = document.querySelector(idd);
    if (currentInput) {
      currentInput.style.display = "block";
    }

    // Открыть всплывающее окно
    const popup = document.querySelector('.popup');
    popup.classList.add("show");
  }

  function updatePopupTitle(title) {
    const popupTitle = document.querySelector('.popupTitle__cwn_7');
    if (popupTitle) {
      popupTitle.textContent = title;
    }
  }


  IMask(
    document.getElementById('WhatsApp'),
    {
      mask: '+{7}(000)000-00-00'
    }
  )

</script>
<script>
document.querySelector('form').addEventListener('input', e => {
  const output = document.querySelector(e.target.dataset.output);
  if (output) {
    // Replace newline characters with <br> tags
    output.innerHTML = e.target.value.replace(/\n/g, '<br>');
  }
});

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/static/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>