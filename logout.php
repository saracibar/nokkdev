<?php
require_once 'app/init.php';
Session::delete('s_session_wp');
Session::delete('s_name_wp');
Session::delete('s_avatar_wp');
//Session::delete('propid');
//session_destroy();
Auth::logout();

redirect_to(App::url());
/*
print_r($_SESSION);
//echo $_SESSION["s_name_wp"];
*/