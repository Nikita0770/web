<?php
	$con=mysqli_connect("localhost","root","","web28");
	
	$data = $_REQUEST['message'];
	$data = strip_tags($data);
	$data = mysqli_real_escape_string($con,$data);
	
	
	if(strlen($data)>=3){
		$q = "INSERT INTO `friends`(`content`,`publish`) VALUES('$data', NOW())";
		mysqli_query($con,$q);
		header("Location: index.php");
		
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
		  <a class="navbar-brand" href="./">
			<i class="fas fa-home"></i> <b>Домой</b>
		</a>
		</div>
	</nav>
	
	<div class="container mb-5">
		
		<article class="mt-3">
		
			<div class="alert alert-info"><span class="fas fa-database"></span> <strong>Database Edition</strong></div>
		
			<h1 class="text-center">Some article...</h1>
			<p class="text-justify">In auctor aliquet mollis. Maecenas quis fringilla dui, ut faucibus elit. Vestibulum ullamcorper vestibulum velit, ac blandit nisl congue vel. Sed sit amet orci fringilla tellus aliquet cursus. Nullam nec lacus sit amet orci malesuada pretium. Mauris bibendum nisi at justo aliquet maximus. Donec at enim augue. In et mi sollicitudin, ornare sem vitae, interdum elit. Nulla facilisi. In ac ligula at risus vehicula venenatis. Ut eget mauris sem. Mauris urna mauris, accumsan vel tempus eu, iaculis gravida mauris.</p>
			
		</article>
		
		<hr>
		<form>
			<div class="form-group">
				<label for="user_name_id" class="form-control-label"><strong>Ваш комментарий: </strong></label>
				<input type="text" name="message" class="form-control" id="message_id" placeholder="Введите сообщение..." required pattern="^.{3,}$" title="Не менее трёх символов" autocomplete="off">
			</div>
			<button type="submit" class="btn btn-primary">Отправить</button>
		</form>			
		<hr>
		<?php
			$q="SELECT * FROM `friends` ORDER BY `publish` DESC";
			$res=mysqli_query($con,$q);
			
			while($row=mysqli_fetch_array($res)){
		
		?>
		<!-- One Comment -->
		<div class="card mt-3">
		  <h5 class="card-header"><?php echo $row['publish'];?></h5>
		  <div class="card-body">
			<p class="card-text"><?php echo $row['content'];?></p>
			<a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-outline-danger">Удалить</a>
		  </div>
		</div>
		<!-- /One Comment -->
			<?php
			}
			?>
	</div>
</body>
</html>
<?php
/*
	$con=mysqli_connect("localhost","root","","web28");
	$q="SELECT*FROM 'comments'";
	$res=mysqli_query($con,$q);
	while($row= mysqli_fetch_array($res)){
	
	echo $row["content"];
	echo $row["publish"];
	echo "<	hr>";
	}
	*/
?>
