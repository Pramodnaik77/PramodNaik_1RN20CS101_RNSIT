<?php
require_once "database.php";
class ProgrammDB{
    public function createAccount($dbo, $username, $first_name, $last_name, $phone_number, $address, $password, $gender){
        $cmd = "Insert into user_info (username, First_name, Last_name, Phone_number, Address, password, gender) values(:username, :First_name,:Last_name, :Phone_number, :Address, :password, :gender)";

        $statement = $dbo->conn->prepare($cmd);
        try{
            $statement->execute([":username"=>$username, ":First_name"=>$first_name, ":Last_name"=>$last_name, ":Phone_number"=>$phone_number, ":Address"=>$address, ":password"=>$password, ":gender"=>$gender]);
            return 1;
        }
        catch(Exception $e){
            echo "Error".$e->getMessage()."<br>";
            return 0;
        }
    }

    public function UpdateProfile($dbo,$username, $first_name, $last_name, $phone_number, $address, $gender){
        $cmd = "UPDATE user_info SET First_name = :First_name, Last_name = :Last_name, Phone_number = :Phone_number, Address = :address, gender = :gender, password = :password WHERE username = :username";

        $statement = $dbo->conn->prepare($cmd);

        try {
            $statement->execute([
                ":First_name" => $first_name,
                ":Last_name" => $last_name,
                ":Phone_number" => $phone_number,
                ":Address" => $address,
                ":gender" => $gender
            ]);

            return 1;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . "<br>";
            return 0;
        }

    }
    public function getAccount($dbo, $username, $password){
        $cmd = "select username,First_name,Last_name,Phone_number,Address,password from user_info where username=:username and password=:password";

        $statement = $dbo->conn->prepare($cmd);
        try{
            $rv = $statement->execute([":username"=>$username, ":password"=>$password]);
            $res = json_decode($rv, true);
            return $res;
        }
        catch(Exception $e){
            echo "Error".$e->getMessage()."<br>";
            return 0;
        }
    }
}
?>
