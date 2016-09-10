<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Форма комментариев</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link id="czr-favicon" rel="shortcut icon" href="favicon.png" type="image/png">
	
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
	
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	
	<script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>

<?php
	include('assets/includes/nav.php');
?>

<div class="container">
	<div class="row">

		<div class="col-md-8" role="main">
			<div class="panel panel-default">
				<div class="panel-body" id="taskInfo">
					<a class="btn btn-primary btn-md btn-block" href="index.php">Back</a>
					<h3 class="control-title">Task 1</h3>
					<h4>****TODO </h4>
					<p>* Тестовое заданий:</p>
					<p>* 1) Создать форму коментариев</p>
					<p>* 2) Реализовать визуализацию при помощи Bootstrap* (или любого другого извесного тебе css-фреймворка</p>
					<p>* 3) все коментарии записать в базу данных*</p>
					<p>* 4) при нажатии кнопки "отправить" комментарий должен добавляться в базу с помощью Ajax</p>
					<p>* 5) для работы с формой создать php-класс</p>
					<p>* 6) под формой выгрузить список коментариев*</p>
					<p>* 7) добавить отправку информации на email</p>
					<p>* 8) добавить проверку о заполнении полей*</p>
					<p>* 9) реализовать загрузку прикреплённых файлов(если такии имеются) в папку /uploads</p>
					<p>*</p>
					<p>* Поля формы:</p>
					<p>* 1) email*</p>
					<p>* 2) ФИО*</p>
					<p>* 3) телефон</p>
					<p>* 4) комментарий*</p>
					<p>* 5) прикрепить файл</p>
					<p>*</p>
					<p>* Формат вывода коментариев:</p>
					<p>* #ID_коментария #Дата</p>
					<p>* #ФИО (#email)</p>
					<p>* #Комментарий</p>
					<p>*</p>
					<p>* ссылки на информацию:</p>
					<p>* http://getbootstrap.com/getting-started/</p>
					<p>* http://getbootstrap.com/components/</p>
					<p>*</p>
					<p>*</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	include('assets/includes/footer.php');
?>

</body>
</html>