<?php

require_once 'connect.php';
require_once 'utilities.php';

session_destroy();

header('Location: login.php');
die;

?>