<?php 

include '../../Library/connection.php';

session_start();

// destroy session
session_destroy();

header('location: ../View/landing/index.php');