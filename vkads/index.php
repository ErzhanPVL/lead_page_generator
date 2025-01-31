<?php include($_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>

    <script>
        function updateFields() {
            const status = document.getElementById('status').value;
            const individualFields = document.getElementById('individual-fields');
            const organizationFields = document.getElementById('organization-fields');
            const fioInput = document.getElementById('fio');
            const organizationInput = document.getElementById('organization-name');

            if (status === 'individual' || status === 'entrepreneur') {
                individualFields.style.display = 'block';
                organizationFields.style.display = 'none';
                fioInput.required = true;
                organizationInput.required = false;
            } else if (status === 'legal') {
                individualFields.style.display = 'none';
                organizationFields.style.display = 'block';
                fioInput.required = false;
                organizationInput.required = true;
            } else {
                individualFields.style.display = 'none';
                organizationFields.style.display = 'none';
                fioInput.required = false;
                organizationInput.required = false;
            }
        }
    </script>

        <main class="main without-aside">
            <section class="section contentWrapper__D2sPU">
                <h1 class="section__header">Подключите VK Ads</h1>
                      
	<form action="/moderation" method="POST" onsubmit="sendWebhook()">
        <label for="status">Статус:</label>
        <select id="status" name="status" onchange="updateFields()" required>
            <option value="" disabled selected>Выберите статус</option>
            <option value="individual">Физ. лицо</option>
            <option value="entrepreneur">ИП</option>
            <option value="legal">Юр. лицо</option>
        </select>

        <div id="individual-fields" style="display: none;">
            <label for="fio">ФИО:</label>
            <input type="text" id="fio" name="fio" class="input-group" placeholder="Введите ФИО">
        </div>

        <div id="organization-fields" style="display: none;">
            <label for="organization-name">Название организации:</label>
            <input type="text" id="organization-name" name="organization_name" class="input-group" placeholder="Введите название организации">
        </div>

<div>
        <label for="inn">ИНН:</label>
        <input type="text" id="inn" name="inn" class="input-group" placeholder="Введите ИНН" required>
</div>

</br>


<div class="btnContainer__SRTSV">
        <button type="submit" class="btn btn-success">Отправить</button>
		</div>
    </form>
   
    
    <script>
        async function sendWebhook() {
            const form = document.querySelector('form');
            const formData = new FormData(form);

            const data = {
				id: <?php echo $_COOKIE['lead_id'] ?>,
                status: formData.get('status'),
                fio: formData.get('fio'),
                organization_name: formData.get('organization_name'),
                inn: formData.get('inn')
            };

            await fetch('https://amotarget.ru/amocrm/webhook3.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });
        }
    </script>

      </section>
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