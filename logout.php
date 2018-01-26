<?php
session_start();

session_destroy();

echo" you have logged out successfully";
echo " click <a href='index.php'> here </a> to go to home page";
