<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $managerID = $_POST["managerID"];
    $password = $_POST["password"];

    $managerFile = file("data/manager.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($managerFile as $line) {
        list($id, $pass) = explode(",", $line);
        if ($managerID === $id && $password === $pass) {
            $_SESSION["managerID"] = $managerID;
            header("Location: listing.htm");
            exit;
        }
    }

    echo "Invalid manager ID or password.";
}
?>
