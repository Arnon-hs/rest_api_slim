<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<script
			src="https://code.jquery.com/jquery-3.5.0.slim.js"
			integrity="sha256-sCexhaKpAfuqulKjtSY7V9H7QT0TCN90H+Y5NlmqOUE="
			crossorigin="anonymous"></script>

		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../src/assets/css/style.css">
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
			<span>In this project, I implemented a REST API using the PHP-SLIM framework. Read and write to json file.</span>
			<p>Use any link for test my REST API:</p>
			<ul>
				<li><a href="/api/users">Show all users</a></li>
				<li><a href="/api/users/1588832403">Show user with id = 1588832403</a></li>
				<li><a class="show_popup">Post some user</a></li>
				<li><a href="https://documenter.getpostman.com/view/11192517/SzmZbL5F" target="_blank">Update some user</a></li>
				<li><a href="https://documenter.getpostman.com/view/11192517/SzmZbL5F" target="_blank">Delete some user</a></li>
			</ul>
			<p>TODO list:</p>
			<ul>
				<li><s>Create CRUD operations</s></li>
				<li><s>Make validation</s></li>
				<li><s>Add new fields to User</s></li>
				<li><s>Make redirect from slash to without slash</s></li>
				<li>Add csrf protection to form(do I even need to do this?!)</li>
				<li><s>Validate unique email?!</s></li>
				<li>Make auth?!</li>
			</ul>
			<p>If you have any questions, please link with me by telegram or email.</p>
		</div>
		<div class="postman">
			<a href="https://documenter.getpostman.com/view/11192517/SzmZbL5F" target="_blank">
				<img src="https://banner2.cleanpng.com/20190302/oti/kisspng-application-programming-interface-computer-icons-a-update-native-postman-on-ubuntu-calliditasblog-5c7b404490d035.8226799515515812525932.jpg" alt="Postman">
			</a>
		</div>
		<div class="github">
			<a href="https://github.com/Arnon-hs/rest_api_slim" target="_blank">
				<img src="http://pngimg.com/uploads/github/github_PNG40.png" alt="github">
			</a>
		</div>
		<div class="telegram">
			<a href="https://t.me/razer17" target="_blank">
				<img src="https://fpadrus.ru/images/icons/soc/Telegram_logo_icon.png" alt="telegram">
			</a>
		</div>
		<div class="email">
			<a href="mailto:vasya09082001@gmail.com?subject=REST_APIs">
				<img src="https://img2.freepng.ru/20180421/aqq/kisspng-computer-icons-email-email-vector-5adb31239c4712.9560470515243144036401.jpg" alt="email">
			</a>
		</div>
		<div class="powered">
			<span>Created with Love to developing <3 @arnon_hs</span>
		</div>
		<script src="../src/assets/js/script.js"></script>
	</body>
</html>