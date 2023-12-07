<?php
    include("menu.php");
    if(!isset($_SESSION["login"]))
        header("location:goodlogin.php");
?>
<h1>List of Pet</h1>
<?php
    include("db.php");
    $conn = new mysqli($host, $username, $password, $dbname);
    if($conn->connect_error){
        die('Error'.$conn->connect_error);
        echo "Hi";
    }
    $sql = "select * from pet order by type desc";
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
?>