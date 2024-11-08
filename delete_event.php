<?php
include 'data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteEvent($_POST['Id']);
}
