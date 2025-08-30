<?php
session_start();
session_unset();
session_destroy();

// Redirigir a login.php al cerrar la sesión
header("Location: /login.php");
exit();
