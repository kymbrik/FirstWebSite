<?php


$dbHost='localhost';
$dbName='firstwebpagedb';
$dbUser='root';
$dbPass='1';

$myConnect = mysql_connect($dbHost,$dbUser,$dbPass);
mysql_select_db($dbName,$myConnect);
mysql_query("SET NAMES utf8");


//URL без параметров
$url=strtok($_SERVER["REQUEST_URI"],'?');





/*
$menu = array(
	'Главная' => 'index.php?id=1',
	'О себе' => 'index.php?id=2',
	'Фотогалерея' => 'index.php?id=3'
	);
*/

function getMenu($myConnect){
 //Функция формирования Меню	
	$qwer=mysql_query("select id_text, title from `texts`",$myConnect) or die(mysql_error());

//Menu
	$menu = array();
	echo '<ul>';
	$i = 0;
	while ($arr=mysql_fetch_array($qwer) ) 
	{ 
		if($i<4){
			echo '<li><a href=index.php?id=' .$arr['id_text'] . '>' . $arr['title'] . '</a></li>';
			$i++;
		}

	}
	echo '</ul>';

	
	
}

function getMainContent($myConnect){
 //Функция для отображения содержимого вкладки "Главная"
	$qwer=mysql_query("select title, content from `texts` where id_text=1",$myConnect) or die(mysql_error());

	$arr=mysql_fetch_array($qwer);
	
		echo '<article>	
		<header>
		<h2>' . $arr['title'] . '</h2>
		</header>
		<content>'
		. $arr['content'] .
		'</content>
		</article>';
	
	mysql_close($myConnect);
}

function getAboutMe($myConnect){
//Функция для отображения содержимого вкладки "О себе"
	$qwer=mysql_query("select title, content from `texts` where id_text=2",$myConnect) or die(mysql_error());
	$arr=mysql_fetch_array($qwer);
	echo '<article class="topcontent">	
	<header>
	<h1>' . $arr['title'] . '</h1>
	</header>
	<content>'
	. $arr['content'] .
	'</content>
	</article>';
}



function getGallery($myConnect){
 //Функция для отображения содержимого вкладки "Фотогалерея"
	//$qwerCnt= mysql_query("select COUNT(id_image) as total from `images`",$myConnect) or die(mysql_error());
	//$count = mysql_fetch_array($qwerCnt);
	$qwer=mysql_query("select images.id_image,images.path_image, texts.title, images.id_text  from `images`,`texts` where images.id_text=texts.id_text ",$myConnect) or die(mysql_error());

	if(isset($_GET['imgid']))
	{
		$i=$_GET['imgid'];
		$del=mysql_query("DELETE FROM `images` WHERE `id_image` = '$i' ",$myConnect) or die(mysql_error());
	}

	while ($arr=mysql_fetch_array($qwer)) {
		echo '<div class="imgContainer">';
		echo '<div class="image"><img src="' . $arr['path_image'] . '"></div>';
		echo '<div>'.$arr['title'].'</div>';
		//Формирование GET параметров
		$query_arr = $_GET;
		$query_arr["id"] = $_GET['id'];
		$query_arr["imgid"] = $arr['id_image'];
		$query_arr = http_build_query($query_arr);
		echo '<a href="' .$url.'?'.$query_arr.'"> Удалить</a>';
		echo '</div>';	
	}
	echo '<div class="clear"></div>';
	mysql_close($myConnect);
}
function getContacts($myConnect){
//Функция для отображения содержимого вкладки "Контакты"
	$qwer=mysql_query("select title, content from `texts` where id_text=4",$myConnect) or die(mysql_error());
	$arr=mysql_fetch_array($qwer);
	echo '<article class="topcontent">	
	<header>
	<h1>' . $arr['title'] . '</h1>
	</header>
	<content>'
	. $arr['content'] .
	'</content>
	</article>';
}
function getFooter(){
 //Функция для отображения содержимого Футера
	echo '<div id="footer">Copyright © Кирилл Ермаков,'.  date('Y') . '</div>';
}
