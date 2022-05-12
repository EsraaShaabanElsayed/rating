<?php
require_once '../models/user.php';
require_once '../Controllers/DBController.php';
class AuthController
{
    protected $db;
    public function login(User $user)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "select * from User where email = '$user->email' & password = '$user->password'";
            $result = $this->db->select($query);
            if (
                $result === false
            ) {
                echo "error in query";
                return false;
            } else {
                if (count($result) == 0) {
                    session_start();
                    $_SESSION["erorrMassage"] = "you have enterred wrong password or email";


                    return false;
                } else {
                    session_start();
                    $_SESSION["user_id"] = $result[0]["id"];
                    $_SESSION["user_name"] = $result[0]["name"];
                    $_SESSION["user_role"] = $result[0]["role_id"];


                    return true;
                }
            }
        } else {
            echo "error in data base connection";
            return false;
        }
    }
}
