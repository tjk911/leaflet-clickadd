<?php
  session_start();
  include("dbConnect.php");
  if(isset($_SESSION['admin'])) {
    $view='';

    if(isset($_GET['view'])) {
    $view = $_GET['view']; 
    $view = stripslashes($view);
    $view = mysql_real_escape_string($view);
    }
    if ($view == 'admin') {
      include("admin.php");
    } else if ($view == 'login') {
      include("login.php");
    } else if ($view == 'delete') {
      include("delete.php");
    } else if ($view == 'edit_process') {
      include("edit_process.php");
    } else if ($view == 'edit') {
      include("edit.php");
    } else if ($view == 'login') {
      include("login.php");
    }
  } else {
  header("location:index.php");
  }
?>