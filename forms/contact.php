<?php

// Configuration
$receivingEmailAddress = 'riganrahmadin8@gmail.com';
$phpEmailFormPath = '../assets/vendor/php-email-form/php-email-form.php';

// Check if PHP Email Form library exists
if (!file_exists($phpEmailFormPath)) {
    die('Unable to load the "PHP Email Form" Library!');
}

// Include PHP Email Form library
require_once $phpEmailFormPath;

// Create a new instance of PHP Email Form
$contact = new php_email_form();
$contact->ajax = true;

// Set email recipient
$contact->to = $receivingEmailAddress;

// Set email sender information
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];

// Set email subject
$contact->subject = $_POST['subject'];

// Add message fields
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// Uncomment and configure SMTP settings if needed
// $contact->smtp = array(
//     'host' => 'example.com',
//     'username' => 'example',
//     'password' => 'pass',
//     'port' => '587'
// );

// Send the email
echo $contact->send();
?>