<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<script
			src="https://code.jquery.com/jquery-3.5.0.slim.js"
			integrity="sha256-sCexhaKpAfuqulKjtSY7V9H7QT0TCN90H+Y5NlmqOUE="
			crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?=$_SERVER['DOCUMENT_ROOT']?>/src/assets/css/style.css">
		<title>REST API</title>
	</head>
	<body>
		<div class="overlay_popup"></div>
		<div class="popup" id="popup1">
			<div class="object">
				<h1>Post a simple user</h1>
				<form action= "/api/users/add" method="post">
					<p>Name: </p>
					<p><input type= "text" name= "first_name"></p>
					<p>E-mail: </p>
					<p><input type= "text" name= "email"></p>
					<p>Phone: </p>
					<p><input type= "tel" name= "phone"></p>
					<input type= "submit" value= "Submit">
				</form>
			</div>
		</div>
		<div class="container">
			<h1>Welcome!</h1>
			<p>Use any link for test my REST API:</p>
			<ul>
				<li><a href="/api/users">Show all users</a></li>
				<li><a href="/api/users/1589304540">Show user with id = 1589304540</a></li>
				<li><a class="show_popup" rel="popup1">Post some user</a></li>
				<li><a href="https://documenter.getpostman.com/view/11192517/SzmZbL5F">Update some user</a></li>
				<li><a href="https://documenter.getpostman.com/view/11192517/SzmZbL5F">Delete some user</a></li>
			</ul>
			<span>In this project, I implemented a REST API using the PHP-SLIM framework, and also wrote a validation to work correctly. Read and write to json file</span>
			<p>If you have any questions, please link with me by telegram or email </p>
		</div>
		<div class="postman">
			<a href="https://documenter.getpostman.com/view/11192517/SzmZbL5F">
				<img src="https://banner2.cleanpng.com/20190302/oti/kisspng-application-programming-interface-computer-icons-a-update-native-postman-on-ubuntu-calliditasblog-5c7b404490d035.8226799515515812525932.jpg" alt="Postman">
			</a>
		</div>
		<div class="github">
			<a href="https://github.com/Arnon-hs/rest_api_slim">
				<img src="http://pngimg.com/uploads/github/github_PNG40.png" alt="github">
			</a>
		</div>
		<div class="telegram">
			<a href="https://t.me/razer17">
				<img src="https://fpadrus.ru/images/icons/soc/Telegram_logo_icon.png" alt="telegram">
			</a>
		</div>
		<div class="email">
			<a href="mailto:vasya09082001@gmail.com?subject=REST_APIs">
				<img src="https://img2.freepng.ru/20180421/aqq/kisspng-computer-icons-email-email-vector-5adb31239c4712.9560470515243144036401.jpg" alt="email">
			</a>
		</div>
	</body>
	<script>
		$('.show_popup').click(function() { // Вызываем функцию по нажатию на кнопку
			var popup_id = $('#' + $(this).attr("rel")); // Связываем rel и popup_id
			$(popup_id).show(); // Открываем окно
			$('.overlay_popup').show(); // Открываем блок заднего фона
		});
		$('.overlay_popup').click(function() { // Обрабатываем клик по заднему фону
			$('.overlay_popup, .popup').hide(); // Скрываем затемнённый задний фон и основное всплывающее окно
		});
	</script>
	<style>
		body{
			font-family: "Source Sans Pro", sans-serif;
			min-width: 320px;
		}
		.container{
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			flex-wrap: wrap;
			max-width: 1170px;
			margin: 0 auto;
		}
		.container span{
			text-align: center;
			color: #273849;
			font-weight: 200;
			font-size: 1.3em;
		}
		h1{
			font-weight: 300;
			font-size: 4em;
			color: #273849;
		}
		p{
			color: #42b983;
			font-size: 1.5em;
			font-weight: 400;
		}
		ul{
			padding-left: 0;
		}
		ul li{
			list-style: none;
			font-size: 1.3em;
			font-weight: 600;
			color: #273849;
		}
		a{
			cursor: pointer;
		}
		a:visited{
			color: inherit;
			text-decoration: mediumseagreen;
		}
		.content {
			text-align: center;
		}
		.object h1{
			font-size: 2.5em;
			text-align: center;
		}
		.postman{
			position: fixed;
			bottom: 20px;
			right: 20px;
			background: #fff;
		}
		.postman img, .github img{
			width: 50px;
			height: 50px;
		}
		.telegram img, .email img{
			width: 40px;
			height: 40px;
			padding: 5px;
		}
		.github {
			position: fixed;
			bottom: 70px;
			right: 20px;
			background: #fff;
		}
		.telegram {
			position: fixed;
			bottom: 120px;
			right: 20px;
			background: #fff;
		}
		.email {
			position: fixed;
			bottom: 170px;
			right: 20px;
			background: #fff;
		}
		button {
			border-radius: 5px;
			padding: 15px 25px;
			font-size: 22px;
			text-decoration: none;
			margin: 20px;
			color: #fff;
			position: relative;
			display: inline-block;
			cursor: pointer;
			border: 0;
		}

		button:active {
			transform: translate(0px, 5px);
			-webkit-transform: translate(0px, 5px);
			box-shadow: 0px 1px 0px 0px;
		}

		button:focus {
			outline: none !important
		}

		input, textarea {
			color: #494949;
			border: 1px solid #e3e3e3;
			border-radius: 3px;
			background: #fff;
			font-size: 14px;
			margin: 0 0 10px;
			padding: 5px;
			width: 100%;
			font-family: "Droid Serif", "Helvetica Neue", Helvetica, Arial, sans-serif;
			line-height: 1.5;
		}

		input:focus {
			border-color: #808080;
			outline: none;
		}

		textarea:focus {
			border-color: #808080;
			outline: none;
		}

		.blue_btn {
			background-color: #55acee;
			box-shadow: 0px 5px 0px 0px #3C93D5;
		}

		.overlay_popup {
			display:none;
			position:fixed;
			z-index: 999;
			top:0;
			right:0;
			left:0;
			bottom:0;
			background:#000;
			opacity:0.5;
		}

		.popup {
			display: none;
			position: relative;
			z-index: 1000;
			margin: 0 auto;
			width:50%;
		}

		.object{
			width: 500px;
			height: 500px;
			background-color: #eee;
			padding: 50px 70px;
		}
	</style>
</html>