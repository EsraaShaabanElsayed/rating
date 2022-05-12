<?php
require_once '../models/';
require_once '../Controllers/AuthController';
$erorrMassage = "";
if (isset($_POST['email']) && isset($_POST['password'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $user = new user();
        $auth = new AuthController;

        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        if (!$auth->login($user)) {
            session_start();
            $erorrMassage = $_SESSION["errorMassage"];
        } else {
        }
    }
}
