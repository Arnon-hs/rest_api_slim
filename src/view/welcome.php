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
		<div class="container">
			<h1>Welcome!</h1>
			<p>Use any link for test my REST API:</p>
			<ul>
				<li><a href="/api/users">Show all users</a></li>
				<li><a href="/api/users/1">Show user with id = 2</a></li>
				<li><a class="show_popup" rel="popup1">Post some user</a></li>
				<li><a class="show_popup" rel="popup2">Update some user</a></li>
				<li><a class="show_popup" rel="popup3">Delete some user</a></li>
			</ul>
		</div>
		<div class="overlay_popup"></div>
		<div class="popup" id="popup1">
			<div class="object">
				<form action= "/api/users/add/" method= "post">
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
		<div class="popup" id="popup2">
			<div class="object">
				<form action= "/api/users/update/" method= "put">
					<p>Name: </p>
					<p><input type= "text" name= "first_name"></p>
					<p>E-mail: </p>
					<p> <input type= "text" name= "email"></p>
					<p>Phone: </p>
					<p><input type= "tel" name= "phone"></p>
					<input type= "submit" value= "Submit">
				</form>
			</div>
		</div>
		<div class="popup" id="popup3">
			<div class="object">
				<form action= "/api/users/delete/" method= "delete">
					<p>ID: </p>
					<p><input type= "text" name= "id"></p>
					<input type= "submit" value= "Submit">
				</form>
			</div>
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
			margin:0 25% 0 25%;
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