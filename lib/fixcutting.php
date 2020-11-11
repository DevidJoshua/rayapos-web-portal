<?php 
	function fixTitleSidebar($character, $total_use)
	{
		$panjang=strlen($character);
		return substr($character,0,$total_use).'...';
	}



 ?>