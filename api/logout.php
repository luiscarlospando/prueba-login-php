<?php
session_start();
session_unset();
session_destroy();

// Redirigir a index.php al cerrar la sesión
header("Location: /index.php");
exit();
