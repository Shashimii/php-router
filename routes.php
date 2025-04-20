<?php
// routes that will be used by router
// router instance->verb function(page link, controller path)->only function(key) "middleware"

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php');

$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/session', 'controllers/session/store.php');
$router->delete('/session', 'controllers/session/destroy.php')->only('auth');

$router->get('/', 'controllers/dashboard.php');
$router->get('/contact', 'controllers/contact.php');
$router->get('/about', 'controllers/about.php');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php')->only('auth');
$router->get('/notes/create', 'controllers/notes/create.php')->only('auth');
$router->get('/note/edit', 'controllers/notes/edit.php')->only('auth');

$router->post('/notes', 'controllers/notes/store.php');
$router->patch('/notes', 'controllers/notes/update.php');
$router->delete('/notes', 'controllers/notes/destroy.php');