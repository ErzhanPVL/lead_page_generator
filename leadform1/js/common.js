$(document).ready(function () {

  $('select').styler();


  if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
  } else {
    document.body.classList.add('no-touch');
  }

  function ibg() {
    let ibg = document.querySelectorAll(".ibg");
    for (var i = 0; i < ibg.length; i++) {
      if (ibg[i].querySelector('img')) {
        ibg[i].style.backgroundImage = 'url(' + ibg[i].querySelector('img').getAttribute('src') + ')';
      }
    }
  }
  ibg();

  //function getCookie(name) {
  //let matches = document.cookie.match(new RegExp(
  //"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  //));
  //return matches ? decodeURIComponent(matches[1]) : undefined;
  //}

  //function getUrlVars() {
  //let vars = {};
  //let parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value){
  //vars[key] = decodeURIComponent(value);
  //});
  //return vars;
  //}

  function makeLinks() {
    ym(69767485, 'getClientID', function (clientID) {
      let formData = $('form').serializeArray();
      formData.push({ name: 'yandexClientID', value: clientID });

      let value = '';

      let values = formData.map(function (item) {
        return item.value
      });

      value += values.join('_');

      value += '_' + getCookie('roistat_visit');

      var utm_keys = ['utm_source'];
      var vars = getUrlVars();

      for (var i = 0; i < utm_keys.length; i++) {
        let utm_key = utm_keys[i];
        let utm_value = vars[utm_keys[i]];
        if (utm_value) {
          value += '_' + utm_value
        }
        else {
          value += '_' + undefined
        }
      }


      value = '' + encodeURIComponent(value);


      let urlTelegram = '' + value;
      let urlFacebook = '' + value;
      let urlViber = '' + value;
      let urlVK = '' + value;
      let urlWhatsapp = '' + value;


      $('.telegram-button').prop('href', urlTelegram);
      $('.facebook-button').prop('href', urlFacebook);
      $('.viber-button').prop('href', urlViber);
      $('.vk-button').prop('href', urlVK);
      $('.whatsapp-button').prop('href', urlWhatsapp);
    });
  }


  $('form select').change(function () {
    //makeLinks();
  });

  //makeLinks();

  $('.banner2-social-list a').click(function (event) {
    let errors = false;
    $('.form-input-error').remove();

    // $('input[name="land_1"]').forEach(el => {
    //   if (!($(this).val())) {
    //     $(this).closest('.banner2-select-wrap').append('<span class="form-input-error">Выберите свой вариант</span>');
    //     errors = true;
    //   }
    //   iter++
    // });



// Get unique names of all radio input groups
const questions = [...new Set($('input[type="radio"]').map((_, el) => el.name).get())];

// Validate each group
questions.forEach(name => {
  const radios = $(`input[name="${name}"]`);
  const isChecked = radios.is(':checked');

  if (!isChecked) {
    radios
      .closest('.banner2-select-container')
      .append('<span class="form-input-error">👆 Выберите свой вариант</span>');
    errors = true;
  }
});



/*

    iter = 0

    let firstQuestion = Array.from($('input[name="land_1"]'))
    for (let radio of firstQuestion) {
      if (radio.checked) {
        iter++
      }
    }
    if (iter == 0) {
      $('input[name="land_1"]').closest('.banner2-select-container').append('<span class="form-input-error">👆 Выберите свой вариант</span>');
      errors = true
    }
    iter = 0
    let secQuestion = Array.from($('input[name="land_2"]'))
    for (let radio of secQuestion) {
      if (radio.checked) {
        iter++
      }
    }
    if (iter == 0) {
      $('input[name="land_2"]').closest('.banner2-select-container').append('<span class="form-input-error">👆 Выберите сферу деятельности</span>');
      errors = true
    }
    iter = 0
    let thQuestion = Array.from($('input[name="land_3"]'))
    for (let radio of thQuestion) {
      if (radio.checked) {
        iter++
      }
    }

*/



   // if (!($('.error_submit-check').val())) {
     // $('.error_submit-check').closest('.banner2-select-container').append('<span class="form-input-error">👆 Укажите компанию</span>');
     // errors = true;
   // }
	
	if (!event.target.closest('.whatsapp-button')) {
		
		//console.log('adada')
	
		if (!($('input[name="land_phone"]').val().length > 3 )) {
		  $('input[name="land_phone"]').after('<span class="form-input-error">👆 Введите номер и выберите мессенджер</span>');
		  errors = true;
		}
	
	}

    if (errors) {
      return false;
    }


  });

  $('.banner2-input').keydown(function (event) {
    if (event.keyCode == 13) {
      return false;
    }
  });
});