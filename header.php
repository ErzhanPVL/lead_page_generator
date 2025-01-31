<?php
if (!isset($_COOKIE['clientphone'])) {
    // Redirect to the authorization page
    header("Location: https://amotarget.ru/login");
    exit();
}
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>amotarget</title>
    <link rel="stylesheet" href="/static/css/reset.css">
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="preload" href="/static/website/fonts/Cera.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=block" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=block" rel="stylesheet">
    <link rel="stylesheet" href="/static/css/style.css?v=1.94">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <header class="header shadow-sm">
        <!-- top nav -->
        <img src="/static/images/logo.png" width="190px">
        <nav class="w-100 d-flex px-4 py-2 mb-4">
            <!-- close sidebar -->
            <div class="dropdown ml-auto">
                <button class="btn py-0 d-flex align-items-center" id="logout-dropdown" data-toggle="dropdown"
                    aria-expanded="false">
                    <span class="bi bi-person text-primary h4"></span>
                    <span class="bi bi-chevron-down ml-1 mb-2 small"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow-sm" aria-labelledby="logout-dropdown">
						<a class="dropdown-item" href="#" id="account-link">Аккаунт</a>
						<a class="dropdown-item" href="#" id="logout-link">Выход</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="wrapper">
        <nav class="navbarov">
            <ul class="navbarov__menu">
                <li class="navbarov__item active">
                    <a href="/panel" class="navbarov__link"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg><span>Рабочий стол</span></a>
                </li>
                <li class="navbarov__item">
                    <a href="/leadform" class="navbarov__link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive">
                            <polyline points="21 8 21 21 3 21 3 8"></polyline>
                            <rect x="1" y="3" width="22" height="5"></rect>
                            <line x1="10" y1="12" x2="14" y2="12"></line>
                        </svg><span>Лид–формы</span></a>
                </li>
                <li class="navbarov__item">
                    <a href="/connect-crm" class="navbarov__link"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg><span>Подключить CRM</span></a>
                </li>
                <!--li class="navbarov__item">
                    <a href="/messengers" class="navbarov__link"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg><span>Мессенджеры</span></a>
                </li-->
                <li class="navbarov__item">
                    <a href="/help" class="navbarov__link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg><span>Помощь</span></a>
                </li>
                <li class="navbarov__item">
                    <a href="/account" class="navbarov__link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                            </path>
                        </svg><span>Настройки</span></a>
                </li>
                <li class="navbarov__item">
                    <a href="/vkads" class="navbarov__link"><img width="44" height="44" src="/static/images/logo_min.png"><span>Мой VK Ads</span></a>
                </li>
            </ul>
        </nav>
		
		
		
		
		
		
		
		
		
		
		<script>
		document.getElementById('account-link').addEventListener('click', function (e) {
    e.preventDefault();
    
    // Get the cookies
    const leadId = getCookie('lead_id');
    const clientPhone = getCookie('clientphone');
	
	alert('Номер аккаунта: ' + leadId);
    
    // Display the values in the modal
    // document.getElementById('lead-id-display').textContent = leadId || 'Not set';
    // document.getElementById('client-phone-display').textContent = clientPhone || 'Not set';
    
    // Show the modal
    // document.getElementById('account-modal').style.display = 'flex';
});

//document.getElementById('close-modal').addEventListener('click', function () {
    //document.getElementById('account-modal').style.display = 'none';
//});

// Helper function to get cookies
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}


document.getElementById('logout-link').addEventListener('click', function (e) {
    e.preventDefault();

    // Delete cookies by setting them to expire in the past
    document.cookie = 'lead_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    document.cookie = 'clientphone=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';

     window.location.href = 'https://amotarget.ru/login/';
});

		
		
		</script>