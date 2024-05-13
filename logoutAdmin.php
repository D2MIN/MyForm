<?php
session_start();
session_destroy();
header('WWW-Authenticate: Basic realm="realmName"');
header('HTTP/1.0 401 Unauthorized');
?>