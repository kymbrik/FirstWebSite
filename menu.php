<?php
$menu = array(
		'Главная' => 'index.php?id=1',
		'О себе' => 'index.php?id=2',
		'Фотогалерея' => 'index.php?id=3'
		);
function getMenu($menu){
	
	echo '<ul>';
	foreach($menu as $href=>$value){
		echo "<li><a href=\"$value\">$href</a></li>";
	}
	echo '</ul>';
}
?>