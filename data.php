<?php
try {
    $db = new PDO("mysql:host=127.0.0.1:8889;dbname=gestion_events", "root", "root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
    exit();
}

function addEvent($user_id, $title, $description, $event_date) {
    global $db;
    $query = $db->prepare("INSERT INTO events (user_id, title, description, event_date) VALUES (:user_id, :title, :description, :event_date)");
    $query->bindParam(':user_id', $user_id);
    $query->bindParam(':title', $title);
    $query->bindParam(':description', $description);
    $query->bindParam(':event_date', $event_date);
    $query->execute();
}

function getEvents($user_id) {
    global $db;
    $query = $db->prepare("SELECT * FROM events WHERE user_id = :user_id ORDER BY event_date ASC");
    $query->bindParam(':user_id', $user_id);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function updateEvent($event_id, $user_id, $title, $description, $event_date) {
    global $db;
    $query = $db->prepare("UPDATE events SET title = :title, description = :description, event_date = :event_date WHERE event_id = :event_id AND user_id = :user_id");
    $query->bindParam(':title', $title);
    $query->bindParam(':description', $description);
    $query->bindParam(':event_date', $event_date);
    $query->bindParam(':event_id', $event_id);
    $query->bindParam(':user_id', $user_id);
    $query->execute();
}

function deleteEvent($event_id, $user_id) {
    global $db;
    $query = $db->prepare("DELETE FROM events WHERE event_id = :event_id AND user_id = :user_id");
    $query->bindParam(':event_id', $event_id);
    $query->bindParam(':user_id', $user_id);
    $query->execute();
}
