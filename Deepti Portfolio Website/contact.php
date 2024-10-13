<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Your email address
    $to = "jaangra.deeptii@gmail.com";
    $subject = "New Contact Form Message from Portfolio";

    // Email body content
    $body = "You have received a new message from your contact form.\n\n";
    $body .= "Full Name: " . $fullname . "\n";
    $body .= "Email: " . $email . "\n\n";
    $body .= "Message:\n" . $message . "\n";

    // Email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        // Success message
        echo "Thank you for your message. We will get back to you shortly.";
    } else {
        // Error message
        echo "Sorry, there was an issue sending your message. Please try again later.";
    }
}
?>
