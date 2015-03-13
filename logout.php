<?php 
include 'functions.php';
#remove session data and redirect back to index
session_start();
session_destroy();
session_regenerate_id(TRUE); 
redirect("location: ./index.php");
?>