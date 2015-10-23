<?php
require("config.php");

if(!isset($_GET['id']))
{
	$id=1;
} else {
	$id=$_GET['id'];
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<title>Кирилл</title>
</head>

<body class="body">
	<header class="mainHeader">
		<img src="img/headerLogo.png">
		<nav>
	<ul>
		<?
//меню
		$qmenu = mysql_query("select `id_text`,`title` from texts where `id_text`<=4 order by `id_text` asc");
		while($menu = mysql_fetch_row($qmenu)) {
			?>
			<li><a href="<?=$url?>?id=<?=$menu[0]?>"><?=$menu[1]?></a></li>
			<?
		}
		?>
	</ul>
	</nav>
	<?
// текст
	$qtext = mysql_query("select `title`,`content` from texts where `id_text`=".$id);
	if ($text = mysql_fetch_array($qtext)) {
		?>
		<h1><?=$text["title"]?></h1>
		<?=$text["content"]?>
		<?
	}

// подвал
	echo "<br><br><hr>".date("Y")." Кирилл";
	?>
</body>
</html>
