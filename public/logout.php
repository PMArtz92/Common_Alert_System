<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
    header("Location: ../.../../public/index.php"); // Redirecting To Home Page
}
?>