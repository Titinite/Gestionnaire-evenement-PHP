<?php
    try {
        $base = new PDO("mysql:host=127.0.0.1:8889;dbname=events", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo "Connection error: " . $e->getMessage();
        exit();
    }

    function addEvent($title, $description, $event_date, $created_date) {
        global $base;
        $query = $base->prepare("INSERT INTO events (title, description, event_date, created_date) VALUES (:title, :description, :event_date, :created_date)");
        $query->bindParam(':title', $title);
        $query->bindParam(':description', $description);
        $query->bindParam(':event_date', $event_date);
        $query->bindParam(':created_date', $created_date);
        $query->execute();
    }

    function getEvents() {
        global $base;
        $query = $base->query("SELECT * FROM events");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $event_date = $_POST['event_date'];
        $created_date = $_POST['created_date'];
        addEvent($title, $description, $event_date, $created_date);
    }

    $events = getEvents();
?>