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
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      http_response_code(405);
      exit('Method Not Allowed');
    }

    $email = $_POST['email'] ?? '';
    $pass  = $_POST['password'] ?? '';

    if ($email === 'admin@gmail.com' && $pass === 'admin123') {
      $_SESSION['user'] = [
        'name'   => 'Admin',
        'email'  => $email,
        'avatar' => '/assets/img/logo-lapanganin.png',
        'role'   => 'admin'
      ];
      header('Location: ' . $base . '/admin');
      exit;
    }

    if ($email === 'rendy@gmail.com' && $pass === '12345') {
      $_SESSION['user'] = [
        'name'   => 'Rendy',
        'email'  => $email,
        'avatar' => '/assets/img/logo-lapanganin.png',
        'role'   => 'user'
      ];
      header('Location: ' . $base . '/');
      exit;
    }

    header('Location: ' . $base . '/login?error=1');
    exit;

  case '/logout':
    session_destroy();
    header('Location: /'); exit;

  case '/auth/do-register':
    if ($_SERVER['REQUEST_METHOD']!=='POST'){ http_response_code(405); exit('Method Not Allowed'); }
    $pwd=$_POST['password']??''; $cfm=$_POST['password_confirm']??'';
    if ($pwd!==$cfm){ header('Location: /register?error=pwd_mismatch'); exit; }
    header('Location: /login?success=1'); exit;

  case '/venue/rush-badminton':
    require __DIR__.'/../views/venue/rush-badminton.php';
    break;

  case '/venue/zona-futsal':
    require __DIR__.'/../views/venue/zona-futsal.php';
    break;

  case '/venue/lapangan8':
    require __DIR__.'/../views/venue/lapangan8.php';
    break;

  case '/venue/king-futsal':
    require __DIR__.'/../views/venue/king-futsal.php';
    break;

  case '/profile':
    require __DIR__.'/../views/profile/index.php';
    break;


  case '/__ping':
    echo 'OK'; break;

  case '/partner':
case '/partner/':
    $title = 'Partner With Us - Lapanganin';
    require __DIR__ . '/../views/partner/index.php';
    break;

case '/venue':
case '/venue/':
    require __DIR__ . '/../views/venue/index.php';
    break;

case '/venue/zona-futsal':
case '/venue/zona-futsal/':
    require __DIR__ . '/../views/venue/zona-futsal.php';
    break;

case '/jadwal':
case '/jadwal/':
    $title = 'Jadwal Saya - Lapanganin';
    require __DIR__ . '/../views/jadwal/index.php';
    break;

case '/booking/checkout':
case '/booking/checkout/':
    $title = 'Pilih Metode Pembayaran - Lapanganin';
    require __DIR__ . '/../views/booking/checkout.php';
    break;

case '/booking/pilih-metode':
case '/booking/pilih-metode.php':
  require __DIR__.'/../views/booking/pilih-metode.php';
  break;

case '/profile/password':
  require __DIR__.'/../views/profile/password.php';
  break;

case '/admin':
case '/admin/index.php':
  require __DIR__ . '/../views/admin/index.php';
  break;
  
case '/admin/venue/add':
  require __DIR__ . '/../views/admin/venue-add.php';
  break;

case '/admin/venue/edit':
  require __DIR__ . '/../views/admin/venue-edit.php';
  break;

  default:
    http_response_code(404); echo 'Not Found';
}