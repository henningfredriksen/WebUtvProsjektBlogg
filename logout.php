<?php

session_start();
session_destroy(); // destroys current session
header("Location:index.php"); // redirects back to index.php

?>