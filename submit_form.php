<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data and send to Formspree (or handle email sending yourself)
    
    // After processing the form
    header('Location: success.html');  // Redirect to success page
    exit;
}
?>
