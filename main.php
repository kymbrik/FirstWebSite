<?php 

$dbHost='localhost';
$dbName='firstwebpagedb';
$dbUser='root';
$dbPass='1';

$myConnect = mysql_connect($dbHost,$dbUser,$dbPass);
mysql_select_db($dbName,$myConnect);
mysql_query("SET NAMES utf8");
$qwer=mysql_query("select topic_name from `topics`",$myConnect) or die(mysql_error());

while ($arr=mysql_fetch_array($qwer)) { echo '<article>	
	<header>
<h2>' . $arr[0] . '</h2>
</header>
<content>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>

</content>
</article>';
}
mysql_close($myConnect);
?>



