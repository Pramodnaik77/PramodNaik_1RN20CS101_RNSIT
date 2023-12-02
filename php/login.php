<?php
$root=$_SERVER["DOCUMENT_ROOT"];
include_once $root."/guvi/php/database.php";
include_once $root."/guvi/php/ProgrammDB.php";
$username=$_POST["username"];
$password=$_POST["password"];

$db= new Database();
$pdo=new ProgrammDB();

$result = $pdo->getAccount($dbo,$username,$password);
if($result == 0){

    http_response_code(404);
    echo json_encode(array("statusCode" => 409,"responseText"  => "Login Failed."));
}
$rv = json_encode($result);

?>

