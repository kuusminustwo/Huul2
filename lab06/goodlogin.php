<?php
include("menu.php");
if(isset($_POST["email"]))
{
    //safe variable
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    if(empty($email))
    {
        $msg = "<font color='red'>enter a email address</font>";
    }
   else{
        //connect
        include("db.php");
        $conn = new mysqli($host, $username, $password, $dbname);
        if($conn->connect_error){
            die('Error'.$conn->connect_error);
            echo "Hi";
        } 

        //unsafe variable
        $email = mysqli_real_escape_string($conn,$email);
        $pass = mysqli_real_escape_string($conn,$pass);

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
        $conn->close();
        //redirect
        if(isset($_SESSION["login"])){
            header("location:list.php");
        }
   }
}
?>
<form action="goodlogin.php" onsubmit="return validate()" method="post">
    <h1>Bad Login Page</h1>
    <table>
        <tr>
            <td>Email</td>
            <td>
                <input type="text" id="email" name="email">
                <span id="emailerror"></span>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass"></td>
        </tr>
    </table>
    <input type="submit" value="login">
</form>
<?php echo (isset($msg)) ? $msg : ""; ?>
<script>
    function validate()
    {
        var email = document.getElementById("email").value;
        if(email == null || email == "")
        {
            document.getElementById("emailerror").innerHTML = "please enter a email";
            return false;
        }
    }
</script>