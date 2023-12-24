<?php
// Establish database connection (update with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty_care";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$output = '';
if(isset($_POST['query'])){
    $search = $_POST['query'];
    $search = mysqli_real_escape_string($conn, $search);
    
    $sql = "SELECT * FROM products WHERE pro_titel LIKE '%$search%'";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= '<p>' . $row['pro_titel'] . '</p>';
            // You can display more details about the product here
        }
    } else {
        $output .= '<p>No products found.</p>';
    }
    echo $output;
}
$conn->close();
?>
