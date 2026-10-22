
<?php


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed.');
}


$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');


if ($name === '' || $email === '') {
    exit('Please enter your name and email address.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('Please enter a valid email address.');
}

// Prevent header injection
if (
    preg_match('/[\r\n]/', $name) ||
    preg_match('/[\r\n]/', $email) ||
    preg_match('/[\r\n]/', $phone)
) {
    exit('Invalid form data.');
}

// Your business email
$to = 'info@creativeconverge.com';

// Must be a valid email address on your domain
// $from = 'frontend4404@gmail.com';
$from = 'info@creativeconverge.com';


$adminSubject = 'New Consultation Request - Creative Converge';

$adminBody  = "You have received a new consultation request.\n\n";
$adminBody .= "Name: $name\n";
$adminBody .= "Customer Email: $email\n";
$adminBody .= "Phone: $phone\n\n";
$adminBody .= "Message:\n$message\n";

$adminHeaders = [
    'From' => 'Creative Converge <' . $from . '>',
    'Reply-To' => $email,
    'Content-Type' => 'text/plain; charset=UTF-8'
];



$customerSubject = 'Thank You for Contacting Creative Converge';

$customerBody  = "Hi $name,\n\n";
$customerBody .= "Thank you for contacting Creative Converge!\n\n";
$customerBody .= "We have received your consultation request.";
$customerBody .= " Our team will get back to you soon.\n\n";

$customerBody .= "Here is a copy of your submitted details:\n\n";
$customerBody .= "Name: $name\n";
$customerBody .= "Email: $email\n";
$customerBody .= "Phone: $phone\n";
$customerBody .= "Message: $message\n\n";

$customerBody .= "Best regards,\n";
$customerBody .= "Creative Converge Team\n";
$customerBody .= "info@creativeconverge.com";

$customerHeaders = [
    'From' => 'Creative Converge <' . $from . '>',
    'Reply-To' => $to,
    'Content-Type' => 'text/plain; charset=UTF-8'
];

// Send both emails
$adminSent = mail(
    $to,
    $adminSubject,
    $adminBody,
    $adminHeaders
);

$customerSent = mail(
    $email,
    $customerSubject,
    $customerBody,
    $customerHeaders
);

if ($adminSent && $customerSent) {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1">
        <title>Message Sent | Creative Converge</title>
    </head>
    <body>
        <h2>Thank You!</h2>
        <p>Your message has been submitted successfully.</p>
        <p>We will contact you soon.</p>
        <a href="index.php#cvg-consult">Back to Website</a>
    </body>
    </html>';

} elseif ($adminSent) {
    echo 'Your message was received successfully, but the confirmation email could not be sent.';

} else {
    http_response_code(500);
    echo 'Sorry, your message could not be sent. Please try again later.';
}

?>
