<?php
require __DIR__ . '/../app/Controllers/AuthController.php';
$auth = new AuthController();

$router->get('/login', function () use ($auth) {
  $auth->showLogin();
});

$router->post('/auth/do-login', function () use ($auth) {
  $auth->doLogin();
});

$router->get('/register', function () {
  echo 'REGISTER OK';
});


$router->post('/auth/do-register', function () use ($auth) {
  $auth->doRegister();
});

// Dummy dashboard buat ngetes redirect login berhasil
$router->get('/dashboard', function () {
  echo "<h1>Selamat datang di Dashboard!</h1><p>Login berhasil.</p>";
});

// TEST ROUTE SEDERHANA
$router->get('/test', function () {
  echo "ROUTE TEST OK";
});

// ROUTE VENUE DETAIL
$router->get('/venue/rush-badminton', function () {
  require __DIR__ . '/../views/venue/rush-badminton.php';
});

$router->get('/venue/zona-futsal', function () {
  require __DIR__ . '/../views/venue/zona-futsal.php';
});

$router->get('/venue/lapangan8', function () {
  require __DIR__ . '/../views/venue/lapangan8.php';
});

$router->get('/venue/king-futsal', function () {
  require __DIR__ . '/../views/venue/king-futsal.php';
});

$router->get('/profile', function() {
    require __DIR__ . '/../views/profile/index.php';
});
