<?php
session_start();
session_unset();     // Limpia las variables
session_destroy();   // Destruye la sesión

header("Location: registro.php");
exit;
