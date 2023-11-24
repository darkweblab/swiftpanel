<?php
$title = "Support";
$page = "support";
$return = "support.php";
require( "./configuration.php" );
include( "./include.php" );
$smarty->display( "header.tpl" );
$smarty->display( "supp.tpl" );
$smarty->display( "footer.tpl" );
?>