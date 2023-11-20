<?php

// if there is no token inside session go back to index and force logging in to see this site

if (!isset($_SESSION['token'])) {
    header('Location: ../../index.php');
}

?>

Hej