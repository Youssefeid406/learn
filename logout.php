<?php
require_once "db_conne.php";
session_start();

session_destroy();
header("location:choosequiztoedit.php");
?>