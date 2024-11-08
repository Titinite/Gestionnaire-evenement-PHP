<?php
include "data.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $event_description = $_POST['event_description'];
    $event_date = $_POST['event_date'];
    $created_date = date('d/m H:i');
    addEvent($title, $event_description, $event_date, $created_date);
}

header('Location: index.php');
