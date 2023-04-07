<?php

// Connect to MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Function to insert a document in the "contacts" collection
function insertContact($mongo, $name, $email, $message) {
    $bulk = new MongoDB\Driver\BulkWrite;
    $doc = ['name' => $name, 'email' => $email, 'message' => $message];
    $bulk->insert($doc);
    $mongo->executeBulkWrite('test.contacts', $bulk);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert the contact form submission in MongoDB
    insertContact($mongo, $name, $email, $message);

    $to = 'your-email@example.com';
    $subject = 'New Message From Contact Form';
    $message_body = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";

    // Send email to yourself
    mail($to, $subject, $message_body, $headers);
}
