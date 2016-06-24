<!-- /*Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick*/ -->
<?php
session_start();
session_unset();
session_destroy();
header("Location: ../php/index.php");
?>
