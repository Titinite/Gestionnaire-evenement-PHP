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
        $query = $base->prepare("DELETE FROM events WHERE Id = :Id");
        $query->bindParam(":Id", $Id);
        $query->execute();
    }

    function changeEvent($Id, $title, $event_description, $event_date){
        global $base;
        $query = $base->prepare("UPDATE events SET title = :title, event_description = :event_description, event_date = :event_date WHERE Id = :Id");
        $query->bindParam(":Id", $Id);
        $query->bindParam(":title", $title);
        $query->bindParam(":event_description", $event_description);
        $query->bindParam(":event_date", $event_date);
        $query->execute();
    }

    $events = getEvents();
