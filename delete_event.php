<?php
include "header.php";
include 'data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST['Id']);
    deleteEvent($_POST['Id']);
}

header('Location: index.php');
