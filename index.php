<?php
$id=$_GET['id'];
if(!isset($id))
{
	header("Refresh:0; url=http://localhost/FirstWebSite/index.php?id=1");
}
header('Content-Type: text/html; charset=utf-8');
require 'config.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>My First Site</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/gallery.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="body">
	<header class="mainHeader">
		<img src="img/headerLogo.png">
		<nav>
			<?php getMenu($myConnect);?>
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
					getMainContent($myConnect);
					break;
				case '2':
					getAboutMe($myConnect);
					break;
				case '3':
					getGallery($myConnect);
					break;
				case '4':
					getContacts($myConnect);
					break;
				default:
					getMainContent($myConnect);
			}

			?>
		</div>
	</div>
	<?php getFooter(); ?>
</body>
</html>