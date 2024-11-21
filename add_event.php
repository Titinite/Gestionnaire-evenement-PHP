<?php
include "data.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $event_description = $_POST['event_description'];
    $event_date = $_POST['event_date'];
    $created_date = new DateTime();
    addEvent($title, $event_description, $event_date->format('Y-m-d'), $created_date->format('Y-m-d H:i:s'));
}

header('Location: index.php');
