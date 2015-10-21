<?php 

$dbHost='localhost';
$dbName='firstwebpagedb';
$dbUser='root';
$dbPass='1';

$myConnect = mysql_connect($dbHost,$dbUser,$dbPass);
mysql_select_db($dbName,$myConnect);
mysql_query("SET NAMES utf8");
$qwerCnt= mysql_query("select COUNT(id_image) as total from `images`",$myConnect) or die(mysql_error());
$count = mysql_fetch_array($qwerCnt);



if(isset($_GET['imgid']))
{
	

} 
$qwer=mysql_query("select images.path_image, topics.topic_name, images.id_topic  from `images`,`topics` where images.id_topic=topics.id_topic ",$myConnect) or die(mysql_error());

//URL без параметров
$url=strtok($_SERVER["REQUEST_URI"],'?');




if(isset($_GET['imgid']))
{
	$i=$_GET['imgid'];
	$del=mysql_query("DELETE FROM `images` WHERE `id_topic` = '$i' ",$myConnect) or die(mysql_error());
}

while ($arr=mysql_fetch_array($qwer)) {

		echo '<div><img src="' . $arr['path_image'] . '"></div>';
		echo '<div>'.$arr['topic_name'].'</div>';
		//Формирование GET параметров
		$query_arr = $_GET;
		$query_arr["id"] = $_GET['id'];
		$query_arr["imgid"] = $arr['id_topic'];
		$query_arr = http_build_query($query_arr);
		echo '<a href="' .$url.'?'.$query_arr.'"> Удалить</a>';

}

mysql_close($myConnect);
?>

