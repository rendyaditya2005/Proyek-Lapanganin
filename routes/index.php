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
