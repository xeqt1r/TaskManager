<?php
include 'common.php';
$homeHandler = new \TManagment\Http\HomeHttpHandler($template,$dataBinder);
$homeHandler->logout();