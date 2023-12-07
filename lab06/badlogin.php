<?php
include("menu.php");
if(isset($_POST["email"]))
{
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    //connect
    include("db.php");
    $conn = new mysqli($host, $username, $password, $dbname);
    if($conn->connect_error){
        die('Error'.$conn->connect_error);
        echo "Hi";
    }
    //sqlcommand
    $sql = "select * from employee where email='$email' and pass='$pass'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $_SESSION["login"] = 1;
    }
    else{
        $msg = "Invalid user please try again";
    }
    //close
    $conn.close();
    //redirect
    if(isset($_SESSION["login"])){
        header("location:list.php");
    }
}
?>
<form action="badlogin.php" method="post">
    <h1>Bad Login Page</h1>
    <table>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email">Email</td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass">Email</td>
        </tr>
    </table>
    <input type="submit" value="login">
</form>
<?php echo (isset($msg) ? $msg : ""); ?>