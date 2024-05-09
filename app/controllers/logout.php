<?php //require_once view_path("./auth/signup");
if (isset($_SESSION['user'])) {
  unset($_SESSION['user']);
}
redirect('login');
// session_destroy();
// session_regenerate_id();
// require_once view_path("./auth/login");
