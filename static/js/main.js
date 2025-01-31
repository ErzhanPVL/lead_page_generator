$(document).ready(() => {
	

	
	const targetElement = document.getElementById("output");
	
	if (targetElement) {
        outputt(); 
    }
	 

const addCSS = css => document.head.appendChild(document.createElement("style")).innerHTML=css;

  $('#open-sidebar').click(() => {

    // add class active on #sidebar
    $('#sidebar').addClass('active');

    // show sidebar overlay
    $('#sidebar-overlay').removeClass('d-none');

  });


  $('#sidebar-overlay').click(function () {

    // add class active on #sidebar
    $('#sidebar').removeClass('active');

    // show sidebar overlay
    $(this).addClass('d-none');

  });

  if (document.querySelector(".view-modal-ov")) {
    const viewBtn = document.querySelector(".view-modal-ov"),
      popup = document.querySelector(".popup"),
      close = popup.querySelector(".close"),
      field = popup.querySelector(".field"),
      input = field.querySelector("input"),
      copy = field.querySelector("button");
    overlay = document.querySelector(".overlay")

    viewBtn.onclick = () => {
      popup.classList.toggle("show");
    }
    close.onclick = () => {
      viewBtn.click();
    }

    copy.onclick = () => {
      input.select(); //select input value
      if (document.execCommand("copy")) { //if the selected text copy
        field.classList.add("active");
        copy.innerText = "Copied";
        setTimeout(() => {
          window.getSelection().removeAllRanges(); //remove selection from document
          field.classList.remove("active");
          copy.innerText = "Copy";
        }, 3000);
      }
    }
  }

  const box = document.querySelectorAll('.navbarov__item:not(.active)');
  const navLink = document.querySelector('.navbarov__item.active .navbarov__link');

  for (var i = 0; i < box.length; i++) {
    box[i].addEventListener('mouseover', function handleMouseOver() {
      navLink.style.color = '#6a778e';
    });

    box[i].addEventListener('mouseout', function handleMouseOut() {
      navLink.style.color = '#FFF';
    });
  }



  if (document.querySelector(".container-form")) {
    initMultiStepForm();

    function initMultiStepForm() {
		const resultBtn = document.querySelector(".result");
      const progressNumber = document.querySelectorAll(".step").length;
      const slidePage = document.querySelector(".slide-page");
      //const submitBtn = document.querySelector(".submit");
      const progressText = document.querySelectorAll(".step p");
      const progressCheck = document.querySelectorAll(".step .check");
      const bullet = document.querySelectorAll(".step .bullet");
      const pages = document.querySelectorAll(".form-outer .page");
      const nextButtons = document.querySelectorAll(".next");
      const prevButtons = document.querySelectorAll(".prev");
      const stepsNumber = pages.length;
      const addQuestField = document.querySelector(".add-quest");
      const addQuestBtn = document.querySelector(".quest__add-btn");
		const form7 = document.getElementById('customForm');
        const popup7 = document.getElementById('popup');
        const overlay7 = document.getElementById('overlay');
        const popupContent7 = document.getElementById('popupContent');
      if (progressNumber !== stepsNumber) {
        console.warn(
          "Error, number of steps in progress bar do not match number of pages"
        );
      }
	  
	  let isValid = true;
	  
	    document.querySelector(".next-4.next").addEventListener('click', function(event) {
			
        isValid = true;

        // Проверка длины WhatsApp
        const whatsappInput = document.getElementById('WhatsApp1');
        const whatsappError = document.getElementById('errorWhatsApp');
        if (whatsappInput.value.trim().length !== 16) {
            whatsappError.style.display = 'inline';
            isValid = false;
        } else {
            whatsappError.style.display = 'none';
        }

        // Проверка Telegram
        const telegramInput = document.getElementById('Telegram1');
        const telegramError = document.getElementById('errorTelegram');
        if (!telegramInput.value.trim()) {
            telegramError.style.display = 'inline';
            isValid = false;
        } else {
            telegramError.style.display = 'none';
        }

        // Проверка VK
        const vkInput = document.getElementById('VK1');
        const vkError = document.getElementById('errorVK');
        if (!vkInput.value.trim()) {
            vkError.style.display = 'inline';
            isValid = false;
        } else {
            vkError.style.display = 'none';
        }

        // Если есть ошибки, предотвращаем отправку формы
        if (!isValid) {
            event.preventDefault();
        }
    });
	  
	  
	  
	  
	  

      document.documentElement.style.setProperty("--stepNumber", stepsNumber);

      let current = 1;

      for (let i = 0; i < nextButtons.length; i++) {
        nextButtons[i].addEventListener("click", function (event) {
			outputt();
          event.preventDefault();

          inputsValid = validateInputs(this);
          // inputsValid = true;
          if (inputsValid && isValid) {
            slidePage.style.marginLeft = `-${(100 / stepsNumber) * current
              }%`;
            bullet[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            pages[current - 1].classList.remove("active-page")
            pages[current].classList.add("active-page")
            current += 1;
          }
        });
      }

      for (let i = 0; i < prevButtons.length; i++) {
        prevButtons[i].addEventListener("click", function (event) {
			outputt();
          event.preventDefault();
          slidePage.style.marginLeft = `-${(100 / stepsNumber) * (current - 2)
            }%`;
          bullet[current - 2].classList.remove("active");
          progressCheck[current - 2].classList.remove("active");
          progressText[current - 2].classList.remove("active");
          pages[current - 1].classList.remove("active-page")
          pages[current - 2].classList.add("active-page")
          current -= 1;
        });
      }
      //submitBtn.addEventListener("click", function () {
        //bullet[current - 1].classList.add("active");
        //progressCheck[current - 1].classList.add("active");
        //progressText[current - 1].classList.add("active");
        //current += 1;
        //setTimeout(function () {
//alert("qwe");
	  //qwe()
			//document.querySelector("form").submit();
          //alert("Your Form Successfully Signed up");
          //location.reload();
        //}, 800);
      //});
	  
	  
	resultBtn.addEventListener("click", function (event) {
event.preventDefault();

		  qwe();

	});
	  
	  async function qwe(event) {
		  
            const formData = new FormData(form7); // Сохраняем данные формы



            try {
                // Отправляем данные на сервер
                const response = await fetch('https://amotarget.ru/handler.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error('Ошибка сети');
                }

                const result = await response.text(); // Получаем ответ как текст
                // Отображаем ссылку в попапе
                popupContent7.innerHTML = `${result}`;
                showPopup7();
            } catch (error) {
                alert('Произошла ошибка: ' + error.message);
            }
    
}


        function showPopup7() {
            popup7.style.display = 'block';
            overlay7.style.display = 'block';
        }



	  


      function validateInputs(ths) {
        let inputsValid = true;

        const inputs =
          ths.parentElement.parentElement.querySelectorAll("input");
        for (let i = 0; i < inputs.length; i++) {
          const valid = inputs[i].checkValidity();
          if (!valid) {
            inputsValid = false;
            inputs[i].classList.add("invalid-input");
          } else {
            inputs[i].classList.remove("invalid-input");
          }
        }
        return inputsValid;
      }
	  
	  
	  let indexxx = 0;
	  
	  
	            let allQuestions = document.querySelectorAll(".quest")
          for (var i = 0; i < allQuestions.length; i++) {
            let question = allQuestions[i];
			    let dropdownMenu = question.querySelector('.quest-dropdown-menu');
    let addAnswerButton = question.querySelector('.answer__add-btn');
	
	
	      if (question.querySelector(".quest__type > div > input[type=hidden]").value === 'custom-answer') {
		let answersFields = question.querySelectorAll('.quest__answer input');
        // Скрываем кнопку "Добавить ответ"
        if (addAnswerButton) addAnswerButton.style.display = 'none';

        // Оставляем одно поле и блокируем его
        answersFields.forEach((field, index) => {
          if (index === 0) {
			  
			field.parentElement.querySelector(".label").innerText = "Произвольный ответ клиента";
            field.disabled = true;
			field.required = false;
          } else {
            field.parentElement.style.display = 'none';
			field.required = false;
          }
        });
      }
	
	
    dropdownMenu.addEventListener('click', (event) => {
		outputt();
      if (question.querySelector(".quest__type > div > input[type=hidden]").value === 'custom-answer') {
		let answersFields = question.querySelectorAll('.quest__answer input');
        // Скрываем кнопку "Добавить ответ"
        if (addAnswerButton) addAnswerButton.style.display = 'none';

        // Оставляем одно поле и блокируем его
        answersFields.forEach((field, index) => {
          if (index === 0) {
			field.parentElement.querySelector(".label").innerText = "Произвольный ответ клиента";
            field.disabled = true;
			field.required = false;
          } else {
            field.parentElement.style.display = 'none';
			field.required = false;
          }
        });
      } else{
		      let answersFields = question.querySelectorAll('.quest__answer input');
        // Показываем кнопку "Добавить ответ"
        if (addAnswerButton) addAnswerButton.style.display = '';

        // Разблокируем все поля
        answersFields.forEach((field) => {
		 field.parentElement.querySelector(".label").innerText = "Ответ";
          field.disabled = false;
		  field.required = true;
          field.parentElement.style.display = '';
        });
      }
    });
			
            let questDelBtn = question.querySelector(".quest__delete-btn")
            questDelBtn.addEventListener("click", function () {
				
              question.remove();
			  
			  
			  outputt();
            })

            let addAnswerBtn = question.querySelector(".answer__add-btn")
            addAnswerBtn.addEventListener("click", function () {
				outputt();
				  const questionInput = question.querySelector('input[name^="question["]');
  if (!questionInput) {
    console.error("Не найден input с именем question в этом .quest");
    return;
  }

  // Извлекаем индекс из имени input
  const questionIndex = questionInput.name.match(/\d+/)?.[0];
  if (questionIndex === undefined) {
    console.error("Не удалось извлечь индекс из имени input");
    return;
  }
				
              addAnswerBtn.insertAdjacentHTML("beforebegin", '<div class="field quest__answer"><div class="label">Ответ</div><input name="answer[{i}][] type="text" required></div>'.replace('{i}', questionIndex))
              let allAnswers = question.querySelectorAll(".quest__answer")
              if ((allAnswers.length > 1) && (question.querySelector(".answer__delete-btn"))) {
                let answerDeleteBtns = question.querySelectorAll(".answer__delete-btn")
                for (var k = 0; k < answerDeleteBtns.length; k++) {
                  answerDeleteBtns[k].remove()
                }
              }
              for (var j = 0; j < allAnswers.length; j++) {
                let thisAnswer = allAnswers[j];
                thisAnswer.insertAdjacentHTML("beforeend", '<div class="answer__delete-btn"><use xlink:href="#clear_20" style="fill: currentcolor; color: var(--main-grey);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" id="clear_20"><path fill="currentColor" fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10s4.477 10 10 10 10-4.477 10-10M7.707 6.293a1 1 0 0 0-1.414 1.414L8.586 10l-2.293 2.293a1 1 0 1 0 1.414 1.414L10 11.414l2.293 2.293a1 1 0 0 0 1.414-1.414L11.414 10l2.293-2.293a1 1 0 0 0-1.414-1.414L10 8.586z" clip-rule="evenodd"></path></svg></use></div>')
                let answerDeleteBtn = thisAnswer.querySelector(".answer__delete-btn")
                answerDeleteBtn.addEventListener("click", function () {
					
                  if (allAnswers.length == 2) {
                    thisAnswer.remove()
                    let answerDeleteBtns = question.querySelectorAll(".answer__delete-btn")
                    for (var k = 0; k < answerDeleteBtns.length; k++) {
                      answerDeleteBtns[k].remove()
                    }
                  } else {
                    thisAnswer.remove()
                  }
                  allAnswers = question.querySelectorAll(".quest__answer");
				  outputt();
                })
              }
              allAnswers = question.querySelectorAll(".quest__answer")
            })
          
		  		            $('.quest-dropdown').off("click");
          $('.quest-dropdown').off("focusout");
          $('.quest-dropdown .quest-dropdown-menu li').off("click");

          $('.quest-dropdown').click(function () {
            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('active');
            $(this).find('.quest-dropdown-menu').slideToggle(300);
          });
          $('.quest-dropdown').focusout(function () {
            $(this).removeClass('active');
            $(this).find('.quest-dropdown-menu').slideUp(300);
          });
          $('.quest-dropdown .quest-dropdown-menu li').click(function () {
            $(this).parents('.quest-dropdown').find('span').text($(this).text());
            $(this).parents('.quest-dropdown').find('input').attr('value', $(this).attr('id'));
          });
		  
		  }
		  
		  
		  

		  
		  
	  

      addQuestBtn.addEventListener("click", function () {
		  
		  outputt();
		  
        let allQuestions = document.querySelectorAll(".quest")
		
		

		
		
		//const indexxx = allQuestions.length;
        if (allQuestions.length < 3) {
			//const questionIndex = Array.from(allQuestions).indexOf(question);
			
			
          addQuestField.insertAdjacentHTML("beforebegin", '<div class="quest" id="quest{allQuestions.length}"><div class="quest__delete-btn"><use xlink:href="#delete_outline_20" style="fill: currentcolor; color: var(--main-grey);"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"id="delete_outline_20"><path fill-rule="evenodd"d="M6.837 4H2.75a.75.75 0 0 0 0 1.5h.545l.907 9.248c.051.523.094.96.157 1.314.066.37.163.711.353 1.028a2.9 2.9 0 0 0 1.247 1.131c.334.158.682.222 1.058.25.36.029.797.029 1.323.029h3.32c.526 0 .964 0 1.323-.028.376-.03.724-.093 1.058-.25a2.9 2.9 0 0 0 1.247-1.132c.19-.317.287-.657.353-1.028.063-.355.106-.79.157-1.314l.907-9.248h.545a.75.75 0 0 0 0-1.5h-4.087a3.25 3.25 0 0 0-6.326 0m1.581 0h3.164a1.751 1.751 0 0 0-3.164 0m6.78 1.5H4.802l.89 9.072c.054.56.091.938.143 1.228.05.281.104.422.162.52a1.4 1.4 0 0 0 .603.546c.102.048.248.088.533.11.294.024.673.024 1.235.024h3.262c.562 0 .941 0 1.235-.023.285-.023.43-.063.533-.111a1.4 1.4 0 0 0 .603-.547c.058-.097.112-.238.162-.52.052-.29.09-.667.144-1.226l.89-9.073Zm-2.886 2.002a.75.75 0 0 1 .685.81l-.5 6.003a.75.75 0 0 1-1.494-.124l.5-6.003a.75.75 0 0 1 .81-.686Zm-4.624 0a.75.75 0 0 1 .81.686l.5 6.002a.75.75 0 0 1-1.495.125l-.5-6.003a.75.75 0 0 1 .685-.81"clip-rule="evenodd"></path></svg></use></div><div class="quest__type">Выберите тип вопроса:<div class="quest-dropdown"><div class="select"><span>Выбор одного ответа</span><use xlink:href="#dropdown_outline_16" style="fill: currentcolor;width: 20px;margin-left: 5px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12" id="dropdown_outline_16"><path fill="currentColor" d="m8 6.778 3.773-3.107a.75.75 0 1 1 .954 1.158l-4.25 3.5a.75.75 0 0 1-.954 0l-4.25-3.5a.75.75 0 0 1 .954-1.158z"></path></svg></use></div><input type="hidden" name="answers-type[{allQuestions.length}]" value="once-answer"><ul class="quest-dropdown-menu"><li id="once-answer">Выбор одного ответа</li><li id="custom-answer">Ответ в произвольной форме</li></ul></div></div><div class="field quest__title"><div class="label">Вопрос</div><input name="question[{allQuestions.length}]" type="text" required /></div><div class="field quest__answer"><div class="label">Ответ</div><input name="answer[{allQuestions.length}][]" type="text" required /></div><div class="field quest__answer"><div class="label">Ответ</div><input name="answer[{allQuestions.length}][]" type="text" required /></div><div class="answer__add-btn">Добавить ответ<use xlink:href="#add_24" style="fill: currentcolor; width: 27px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="add_24"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"></path><path fill="currentColor"d="M13 11h6.5a1 1 0 0 1 0 2H13v6.5a1 1 0 0 1-2 0V13H4.5a1 1 0 0 1 0-2H11V4.5a1 1 0 0 1 2 0z"></path></g></svg></use></div></div>'.replaceAll('{allQuestions.length}', indexxx))

          let allQuestions = document.querySelectorAll(".quest")

          for (var i = allQuestions.length-1; i < allQuestions.length; i++) {
          	  
            let question = allQuestions[i];
			
			
			
			
			
			    let dropdownMenu = question.querySelector('.quest-dropdown-menu');

    let addAnswerButton = question.querySelector('.answer__add-btn');

    dropdownMenu.addEventListener('click', (event) => {
		
outputt();
		
      if (question.querySelector(".quest__type > div > input[type=hidden]").value === 'custom-answer') {
		let answersFields = question.querySelectorAll('.quest__answer input');

        // Скрываем кнопку "Добавить ответ"
        if (addAnswerButton) addAnswerButton.style.display = 'none';
		

	
        // Оставляем одно поле и блокируем его
        answersFields.forEach((field, index) => {
			
          if (index === 0) {
			  			  
			field.parentElement.querySelector(".label").innerText = "Произвольный ответ клиента";
            field.disabled = true;
			field.required = false;
          } else {
            field.parentElement.style.display = 'none';
			field.required = false;
          }
        });
      } else{
		      let answersFields = question.querySelectorAll('.quest__answer input');
		  

        // Показываем кнопку "Добавить ответ"
        if (addAnswerButton) addAnswerButton.style.display = '';

        // Разблокируем все поля
        answersFields.forEach((field) => {
			 field.parentElement.querySelector(".label").innerText = "Ответ";
          field.disabled = false;
		  field.required = true;
          field.parentElement.style.display = '';
        });
      }
    });
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
            let questDelBtn = question.querySelector(".quest__delete-btn")
            questDelBtn.addEventListener("click", function () {
				
              question.remove();
			  outputt();
            })

            let addAnswerBtn = question.querySelector(".answer__add-btn")
            addAnswerBtn.addEventListener("click", function () {
				outputt();
								  const questionInput = question.querySelector('input[name^="question["]');
  if (!questionInput) {
    console.error("Не найден input с именем question в этом .quest");
    return;
  }

  // Извлекаем индекс из имени input
  const questionIndex = questionInput.name.match(/\d+/)?.[0];
  if (questionIndex === undefined) {
    console.error("Не удалось извлечь индекс из имени input");
    return;
  }
	
				
              addAnswerBtn.insertAdjacentHTML("beforebegin", '<div class="field quest__answer"><div class="label">Ответ</div><input name="answer[{i}][] type="text" required></div>'.replace('{i}', questionIndex))
              let allAnswers = question.querySelectorAll(".quest__answer")
              if ((allAnswers.length > 1) && (question.querySelector(".answer__delete-btn"))) {
                let answerDeleteBtns = question.querySelectorAll(".answer__delete-btn")
                for (var k = 0; k < answerDeleteBtns.length; k++) {
                  answerDeleteBtns[k].remove()
                }
              }
              for (var j = 0; j < allAnswers.length; j++) {
                let thisAnswer = allAnswers[j];
                thisAnswer.insertAdjacentHTML("beforeend", '<div class="answer__delete-btn"><use xlink:href="#clear_20" style="fill: currentcolor; color: var(--main-grey);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" id="clear_20"><path fill="currentColor" fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10s4.477 10 10 10 10-4.477 10-10M7.707 6.293a1 1 0 0 0-1.414 1.414L8.586 10l-2.293 2.293a1 1 0 1 0 1.414 1.414L10 11.414l2.293 2.293a1 1 0 0 0 1.414-1.414L11.414 10l2.293-2.293a1 1 0 0 0-1.414-1.414L10 8.586z" clip-rule="evenodd"></path></svg></use></div>')
                let answerDeleteBtn = thisAnswer.querySelector(".answer__delete-btn")
                answerDeleteBtn.addEventListener("click", function () {
					
                  if (allAnswers.length == 2) {
                    thisAnswer.remove()
                    let answerDeleteBtns = question.querySelectorAll(".answer__delete-btn")
                    for (var k = 0; k < answerDeleteBtns.length; k++) {
                      answerDeleteBtns[k].remove()
                    }
                  } else {
                    thisAnswer.remove()
                  }
                  allAnswers = question.querySelectorAll(".quest__answer");
				  outputt();
                })
              }
              allAnswers = question.querySelectorAll(".quest__answer")
            })
          }

          $('.quest-dropdown').off("click");
          $('.quest-dropdown').off("focusout");
          $('.quest-dropdown .quest-dropdown-menu li').off("click");

          $('.quest-dropdown').click(function () {
            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('active');
            $(this).find('.quest-dropdown-menu').slideToggle(300);
          });
          $('.quest-dropdown').focusout(function () {
            $(this).removeClass('active');
            $(this).find('.quest-dropdown-menu').slideUp(300);
          });
          $('.quest-dropdown .quest-dropdown-menu li').click(function () {
            $(this).parents('.quest-dropdown').find('span').text($(this).text());
            $(this).parents('.quest-dropdown').find('input').attr('value', $(this).attr('id'));
          });
        }

		indexxx++;


      })

    }

  }

  
// File Upload
// 
function ekUpload() {
  function Init() {

    console.log("Upload Initialised");

    var fileSelect = document.getElementById('file-upload'),
      fileDrag = document.getElementById('file-drag'),
      submitButton = document.getElementById('submit-button');

    fileSelect.addEventListener('change', fileSelectHandler, false);

    // Is XHR2 available?
    var xhr = new XMLHttpRequest();
    if (xhr.upload) {
      // File Drop
      fileDrag.addEventListener('dragover', fileDragHover, false);
      fileDrag.addEventListener('dragleave', fileDragHover, false);
      fileDrag.addEventListener('drop', fileSelectHandler, false);
    }
  }

  function fileDragHover(e) {
    var fileDrag = document.getElementById('file-drag');

    e.stopPropagation();
    e.preventDefault();

    fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
  }

  function fileSelectHandler(e) {
    // Fetch FileList object
    var files = e.target.files || e.dataTransfer.files;

    // Cancel event and hover styling
    fileDragHover(e);

    // Process all File objects
    for (var i = 0, f; f = files[i]; i++) {
      parseFile(f);
      uploadFile(f);
    }
  }

  // Output
  function output(msg) {
    // Response
    var m = document.getElementById('messages');
    m.innerHTML = msg;
  }

  function parseFile(file) {

    console.log(file.name);
    output(
      '<strong>' + encodeURI(file.name) + '</strong>'
    );

    // var fileType = file.type;
    // console.log(fileType);
    var imageName = file.name;

    var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
    if (isGood) {
      document.getElementById('start').classList.add("hidden");
      document.getElementById('response').classList.remove("hidden");
      document.getElementById('notimage').classList.add("hidden");
      // Thumbnail Preview
      document.getElementById('file-image').classList.remove("hidden");
      document.getElementById('file-image').src = URL.createObjectURL(file);
	  document.querySelector(".iPhone__image > img").classList.remove("hidden");
	  document.querySelector(".iPhone__image > img").src = URL.createObjectURL(file);
    }
    else {
      document.getElementById('file-image').classList.add("hidden");
	  document.querySelector(".iPhone__image > img").classList.add("hidden");
      document.getElementById('notimage').classList.remove("hidden");
      document.getElementById('start').classList.remove("hidden");
      document.getElementById('response').classList.add("hidden");
      document.getElementById("file-upload-form").reset();
    }
  }

  function setProgressMaxValue(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.max = e.total;
    }
  }

  function updateFileProgress(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.value = e.loaded;
    }
  }

  function uploadFile(file) {

    var xhr = new XMLHttpRequest(),
      fileInput = document.getElementById('class-roster-file'),
      pBar = document.getElementById('file-progress'),
      fileSizeLimit = 1024; // In MB
    if (xhr.upload) {
      // Check if file is less than x MB
      if (file.size <= fileSizeLimit * 1024 * 1024) {
        // Progress bar
        pBar.style.display = 'inline';
        xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
        xhr.upload.addEventListener('progress', updateFileProgress, false);

        // File received / failed
        xhr.onreadystatechange = function (e) {
          if (xhr.readyState == 4) {
            // Everything is good!

            // progress.className = (xhr.status == 200 ? "success" : "failure");
            // document.location.reload(true);
          }
        };

        // Start upload
        xhr.open('POST', document.getElementById('file-upload-form').action, true);
        xhr.setRequestHeader('X-File-Name', file.name);
        xhr.setRequestHeader('X-File-Size', file.size);
        xhr.setRequestHeader('Content-Type', 'multipart/form-data');
        xhr.send(file);
      } else {
        output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
      }
    }
  }

  // Check for the various File API support.
  if (window.File && window.FileList && window.FileReader) {
    Init();
  } else {
    document.getElementById('file-drag').style.display = 'none';
  }
}

if (document.querySelector("#file-upload")) {
  ekUpload();
}


function outputt() {

        let allQuestions = document.querySelectorAll(".quest")
		
		
let outputContainer = document.getElementById("output"); // Контейнер для вывода результатов
outputContainer.innerHTML='';

allQuestions.forEach((question) => {
    // Получаем тип ответа
    let answerTypeInput = question.querySelector(`input[name^="answers-type"]`);
    let questionInput = question.querySelector(`input[name^="question"]`);
    let answerInputs = question.querySelectorAll(`input[name^="answer["]`)

    if (answerTypeInput && questionInput) {
        let answerType = answerTypeInput.value;
        let questionText = questionInput.value;

        // Извлечение индекса из имени
        let indexMatch = answerTypeInput.name.match(/\[(\d+)\]/);
        let index = indexMatch ? indexMatch[1] : "unknown";

        // Генерируем HTML в зависимости от типа ответа
        if (answerType === "once-answer") {
            let questionHtml = `
            <div class="iPhone__item" bis_skin_checked="1">
                <div class="iPhone__question-title" bis_skin_checked="1">${questionText}</div>
                <div class="banner2-radio" bis_skin_checked="1">
            `;

            answerInputs.forEach((input, idx) => {
                questionHtml += `
                <div class="radio" bis_skin_checked="1">
                    <input id="radio-${index}-${idx}" name="land_${index}" value="${input.value}" type="radio">
                    <label for="radio-${index}-${idx}" class="radio-label">${input.value}</label>
                </div>
                `;
            });

            questionHtml += `
                </div>
            </div>
            `;

            outputContainer.insertAdjacentHTML("beforeend", questionHtml);
        } else if (answerType === "custom-answer") {
            let questionHtml = `
            <div class="iPhone__item" bis_skin_checked="1">
                <div class="iPhone__question-title" bis_skin_checked="1">${questionText}</div>
                <div class="banner2-radio" bis_skin_checked="1">
                    <div class="banner2-select-wrap" bis_skin_checked="1">
                        <input name="land_${index}" class="banner2-input">
                    </div>
                </div>
            </div>
            `;

            outputContainer.insertAdjacentHTML("beforeend", questionHtml);
        }
    }
});
}


});

