<?php 
$page = isset($_GET['ref']) ? $_GET['ref'] : "main";

include "./files/includes/header.php";
include "./files/$page.php";
include "./files/includes/footer.php";