<?php
    include("menu.php");
    if(!isset($_SESSION["login"]))
    header("location:goodlogin.php");
?>
<h1>Search</h1>
Enter a pet's name;
<form method="post" action="search.php">
<input type="text" name="search">
<input type="submit" value="submit">
</form>

<?php
    include("db.php");
    $conn = new mysqli($host, $username, $password, $dbname);
    if($conn->connect_error){
        die('Error'.$conn->connect_error);
    }
    if(isset($_POST["search"])){
        $search = $_POST["search"];

        $sql = "select * from pet where name='$search'";
    
        $result = $conn->query($sql);
    
        echo "<table border='1'>";
        echo "<td>Name</td>";
        echo "<td>Owner</td>";
        echo "<td>Gender</td>";
        echo "<td>Type</td>";
        echo "<td>Birth</td>";
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['owner']."</td>";
                echo "<td>".$row['gender']."</td>";
                echo "<td>".$row['birth']."</td>";
                echo "<td>".$row['type']."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }
    
?>