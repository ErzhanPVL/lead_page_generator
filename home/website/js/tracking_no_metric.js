function generateUniqueId() {
    return `idvisit_${Date.now()}_${Math.random().toString(36).substr(2, 9)}`;
}


function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : '';
}

function setCookie(name, value, options) {
  options = options || {};

  var expires = options.expires;

  if (typeof expires == "number" && expires) {
    var d = new Date();
    d.setTime(d.getTime() + expires * 1000);
    expires = options.expires = d;
  }
  if (expires && expires.toUTCString) {
    options.expires = expires.toUTCString();
  }

  value = encodeURIComponent(value);

  var updatedCookie = name + "=" + value;

  for (var propName in options) {
    updatedCookie += "; " + propName;
    var propValue = options[propName];
    if (propValue !== true) {
      updatedCookie += "=" + propValue;
    }
  }

  document.cookie = updatedCookie;
}


let buttonClicked = false;  // This is a flag

$(document).ready(function() {
	
	
	let idvisit = getCookie('idvisit');
    if (!idvisit) {
        idvisit = generateUniqueId();
        setCookie('idvisit', idvisit, { expires: 604800 });
    }
  
  let amoPixel = '';
  
  	  if (getCookie('_ym_uid')) {
		  amoPixel = `${getCookie('_ym_uid')}`;
		} else {
			setCookie('_ym_uid', idvisit, { expires: 604800 });
		  amoPixel = idvisit;
		}
  
  let amoInterval = setInterval(function() {
    if (window.hasOwnProperty('Ya')) {
      clearInterval(amoInterval);
      //amoPixel = `${getCookie('_ym_uid')}`;

      let waMessage = encodeURIComponent(`Промокод: ${amoPixel} Нажмите отправить 👉`);
      let waURL = `https://wa.me/777/?text=${waMessage}`;
      //mini-landing
      //$('.vk-button').prop('href', `vk://vk.com/write-21103494?ref=${amoPixel}`);
      //$('.whatsapp-button').prop('href', `whatsapp://send?text=Получить скидку на массаж&phone=7777`);
      //$('.telegram-button').prop('href', `tg://resolve?domain=Bot&start=${amoPixel}`);
	  
	  let currentHref = $('#tg').prop('href');

// Добавляем параметр &start=${amoPixel} к текущей ссылке
	if (currentHref) {
		let newHref = currentHref.includes('?') 
			? `${currentHref}&start=${amoPixel}`  // Если уже есть параметры, добавляем через &
			: `${currentHref}?start=${amoPixel}`; // Если параметров нет, добавляем через ?

		// Устанавливаем обновленную ссылку
		$('#tg').prop('href', newHref);
		
	currentHref = $('#vk').prop('href');
}
	if (currentHref) {
		newHref = currentHref.includes('?') 
			? `${currentHref}&ref=${amoPixel}`  
			: `${currentHref}?ref=${amoPixel}`; 

		// Устанавливаем обновленную ссылку
		$('#vk').prop('href', newHref);
		
}
	  
	  
    }
  }, 500);
  
  let visited = getCookie('visited');
  
  if (!visited) {
    let interval = setInterval(function() {
      //if (!window.hasOwnProperty('Ya') && !window.hasOwnProperty('roistat') && !window.hasOwnProperty('gtag')) return;
      
      let keys = ['idvisit', '_ym_uid', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'roistat_visit', 'referrer', 'from', '_ga', '_ym_counter', 'gclid', 'utm_referrer', 'search_phrase', 'gender', 'age', 'geo', 'rb_clickid', 'device_type', 'keyword', 'match_type', 'matched_keyword', 'position_type', 'source', 'source_type', 'region_name', 'campaign_type', 'impression_weekday', 'impression_hour', 'user_timezone', 'gbid', 'adtarget_name', 'roistat', 'version',];
      
      let data = {};
      
		for (key of keys) {

				data[key] = encodeURIComponent(getCookie(key));
			
		}

      
      data['_ym_counter'] = '98329750';
	 
//alert('ok');      
      $.post('https://connect.aimessg.ru/projects/demo/new.php', data);
	  
      setCookie('visited', '1', {expires: 604800});
      clearInterval(interval);
    }, 1000);
    
  }
  
   setTimeout(function() {
	   
	   
	   
	   

    
  
  
  $("#wa, .qr__btn, .whatsapp-button, .chatRoom1-buttons > a:nth-child(1)").on("click", function() {
	  
	  
	 
	  
    // Only send the request if the button hasn't been clicked before during this session.
    if (allFieldsFilled() && !buttonClicked) {
		
      buttonClicked = true;
	  //alert('ok');

     let keys = ['idvisit', '_ym_uid'];
	 
	 			 if($('input[name="land_1"]:checked').val() != undefined){
				land_1 = $('input[name="land_1"]:checked').val();}
			 else{
				land_1 = $('input[name="land_1"]').val();}
			 
			 if($('input[name="land_2"]:checked').val() != undefined){
				land_2 = $('input[name="land_2"]:checked').val();}
			 else{
				land_2 = $('input[name="land_2"]').val();}
			 
			 if($('input[name="land_3"]:checked').val() != undefined){
				land_3 = $('input[name="land_3"]:checked').val();}
			 else{
				land_3 = $('input[name="land_3"]').val();}
      
      let data = {
            //'land_1': $('select[name="land_1"]').val(),
            'land_1': land_1,
			//'land_2': $('select[name="land_2"]').val(),
			'land_2': land_2,
            //'land_3': document.querySelectorAll('input[type="radio"]:checked')[2].value,
            'land_3': land_3,
            'land_address': $('input[name="land_5"]').val(),
            'land_view': $('input[name="land_6"]').val(),
            'land_income': $('input[name="land_7"]').val(),
            'land_ogrn': $('input[name="land_8"]').val(),
            'land_ceo': $('input[name="land_9"]').val(),
            'land_capital': $('input[name="land_10"]').val(),
            'land_inn': $('input[name="land_11"]').val(),
            'land_pers': $('input[name="land_12"]').val(),
            'land_views': $('input[name="land_13"]').val(),
            'land_ogrndate': $('input[name="land_14"]').val(),
			'land_phone': $('input[name="land_phone"]').val(),

        };
		
		//console.log(data)
      
      for (key of keys) {
        data[key] = encodeURIComponent(getCookie(key));
      }
      
      //data['_ym_counter'] = '85685440';
	  data['isclicked'] = true;
	  
	  	  	  let originalUrl = window.location.href;
let strippedUrl = stripUrlMarks(originalUrl);
	  data['current_url'] = strippedUrl;

      //alert('ok');
      $.post('https://connect.aimessg.ru/projects/demo/up.php', data);


    }
  });
  
  function allFieldsFilled() {
    let allFilled = true;
    $("form.banner2-form select").each(function() {
        if (!$(this).val() || $(this).val() === "") {
            allFilled = false;
            return false; 
        }
    });
    return allFilled;
}
  
  
  
  
$('.chatRoom1-buttons').on('click', function() {
		
		     let keys = ['_ym_uid'];
      
      let data = {};
      
      for (key of keys) {
        data[key] = encodeURIComponent(getCookie(key));
      }
      
      //data['_ym_counter'] = '85685440';
	  	  let originalUrl = window.location.href;
let strippedUrl = stripUrlMarks(originalUrl);
	  data['current_url'] = strippedUrl;


      
      $.post('https://connect.aimessg.ru/projects/demo/up_url.php', data);

    });
  
  
 }, 1000);  // delay
  
  
    $('#vk, #tg, .vb, #wa, .telegram-button, .vk-button').on('click', function() {
		
		     let keys = ['idvisit', '_ym_uid'];
			 
			 if($('input[name="land_1"]:checked').val() != undefined){
				land_1 = $('input[name="land_1"]:checked').val();}
			 else{
				land_1 = $('input[name="land_1"]').val();}
			 
			 if($('input[name="land_2"]:checked').val() != undefined){
				land_2 = $('input[name="land_2"]:checked').val();}
			 else{
				land_2 = $('input[name="land_2"]').val();}
			 
			 if($('input[name="land_3"]:checked').val() != undefined){
				land_3 = $('input[name="land_3"]:checked').val();}
			 else{
				land_3 = $('input[name="land_3"]').val();}
      
      let data = {
            //'land_1': $('select[name="land_1"]').val(),
            'land_1': land_1,
			//'land_2': $('select[name="land_2"]').val(),
			'land_2': land_2,
            //'land_3': document.querySelectorAll('input[type="radio"]:checked')[2].value,
            'land_3': land_3,
            'land_address': $('input[name="land_5"]').val(),
            'land_view': $('input[name="land_6"]').val(),
            'land_income': $('input[name="land_7"]').val(),
            'land_ogrn': $('input[name="land_8"]').val(),
            'land_ceo': $('input[name="land_9"]').val(),
            'land_capital': $('input[name="land_10"]').val(),
            'land_inn': $('input[name="land_11"]').val(),
            'land_pers': $('input[name="land_12"]').val(),
            'land_views': $('input[name="land_13"]').val(),
            'land_ogrndate': $('input[name="land_14"]').val(),
			'land_phone': $('input[name="land_phone"]').val(),

        };
      
      for (key of keys) {
        data[key] = encodeURIComponent(getCookie(key));
      }
      
      //data['_ym_counter'] = '85685440';
	  	  let originalUrl = window.location.href;
let strippedUrl = stripUrlMarks(originalUrl);
	  data['current_url'] = strippedUrl;


      
      $.post('https://connect.aimessg.ru/projects/demo/up_url.php', data);
	  

    });
  
  



const deepmerge = (target, source) => {
  for (const key of Object.keys(source)) {
    if (source[key] instanceof Object) Object.assign(source[key], deepmerge(target[key], source[key]))
  }
  Object.assign(target || {}, source)
  return target
}
function getQueryParams() {
    var params = {},
        tmp = [];
    var items = location.search.substr(1).split("&");
    for (var index = 0; index < items.length; index++) {
        tmp = items[index].split("=");
        params[tmp[0]] = decodeURIComponent(tmp[1]);
    }
    return params;
}

var utmCookie = {
  cookieNamePrefix: "",

  utmParams: ["utm_source",
              "utm_medium",
              "utm_campaign",
              "utm_referrer",
              "utm_term",
              "gclid",
              "ymclid",
              "fbclid",
              "yclid",
              "_ga",
              "_ym_counter",
              "search_phrase",
              "gender",
              "age",
              "geo",
              "rb_clickid",
              "device_type",
              "matched_keyword",
              "match_type",
              "position_type",
              "source",
              "source_type",
              "region_name",
              "campaign_type",
              "impression_weekday",
              "impression_hour",
              "user_timezone",
              "gbid",
              "adtarget_name",
              "version",
              "utm_content"],

  cookieExpiryDays: 365,
  createCookie: function(name, value, days) {
    if (days) {
      var date = new Date();
      date.setTime(date.getTime()+(days*24*60*60*1000));
      var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = this.cookieNamePrefix + name+"="+value+expires+"; path=/";
  },
  readCookie: function(name) {
    var nameEQ = this.cookieNamePrefix + name + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return '';
  },
  readAllCookie: function() {
    _cookies = {};
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i < ca.length; i++) {
      let c = ca[i];
      c = c.split('=');
      _cookies[c[0].replace(' ', '')] = c[1];
    }
    return _cookies;
  },
  eraseCookie: function(name) {
    this.createCookie(name,"",-1);
  },
  getParameterByName: function(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(window.location.search);
    if(results == null) {
      return "";
    } else {
      return results[1].replace(/\+/g, " ");
    }
  },
  utmPresentInUrl: function() {
    var present = false;
    for (var i = 0; i < this.utmParams.length; i++) {
      var param = this.utmParams[i];
      var value = this.getParameterByName(param);
      console.log(param, value)
      if (value != "" && value != undefined) {
        present = true;
      }
    }
    return present;
  },
  writeUtmCookieFromParams: function() {
    for (var i = 0; i < this.utmParams.length; i++) {
      var param = this.utmParams[i];
      var value = this.getParameterByName(param);
      this.createCookie(param, value, this.cookieExpiryDays)
      this.writeCookieOnce(`fv_${param}`, value, this.cookieExpiryDays);
    }
  },
  writeCookieOnce: function(name, value) {
    var existingValue = this.readCookie(name);
    if (!existingValue) {
      this.createCookie(name, value, this.cookieExpiryDays);
    }
  },
  writeReferrerOnce: function() {
    value = document.referrer;
    if (value === "" || value === undefined) {
      this.writeCookieOnce("referrer", "direct");
    } else {
      this.writeCookieOnce("referrer", value);
    }
  },
  referrer: function() {
    return this.readCookie("referrer");
  }
};

utmCookie.writeReferrerOnce();
utmCookie.writeCookieOnce('first_visit', Math.floor(Date.now() / 1000));
utmCookie.createCookie('href', location.href);
utmCookie.createCookie('hostname', location.hostname);

if (utmCookie.utmPresentInUrl()) {
  utmCookie.writeUtmCookieFromParams();
}
/*
var amgate = {
    init: function() {
        this.pixel.load();
        this.pixel.save();
        //this.metrika.save();

        let openstat = utmCookie.getParameterByName('_openstat');
        if (openstat) {
          let { openstat_service, openstat_campaign, openstat_ad, openstat_source } = atob(openstat).split(';');
          utmCookie.createCookie('openstat_service', openstat_service);
          utmCookie.createCookie('openstat_campaign', openstat_campaign);
          utmCookie.createCookie('openstat_ad', openstat_ad);
          utmCookie.createCookie('openstat_source', openstat_source);
        }
    },
    pixel: {
        load: function() {
            let script = window.document.createElement('script');
            script.async = true;
            script.id = 'amocrm_pixel';
            script.src ='https://piper.amocrm.ru/pixel/js/identifier/pixel_identifier.js';
            window.document.head.appendChild(script);
        },
        save: function() {
            try {
                utmCookie.createCookie('amgate_visitor_uid', this.pixel.get()); 
            } catch (error) {}
        },
        get: function() {
          return (AMO_PIXEL_CLIENT) ? AMO_PIXEL_CLIENT.getSessionUid() : null;
        }
    }
	
	,
    metrika: {
        save: function() {
            try {
                let metrika = Ya._metrika.getCounters().shift().id;
                utmCookie.createCookie('metrika', metrika);  
            } catch (error) {}
        },

        get: function() {
          try {
              return Ya._metrika.getCounters().shift().id;
          } catch (error) {
              return '';
          }
        }
    }
	
	
}
*/
setInterval(function() {
  try {
  if (amo_social_button !== undefined) {
    amo_social_button.setMeta({
      contact: {
          custom_fields: [
          ]
      },
      lead: {
          custom_fields: [
            { id: 41570, values: [{ value: utmCookie.readCookie('utm_source') }] },
            { id: 41566, values: [{ value: utmCookie.readCookie('utm_medium') }] },
            { id: 41568, values: [{ value: utmCookie.readCookie('utm_campaign') }] },
            { id: 41572, values: [{ value: utmCookie.readCookie('utm_term') }] },
            { id: 41564, values: [{ value: utmCookie.readCookie('utm_content') }] },
            { id: 41574, values: [{ value: utmCookie.readCookie('utm_referrer') }] },
            { id: 41604, values: [{ value: utmCookie.readCookie('yclid') }] },
            { id: 41600, values: [{ value: utmCookie.readCookie('gclid') }] },
            { id: 41606, values: [{ value: utmCookie.readCookie('fbclid') }] },
            { id: 41596, values: [{ value: utmCookie.readCookie('_ym_uid') }] },
            //{ id: 41598, values: [{ value: amgate.metrika.get() }] },
            { id: 41576, values: [{ value: utmCookie.readCookie('roistat_visit') }] },
            { id: 1027561, values: [{ value: utmCookie.readCookie('referrer') }] },
            { id: 41592, values: [{ value: utmCookie.readCookie('href') }] },
            { id: 41594, values: [{ value: utmCookie.readCookie('_ga') }] },
            { id: 41582, values: [{ value: utmCookie.readCookie('openstat_service') }] },
            { id: 41586, values: [{ value: utmCookie.readCookie('openstat_campaign') }] },
            { id: 41590, values: [{ value: utmCookie.readCookie('openstat_source') }] },
            { id: 41588, values: [{ value: utmCookie.readCookie('openstat_ad') }] }
          ]
      }
    });
    amoSocialButton('onButtonClick', function (service, link) {
		/*
        if (amgate.metrika.get()) {
            ym(amgate.metrika.get(), 'reachGoal', `crmplugin_click`);
            ym(amgate.metrika.get(), 'reachGoal', `crmplugin_${service}`);
        }
		*/
        try {} catch (e) {
            ga('send', 'event', 'crmplugin', `click`);
            ga('send', 'event', 'crmplugin', `${service}`);
        }
        amoSocialButton('sendKeyActionHook', `crmplugin_click`);
        amoSocialButton('sendKeyActionHook', `crmplugin_${service}`);
    });
}

} catch (e) {}
}, 5000);


function stripUrlMarks(url) {
    // Remove the query part of the URL
    url = url.split('?')[0];

    // Remove the fragment part of the URL
    url = url.split('#')[0];

    return url;
}













});





