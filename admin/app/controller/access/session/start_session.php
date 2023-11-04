<?php
session_start();

if ($_SESSION['username'] == "") {
  header("location: app/views/layout_access/login.php");
}
