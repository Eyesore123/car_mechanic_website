<?php
$password = ''; // Replace with your actual password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo "Your hashed password is: " . $hashed_password;
