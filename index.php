<?php
require_once 'common.php';
$homehandler = new \TManagment\Http\HomeHttpHandler($template,$dataBinder);
$homehandler->index();