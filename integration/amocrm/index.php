<!DOCTYPE html>
<html lang="ru" >
<head>
<meta charset="UTF-8">
  <?php
	$name = htmlspecialchars($_GET["id"]);
	include($_SERVER['DOCUMENT_ROOT'].'/integration/'.$name.'/config.php'); ?>
<?php
if(!isset($_GET['id'])){
header("Location: /index.html");
die();
}
?>
<style>
html,
body {
  background: #339dc8;
}
</style>
<meta http-equiv="refresh" content="0;URL=https://www.amocrm.ru/oauth?client_id=<?php echo AMO_CLIENT_ID; ?>&state=<?php echo AMO_REDIRECT_TO; ?>&mode=post_message"/>
</head>
<body>
</body>
</html>