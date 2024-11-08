<?php
try {
    $db = new PDO("mysql:host=127.0.0.1:8889;dbname=gestion_events", "root", "root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
    exit();
}

function addEvent($title, $event_description, $event_date, $created_date) {
    global $db;
    $query = $db->prepare("INSERT INTO events (title, event_description, event_date, created_date) VALUES (:title, :event_description, :event_date, :created_date)");
    $query->bindParam(':title', $title);
    $query->bindParam(':event_description', $event_description);
    $query->bindParam(':event_date', $event_date);
    $query->bindParam(':created_date', $created_date);
    $query->execute();
}

function getEvents() {
    global $db;
    $query = $db->prepare("SELECT * FROM events ORDER BY event_date ASC");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function updateEvent($Id, $title, $event_description, $event_date) {
    global $db;
    $query = $db->prepare("UPDATE events SET title = :title, event_description = :event_description, event_date = :event_date WHERE Id = :Id");
    $query->bindParam(':title', $title);
    $query->bindParam(':event_description', $event_description);
    $query->bindParam(':event_date', $event_date);
    $query->bindParam(':Id', $Id);
    $query->execute();
}

function deleteEvent($Id) {
    global $db;
    $query = $db->prepare("DELETE FROM events WHERE Id = :Id");
    $query->bindParam(':Id', $Id);
    $query->execute();
}
