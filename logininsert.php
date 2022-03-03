<?php
$servername = "SERVER_NAME";
$username = "USER_NAME"; 
$password = "PASSWORD";
$dbname= "DATABASE_NAME";

// Create connection
$conn = new mysqli($servername, $username, $password , $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed:". $conn->connect_error);
} 
//echo "Connected successfully";
echo POST['uname'],POST['pass'];
$sql = "INSERT INTO login(POST['uname'],POST['pass'])
values(POST['uname'],POST['pass'])";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . <'br'> . mysqli_error($conn);
}

mysqli_close($conn);
?>
<?php
$servername = "SERVER_NAME";
$username = "USER_NAME"; 
$password = "PASSWORD";
$dbname= "DATABASE_NAME";

// Create connection
$conn = new mysqli($servername, $username, $password , $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed:". $conn->connect_error);
} 
//echo "Connected successfully";
echo POST['uname'],POST['pass'];
$sql = "INSERT INTO login(POST['uname'],POST['pass'])
values(POST['uname'],POST['pass'])";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . <'br'> . mysqli_error($conn);
}

mysqli_close($conn);
?>
