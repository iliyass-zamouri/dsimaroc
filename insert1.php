<?php
$nom = $_POST['name'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['pass'];

if(!empty($nom) || !empty($prenom) || !empty($email) || !empty($password)) {
    $host = "localhost";
    $db_user = "root";
    $db_pass = "root";
    $db_name = "dsimaroc";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);
if(mysqli_connect_error()){
    die('Connect_Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{
    $SELECT = "SELECT email from users where email = ? Limit 1"; 
    $INSERT = "INSERT into users (nom , penom , email , password) values (? , ? , ? , ? )";
    $stmt->bind_param("ssss", $nom, $prenom, $email, $password);
	$stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    
    if($rnum==0){
        $stmt->close();
        
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param($nom , $prenom , $email , $password);
        $stmt->execute();
        echoo("new record insert suucessfully"); 
    } else {
        echo("Email deja utiliser");
    }
    $stmt->close();
    $conn->close();
    }
} else {
    echo "TOUS LES ZONES SONT IMPORTANT";
    die();
}
?>