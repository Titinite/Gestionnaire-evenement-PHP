<?php
    try {
        $base = new PDO("mysql:host=127.0.0.1;dbname=gestion_events", "root", "");
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
        $query = $base->query("SELECT * FROM events ORDER BY event_date ASC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteEvent($Id) {
        global $base;
        $query = $base->query("DELETE FROM events WHERE Id = :id");
        $query->bindParam("Id", $Id);
        $query->execute();
    }

    function changeEvent($title, $event_description, $event_date){
        global $base;
        $query = $base->query("UPDATE events SET title = :title, event_description = :event_description, event_date = :event_date WHERE Id = :id");
        $query->bindParam("title", $title);
        $query->bindParam("event_description", $event_description);
        $query->bindParam("event_date", $event_date);
        $query->execute();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $event_description = $_POST['event_description'];
        $event_date = $_POST['event_date'];
        $created_date = time();
        addEvent($title, $event_description, $event_date, $created_date);
    }

    $events = getEvents();
