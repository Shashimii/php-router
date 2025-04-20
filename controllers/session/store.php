<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

// validate email and password

if (!Validator::string($email)) {
    $errors['email'] = 'Please enter a valid email.';
}

if (!Validator::string($password)) {
    $errors['email'] = 'Please enter a valid password.';
} 

if (! empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors
    ]);
}

// match the credentials

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

// if there is an email found match the password

if ($user) {
    if (password_verify($password, $user['password'])) { // password_verify is PHP function to verify bycrypted passwords
        login([
            'email' => $email
        ]);

        header('location: /'); // if the password matched redirect
        exit();
    }
}

// if email or password fail return to login page show the error

return view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email and password.'
    ]
]);

