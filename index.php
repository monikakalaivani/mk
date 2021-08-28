<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>URL SHORTENER</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="./jquery-3.3.1.min.js"></script>
	
</head>
<body>
	<h1>Paste a link to shorten it</h1>
	<div class="container">
		<form action="urldb.php" method="POST" enctype="multipart/form-data">
			<input type="url" name="urlorg" id="url" placeholder="Past your url here..." size="1">
			<input type="hidden" name="urlenc" id="urlenc">
			<button type="submit" name="submit" id="submit">Shorten</button>			
		</form>		
	</div>
<?php
require_once('connectiondb.php');

 $sql= "SELECT * FROM `urldb` WHERE urlenc ORDER BY `id` DESC LIMIT 1";
 $result = mysqli_query($con, $sql);
 $resultCheck = mysqli_num_rows($result);
 $row = mysqli_fetch_assoc($result);
?>
<div>

	<div id="urlr" style="display: none">
    	<p><a href="<?php echo $row['urlorg']?>" style="color:white">http//localhost/<?php echo $row['urlenc'];?></a></p>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
	  $("#submit").click(function() {
	    $("#urlr").toggle();
	  });
	});
</script>
