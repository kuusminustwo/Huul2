<?php
    session_start();
    if(isset($_SESSION["login"]))
        echo "<a href='logout.php'>logout</a>";
    else
        echo "<a href='goodlogin.php'>logout</a>";  
?>
<a href="register.php">Register</a>
<a href="list.php">List</a>
<a href="Search.php">Search</a>