<?php
    include("menu.php");
    if(!isset($_SESSION["login"]))
    header("location:goodlogin.php");
    include("db.php");
    $conn = new mysqli($host, $username, $password, $dbname);
    if($conn->connect_error){
        die('Error'.$conn->connect_error);
    }


    if(isset($_POST["name"])){
        $name = $_POST["name"];
        $owner = $_POST["owner"];
        $birth = $_POST["birth"];
        $gender = $_POST["gender"];
        $type = $_POST["type"];
        $sql = "insert into pet(name, owner, birth, gender, type)
            values('$name', '$owner', '$birth', '$gender', '$type')";

        
        if($conn->query($sql) === True){
            $msg = "Registration is successful";
        }
        $conn->close();
    }

    
?>
<h1>PET Registration</h1>
<form action="register.php" method="POST">
<table>
    <tr>
        <td>Name</td>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <td>Owner</td>
        <td><input type="text" name="owner"></td>
    </tr>
    <tr>
        <td>Birth</td>
        <td><input type="date" name="birth"></td>
    </tr>
    <tr>
        <td>Gender</td>
        <td>
            <input type="radio" name="gender" value="1">Female
            <input type="radio" name="gender" value="2">Male
        </td>
    </tr>
    <tr>
        <td>Type</td>
        <td>
            <select name="type">
                <option value="cat">Cat</option>
                <option value="dog">Dog</option>
                <option value="snake">Snake</option>
                <option value="bird">Bird</option>
            </select>
        </td>
    </tr>
</table>
<input type="submit" value="Save">
</form>
<?php
    if(isset($msg)) echo $msg;
?>