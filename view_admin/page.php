<?php
if (!empty($_GET["module"])){
include_once($_GET["module"].".php");

} else {
include_once("dashboard.php");
}
?>