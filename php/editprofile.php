<?php
$root=$_SERVER["DOCUMENT_ROOT"];
include_once $root."/guvi/php/database.php";
include_once $root."/guvi/php/ProgrammDB.php";
$username=$_POST["username"];
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$address=$_POST['address'];
$phone_number=$_POST["phone_number"];
$gender=$_POST["gender"];
$address=$_POST["address"];
$db= new Database();
$pdo=new ProgrammDB();

$result = $pdo->UpdateProfile($dbo, $username, $first_name, $last_name, $phone_number, $address, $password, $gender);
if($result == 0){
    http_response_code(404);
    echo json_encode(array("statusCode" => 409,"responseText"  => "Update Failed"));
}
$rv = json_encode($result);
?>