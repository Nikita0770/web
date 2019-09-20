<?php
	
	$data = $_REQUEST['message'];
	
	
	
	if (strlen($data)>2){
		$time = date("H:i:s d.m.Y");
		$data = "<div><b>$time<b>$data</div>";
		
		$old = file_get_contents("data.txt");
		file_put_contents("data.txt", $data.$old);
		
		
		header ("Location: index.php");
	}
	
	
	
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>
	
	<nav class="navbar navbar-light bg-light">
		<div class="container">
		  <a class="navbar-brand" href="./"><i class="fas fa-home"></i> <b>Домой</b></a>
		</div>
	</nav>
	
	<div class="container mb-5">
		
		<article class="mt-3">
		
			<h1 class="text-center">Some article...</h1>
			<p class="text-justify">In auctor aliquet mollis. Maecenas quis fringilla dui, ut faucibus elit...</p>
			
		</article>
		
		<hr>
		
		<form>
			<div class="form-group">
				<label for="user_name_id" class="form-control-label"><strong>Ваш комментарий: </strong></label>
				<input autocomplete="off" type="text" name="message" class="form-control" id="message_id" placeholder="Введите сообщение..." required pattern="^.{3,}$" title="Не менее трёх символов">
			</div>
			<button type="submit" class="btn btn-primary">Отправить</button>
		</form>	
		
		<hr>
		
		<!-- Разместит вывод комментариев после этой строки -->
		<?php
		
		
		include("data.txt");
		
		
		
		?>
	</div>
</body>
</html>
