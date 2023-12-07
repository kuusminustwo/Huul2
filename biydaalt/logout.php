<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION["managerID"])) {
        echo "<h1>Thank you, Manager {$_SESSION["managerID"]}, for using the system!</h1>";
        session_destroy();
    } else {
        if (isset($_SESSION["customerID"])) {
            echo "<h1>Thank you, Customer {$_SESSION["customerID"]}, for using the system!</h1>";
            session_destroy();
        } else {
            echo "<h1>You are not logged in</h1>";
        }
    }
    ?>
    <script>
        setTimeout(function () {
            window.location.href = "buyonline.htm";
        }, 3000);
    </script>
</body>
</html>
