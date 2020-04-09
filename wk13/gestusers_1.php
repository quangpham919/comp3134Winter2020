
<form method="GET" > 
<input type="text"  placeholder="Your input goes here" name="input"> 
<br><br>
<button type="submit"> Submit</button>
</form> 
<?php
$name = $_GET['input'];
if($name){
$servername = "localhost";
$username = "admin";
$password = "Quang919";
$dbname = "cybersecurity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT *  FROM users where firstname = '".$name. "' and active = 1 ;"  ;;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>USERNAME</th><th>FIRSTNAME</th><th>LASTNAME</th><th>EMAIL</th><th>ACTIVE</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["ID"]."</td><td>".$row["username"]."</td><td> ".$row["firstname"].
             "</td><td>".$row["lastname"]."</td><td>".$row['email']."</td><td>".$row['active']
             ."</td></tr>";
}
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close(); 

}
?>



