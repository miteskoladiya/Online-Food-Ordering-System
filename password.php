<?php
// $password = "2425";
// echo password_hash($password,PASSWORD_DEFAULT);

$password= '$2y$10$u5hkM3dzoCTSSkPOVY9k/Okmxbj5I68s1Xx5Y1TkZSzh6tLush.Nq';
echo password_verify('2425',$password);

?>