<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>aSendForm</title>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

	<!-- split -->
		<?php 
			include_once '../assets/site_include.php';
			$svariants = array(array($URL,$_SERVER["QUERY_STRING"]),"/?index=1","/?index=2");
			$svariants = json_encode($svariants);
			$svariants = urlencode($svariants);
		?>
		<script type="text/javascript" src="../assets/artsites.spli.php?data=<?php echo $svariants; ?>"></script>
	<!-- split -->

	
	<script src="scripts.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="page">
		<div class="center">
			
		</div>
	</div>
</body>
</html>