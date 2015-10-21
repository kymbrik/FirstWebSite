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


//Menu
$menu = array(
	'Главная' => 'index.php?id=1',
	'О себе' => 'index.php?id=2',
	'Фотогалерея' => 'index.php?id=3'
	);


function getMenu($menu){
 //Функция формирования Меню	
	echo '<ul>';
	foreach($menu as $href=>$value){
		echo "<li><a href=\"$value\">$href</a></li>";
	}
	echo '</ul>';
}

function getMainContent($myConnect){
 //Функция для отображения содержимого вкладки "Главная"
	$qwer=mysql_query("select topic_name from `topics`",$myConnect) or die(mysql_error());

	while ($arr=mysql_fetch_array($qwer)) { 
		echo '<article>	
				<header>
					<h2>' . $arr[0] . '</h2>
				</header>
				<content>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
				</content>
			  </article>';
	}
	mysql_close($myConnect);
}

function getAboutMe($myConnect){
//Функция для отображения содержимого вкладки "О себе"
	echo '<article class="topcontent">	
			<header>
				<h1>О себе</h1>
			</header>
			<content>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
				<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
			</content>
		 </article>';
}

function getGallery($myConnect){
 //Функция для отображения содержимого вкладки "Фотогалерея"
	//$qwerCnt= mysql_query("select COUNT(id_image) as total from `images`",$myConnect) or die(mysql_error());
	//$count = mysql_fetch_array($qwerCnt);
	$qwer=mysql_query("select images.path_image, topics.topic_name, images.id_topic  from `images`,`topics` where images.id_topic=topics.id_topic ",$myConnect) or die(mysql_error());

	if(isset($_GET['imgid']))
	{
		$i=$_GET['imgid'];
		$del=mysql_query("DELETE FROM `images` WHERE `id_topic` = '$i' ",$myConnect) or die(mysql_error());
	}

	while ($arr=mysql_fetch_array($qwer)) {
		echo '<div class="imgContainer">';
		echo '<div class="image"><img src="' . $arr['path_image'] . '"></div>';
		echo '<div>'.$arr['topic_name'].'</div>';
		//Формирование GET параметров
		$query_arr = $_GET;
		$query_arr["id"] = $_GET['id'];
		$query_arr["imgid"] = $arr['id_topic'];
		$query_arr = http_build_query($query_arr);
		echo '<a href="' .$url.'?'.$query_arr.'"> Удалить</a>';
		echo '</div>';	
	}
		echo '<div class="clear"></div>';
	mysql_close($myConnect);
}
function getFooter(){
 //Функция для отображения содержимого Футера
	echo '<div id="footer">Copyright © Кирилл Ермаков,'.  date('Y') . '</div>';
}
