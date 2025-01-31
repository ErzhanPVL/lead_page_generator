<!-- https://dribbble.com/shots/15392711-Dashboard-Login-Sign-Up/-->

<head>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.0/js/swiper.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.css">
<link rel="stylesheet" href="style.css">
</head>

<div class="login-container">
  <div class="login-form">
    <div class="login-form-inner">
      <div class="logo"><svg height="512" viewBox="0 0 192 192" width="512" xmlns="http://www.w3.org/2000/svg">
          <path d="m155.109 74.028a4 4 0 0 0 -3.48-2.028h-52.4l8.785-67.123a4.023 4.023 0 0 0 -7.373-2.614l-63.724 111.642a4 4 0 0 0 3.407 6.095h51.617l-6.962 67.224a4.024 4.024 0 0 0 7.411 2.461l62.671-111.63a4 4 0 0 0 .048-4.027z" />
        </svg></div>
      <h1>Авторизация</h1>
      <p class="body-text">Наслаждайтесь своим прогрессом и получайте консультационную поддержку!</p>


    <div class="sign-in-seperator">
        <span></span>
      </div>


<form id="loginForm" method="POST">
      <div class="login-form-group">
        <label for="tel">Телефон <span class="required-star">*</span></label>
        <input id="tel" name="tel" type="text" placeholder="+7(123)456-78-90">
      </div>
      <div class="login-form-group">
        <label for="pwd">Пароль <span class="required-star">*</span></label>
        <input id="pwd" name="pwd"  autocomplete="off" type="password" placeholder="Пароль" id="pwd">
      </div>

      <div class="login-form-group single-row">
        <div class="custom-check">
          <input name="remember" autocomplete="off" type="checkbox" checked id="remember"><label for="remember">Запомнить меня</label>
        </div>

        <!--	<a href="#" class="link forgot-link">Забыли пароль ?</a>	-->
      </div>

		<button type="submit" class="rounded-button login-cta">Войти</button>
      <!-- <a href="#" class="rounded-button login-cta">Войти</a> -->
</form>

    </div>

  </div>
  <div class="onboarding">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide color-1">
          <div class="slide-image">
            <img src="https://ismailvtl-images-project.vercel.app/startup-launch.png" loading="lazy" alt="" />
          </div>
          <div class="slide-content">
            <h2>Воплотите свои идеи в реальность.</h2>
            <p>Стабильное качество и удобство работы на всех платформах и устройствах.</p>
          </div>
        </div>
        <div class="swiper-slide color-1">
          <div class="slide-image">
            <img src="https://ismailvtl-images-project.vercel.app/cloud-storage.png" loading="lazy" alt="" />
          </div>
          <div class="slide-content">
            <h2>Воплотите свои идеи в реальность.</h2>
            <p>Стабильное качество и удобство работы на всех платформах и устройствах.</p>
          </div>
        </div>

        <div class="swiper-slide color-1">
          <div class="slide-image">
            <img src="https://ismailvtl-images-project.vercel.app/cloud-storage.png" loading="lazy" alt="" />
          </div>
          <div class="slide-content">
            <h2>Воплотите свои идеи в реальность.</h2>
            <p>Стабильное качество и удобство работы на всех платформах и устройствах.</p>
          </div>
        </div>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>
</div>


<script type="text/javascript" src="script.js"></script>

<script src="https://unpkg.com/imask"></script>
<script>
  IMask(
    document.getElementById('tel'),
    {
      mask: '+{7}(000)000-00-00'
    }
  )

</script>

<script>
document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target);
    const response = await fetch('login.php', {
        method: 'POST',
        body: formData,
    });

    const result = await response.json();
    if (result.status === 'success') {
        //alert('Login successful');
        // Optionally redirect the user
        window.location.href = 'https://amotarget.ru/panel/';
    } else {
        alert(result.message);
    }
});
</script>
