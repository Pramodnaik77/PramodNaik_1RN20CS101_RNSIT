<?php
$root=$_SERVER["DOCUMENT_ROOT"];
include_once $root."/guvi/php/database.php";
include_once $root."/guvi/php/ProgrammDB.php";
$email=$_POST["email"];
$password=$_POST["password"];
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$address=$_POST['address'];
$phone_number=$_POST["phone_number"];
$gender=$_POST["gender"];
$db= new Database();
$pdo=new ProgrammDB();

$result = $pdo->createAccount($dbo, $username, $first_name, $last_name, $phone_number, $address, $password, $gender);
if($result == 0){

    http_response_code(404);
    echo json_encode(array("statusCode" => 409,"responseText"  => "Login Failed."));
}
$rv = json_encode($result);

?>
