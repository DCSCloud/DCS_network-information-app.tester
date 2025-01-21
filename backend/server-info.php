<?php

// server-info.php
function getServerInfo() {
    return [
        'PHP_version' => phpversion(),
        'Operating_system' => php_uname(),
        'Server_name' => $_SERVER['SERVER_NAME'] ?? 'N/A',
        'Server_ip' => $_SERVER['SERVER_ADDR'] ?? 'N/A',
        'Document_root' => $_SERVER['DOCUMENT_ROOT'] ?? 'N/A',
        'Request_method' => $_SERVER['REQUEST_METHOD'] ?? 'N/A',
    ];
}

?>
