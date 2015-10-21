<?php
	header('Content-Type: text/html; charset=utf-8');
 require 'menu.php';?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>My First Site</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="body">
	<header class="mainHeader">
		<img src="img/headerLogo.png">
		<nav>
			<?php getMenu($menu);?>
		</nav>
	</header>
	<div class="mainContent">
		<div class="content">
			<?php
	// Set default valuea
			$current_page = '1';

// Change value if `page` is specified
			if(array_key_exists('id',$_GET)) {
				$current_page = $_GET['id'];
			}

// Check page
			switch ($current_page) {
				case '1':
				include 'main.php';
				break;
				case '2':
				include 'about.php';
				break;
				case '3':
				include 'gallery.php';
				break;
				default:
				include 'main.php';
			}

			?>
		</div>
	</div>
	<?php include 'footer.php';?>
</body>
</html>