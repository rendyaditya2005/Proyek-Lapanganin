<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();

// resolusi path (punyamu yang kemarin)
$uri  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
if ($base !== '' && strpos($uri, $base) === 0) $uri = substr($uri, strlen($base));
$path = '/' . ltrim($uri, '/'); $path = rtrim($path, '/'); if ($path==='') $path='/';

switch ($path) {
  case '/':
    require __DIR__.'/../views/home/index.php';
    break;

  case '/login':
    require __DIR__.'/../views/auth/login.php';
    break;

  case '/register':
    require __DIR__.'/../views/auth/register.php';
    break;

  case '/auth/do-login':
    if ($_SERVER['REQUEST_METHOD']!=='POST'){ http_response_code(405); exit('Method Not Allowed'); }
    $email = $_POST['email'] ?? '';
    $pass  = $_POST['password'] ?? '';
    // dummy auth
    if ($email==='admin@gmail.com' && $pass==='12345') {
      $_SESSION['user'] = [
        'name'  => 'Rendy',
        'email' => $email,
        'avatar'=> '/assets/img/logo-lapanganin.png'
      ];
      header('Location: /'); exit;
    }
    header('Location: /login?error=1'); exit;

  case '/logout':
    session_destroy();
    header('Location: /'); exit;

  case '/auth/do-register':
    if ($_SERVER['REQUEST_METHOD']!=='POST'){ http_response_code(405); exit('Method Not Allowed'); }
    $pwd=$_POST['password']??''; $cfm=$_POST['password_confirm']??'';
    if ($pwd!==$cfm){ header('Location: /register?error=pwd_mismatch'); exit; }
    header('Location: /login?success=1'); exit;

  case '/__ping':
    echo 'OK'; break;

  default:
    http_response_code(404); echo 'Not Found';
}
