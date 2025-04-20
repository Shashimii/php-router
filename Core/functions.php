<?php

use Core\Response;

function dd($value) {
    echo "<pre>";
        var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN)  {
    if (! $condition) {
        abort($status);
    }
}

function abort($status = RESPONSE::NOT_FOUND) {
    http_response_code($status);
    require base_path("views/{$status}.php");
    die();
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path , $attributes = []) {
    extract($attributes);

    require base_path('views/' . $path);
}

// login & logout

function login($user){
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true); // regnerate new id and delete old session
 }
 
 function logout(){
    $_SESSION = []; // empty the session
    session_destroy(); // destroy the logged session

    // expires the cookie to remove it
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']); // php function
 
 }