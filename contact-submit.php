<?php
$toEmail      = 'minhamkhanzada4455@gmail.com';
$fromEmail    = 'info@creativeconverge.com';
$thankYouPage = 'thankYou/';

$consoleLog   = true;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') exit('Method not allowed.');

if (!empty($_POST['website'])) {
    header('Location: ' . $thankYouPage);
    exit;
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || preg_match('/[\r\n]/', $name . $email . $phone)) {
    exit('Please enter your name and a valid email address.');
}

$subject = 'New form request from ' . $name;
$body    = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message\n";

$headers  = "From: Creative Converge <$fromEmail>\r\n";
$headers .= "Reply-To: $name <$email>\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

error_clear_last();
$sent  = @mail($toEmail, $subject, $body, $headers, '-f' . $fromEmail);
$error = $sent ? '' : (error_get_last()['message'] ?? 'mail() returned false (no mail server?)');
if (!$sent) error_log('Contact form mail error: ' . $error);

$redirect = $thankYouPage . '?name=' . rawurlencode($name);

if (!$consoleLog) {
    if ($sent) {
        header('Location: ' . $redirect);
        exit;
    }
    exit('Sorry, your message could not be sent. Please try again later.');
}


$log = [
    'status'   => $sent ? 'SENT' : 'FAILED',
    'to'       => $toEmail,
    'from'     => $fromEmail,
    'subject'  => $subject,
    'form'     => ['name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $message],
    'error'    => $error,
    'server'   => PHP_OS_FAMILY . ' / PHP ' . PHP_VERSION,
    'sendmail' => ini_get('sendmail_path') ?: ('SMTP=' . ini_get('SMTP') . ':' . ini_get('smtp_port')),
    'time'     => date('Y-m-d H:i:s'),
];
$json = json_encode($log, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $sent ? 'Message sent' : 'Message not sent' ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 560px;
            margin: 80px auto;
            padding: 20px;
            text-align: center;
            line-height: 1.6;
        }

        .ok {
            color: #008f83;
        }

        .err {
            color: #c0392b;
        }
    </style>
</head>

<body>
    <?php if ($sent): ?>
        <h2 class="ok">Message sent ✓</h2>
        <p>Taking you to the thank-you page… (open Console with F12 to see the details)</p>
    <?php else: ?>
        <h2 class="err">Message not sent ✗</h2>
        <p>Open Console (F12) to see why.</p>
        <p><a href="javascript:history.back()">Go back</a></p>
    <?php endif; ?>

    <script>
        (function() {
            var log = <?= $json ?>;
            var style = log.status === 'SENT' ?
                'background:#00D4A3;color:#04342C;padding:2px 8px;border-radius:4px;font-weight:bold' :
                'background:#c0392b;color:#fff;padding:2px 8px;border-radius:4px;font-weight:bold';

            console.group('%cContact form: ' + log.status, style);
            console.log('To:      ', log.to);
            console.log('From:    ', log.from);
            console.log('Subject: ', log.subject);
            console.table(log.form);
            console.log('Server:  ', log.server);
            console.log('Mailer:  ', log.sendmail);
            console.log('Time:    ', log.time);
            if (log.error) console.error('Error:', log.error);
            console.groupEnd();

            <?php if ($sent): ?>
                setTimeout(function() {
                    location.href = <?= json_encode($redirect, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
                }, 3000);
            <?php endif; ?>
        })();
    </script>
</body>

</html>