<?php
include "header.php";
include 'data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteEvent($_POST['Id']);
}

header('Location: index.php');
