<?php

include_once("./function/helper.php");
include_once("./function/connection.php");
include_once("./pages-components/header.php");
include_once("./pages-components/navbar.php");

$page = isset($_GET['page']) ? $_GET['page'] : false;
$pagesTrack = "./pages/".$page.".php";

if(file_exists($pagesTrack)) {
    include_once($pagesTrack);
} else {
    include_once("./pages/dashboard.php");
}

include_once("./pages-components/footer.php");