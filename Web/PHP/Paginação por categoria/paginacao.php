<style type="text/css">
<!--
.pgoff {font-family: Verdana, Arial, Helvetica; font-size: 11px; color: #FF0000; text-decoration: none}
a.pg {font-family: Verdana, Arial, Helvetica; font-size: 11px; color: #003366; text-decoration: none}
a:hover.pg {font-family: Verdana, Arial, Helvetica; font-size: 11px; color: #0066cc; text-decoration:underline}
-->
</style>

<?php

	$quant_pg = ceil($quantreg/$numreg);
	$quant_pg++;
	
	if (@$_GET['pg']>0) {
		echo "<a href=".$_SERVER['PHP_SELF']."?pg=".(@$_GET['pg']-1)."&categoria=$categoria class=pg>&laquo; anterior </a>";
	} else {
		echo "<font color=#cccccc>&laquo; anterior </font>";
	}
	
	for($i_pg=1;$i_pg<$quant_pg;$i_pg++) {
	
		if (@$_GET['pg']==($i_pg-1)) {
			echo "&nbsp;<span class=pgoff>[$i_pg]</span>&nbsp;";
		} else {
			$i_pg2 = $i_pg-1;
			echo "&nbsp;<a href=".$_SERVER['PHP_SELF']."?pg=$i_pg2 &categoria=$categoria class=pg>$i_pg</a>&nbsp;";
		}
	}
	
	if ((@$_GET['pg']+2)<$quant_pg) {
		echo "<a href=".$_SERVER['PHP_SELF']."?pg=".(@$_GET['pg']+1)."&categoria=$categoria class=pg>Proximo &raquo;</a>";
	} else {
		echo "<font color=#cccccc> proximo &raquo;</font>";
	}
?>