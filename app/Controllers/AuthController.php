<?php
class AuthController {
  
  // Menampilkan halaman login
  public function showLogin() {
    require __DIR__ . '/../../views/auth/login.php';
  }

  // Menampilkan halaman register
  public function showRegister() {
    require __DIR__ . '/../../views/auth/register.php';
  }

  // Simulasi proses login (dummy)
  public function doLogin() {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Login dummy: jika email dan password cocok, arahkan ke "dashboard"
    if ($email === 'admin@gmail.com' && $password === '12345') {
      header('Location: /dashboard');
      exit;
    } else {
      header('Location: /login?error=1');
      exit;
    }
  }

  // Simulasi proses register (dummy)
  public function doRegister() {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['password_confirm'] ?? '';

    // Validasi sederhana
    if ($password !== $confirm) {
      header('Location: /register?error=pwd_mismatch');
      exit;
    }

    // Anggap pendaftaran berhasil, arahkan ke halaman login
    header('Location: /login?success=1');
    exit;
  }
}
