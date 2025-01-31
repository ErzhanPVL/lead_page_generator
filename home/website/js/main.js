jQuery(function ($) {
  $("input[type='tel']").inputmask({ "mask": "+7 (999) 999-9999" });
  // <input type="tel" placeholder="+7 (___) ___-___" name="tel">
  const phonePattern = /^\+7 \(\d{3}\) \d{3}-\d{4}$/;
  
    $("input[type='tel']").on('input', function () {
    if (this.value.match(phonePattern)) {
      this.setCustomValidity("");
    } else {
      this.setCustomValidity("Please enter a valid phone number.");
    }
  });
  
  
  
  const forms = document.querySelectorAll('.requires-validation');
  
  
  
  Array.from(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
		       const phoneInputs = form.querySelectorAll("input[type='tel']");
      const phonePattern = /^\+7 \(\d{3}\) \d{3}-\d{4}$/;

      let atLeastOneValid = false;
	  //const link;

      phoneInputs.forEach((phoneInput) => {
        const phoneValue = phoneInput.value;
        if (phoneValue.match(phonePattern)) {
          atLeastOneValid = true;
				phoneInputs.forEach((phoneInput) => {
				  phoneInput.setCustomValidity("");
				});
        }
      });

      // Check if at least one phone number is valid
      if (!atLeastOneValid) {
        event.preventDefault();
        event.stopPropagation();
		//alert('2');
        phoneInputs.forEach((phoneInput) => {
          phoneInput.setCustomValidity("At least one phone number must be valid.");
        });
      }
		  
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
		else{
			
			
			window.open(link, "_blank");
			
		}
		

        form.classList.add('was-validated')
      }, false)
    })

  $('input.ios-switch').click(function () {
    if ($(this).is(':checked')) {
      $('.check-hide').show(100);
      $('.check-hide input').prop('required',true);
    } else {
      $('.check-hide').hide(100);
      $('.check-hide input').prop('required',false);
    }
  });

  $('.tg.contacts-button').click(function () {
	  link = $(this).attr("href");
    $('.check-hide-tg').show(100);
    $('.check-hide-tg input').prop('required', true);
    $('.check-hide-vk').hide(100);
    $('.check-hide-vk input').prop('required', false);
  });
  
  $('.vk.contacts-button').click(function () {
	 link = $(this).attr("href");
    $('.check-hide-vk').show(100);
    $('.check-hide-vk input').prop('required', true);
    $('.check-hide-tg').hide(100);
    $('.check-hide-tg input').prop('required', false);
  });

$('.wa-order-pc .wa.contacts-button').click(function () {
    $('.wh-popup-fade').css("display", "flex").hide().fadeIn();
    return false;
  });

  $('.wh-popup-close').click(function () {
    $(this).parents('.wh-popup-fade').fadeOut();
    return false;
  });

  $(document).keydown(function (e) {
    if (e.keyCode === 27) {
      e.stopPropagation();
      $('.wh-popup-fade').fadeOut();
    }
  });

  $('.wh-popup-fade').click(function (e) {
    if ($(e.target).closest('.wh-popup').length == 0) {
      $(this).fadeOut();
    }
  });
})