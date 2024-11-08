<?php
    try {
        $base = new PDO("mysql:host=127.0.0.1:8889;dbname=gestion_events", "root", "root");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo "Connection error: " . $e->getMessage();
        exit();
    }

    function addEvent($title, $event_description, $event_date, $created_date) {
        global $base;
        $query = $base->prepare("INSERT INTO events (title, event_description, event_date, created_date) VALUES (:title, :event_description, :event_date, :created_date)");
        $query->bindParam(':title', $title);
        $query->bindParam(':event_description', $event_description);
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
        $event_description = $_POST['event_description'];
        $event_date = $_POST['event_date'];
        $created_date = time();
        addEvent($title, $event_description, $event_date, $created_date);
    }

    $events = getEvents();
