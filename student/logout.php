<?php
session_start();
if(isset($_SESSION['student']))
{
session_unset();
session_destroy();
header('location:../index.php');
}
