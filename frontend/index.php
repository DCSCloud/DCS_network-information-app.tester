<?php
include '../backend/server-info.php';  // Includi il file con la funzione getServerInfo

$serverInfo = getServerInfo();

$networkInfo = [
    'IP_address' => $_SERVER['REMOTE_ADDR'] ?? 'N/A',
    'Host_name' => gethostname(),
    'Connection_type' => 'LAN', // Per esempio, puoi verificare tramite PHP se la connessione è LAN
    'Local_IP' => getHostByName(gethostname()),
    'Network_details' => shell_exec("ifconfig") // Usa `ifconfig` per ottenere dettagli della rete (funziona su sistemi Unix/Linux)
];
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informazioni Sistema e Rete</title>
    <!-- Includi il file CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* style.css */

/* Reset base styles */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Corpo della pagina */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #ffffff;
    color: #333;
    padding: 20px;
}

/* Titolo principale */
h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
    font-size: 2.5em;
}

/* Paragrafo descrittivo */
p {
    font-size: 1.2em;
    margin-bottom: 20px;
    text-align: center;
    color: #555;
}

/* Titoli delle sezioni */
h2 {
    font-size: 1.8em;
    color: #444;
    margin-top: 30px;
    margin-bottom: 15px;
}

/* Blocco di codice */
pre {
    background-color: #2e2e2e;
    color: #f5f5f5;
    padding: 20px;
    border-radius: 8px;
    font-family: Consolas, "Courier New", monospace;
    overflow-x: auto;
    white-space: pre-wrap;
    word-wrap: break-word;
}

/* Margini tra le sezioni */
section {
    margin-bottom: 30px;
}

/* Contenitore per l'intera pagina */
.container {
    max-width: 1000px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Design responsive per dispositivi mobili */
@media screen and (max-width: 768px) {
    body {
        padding: 10px;
    }

    h1 {
        font-size: 2em;
    }

    h2 {
        font-size: 1.5em;
    }

    p {
        font-size: 1em;
    }

    pre {
        padding: 15px;
    }
}
</style>
</head>
<body>
    <div class="container">
        <h1>Informazioni Sistema e Rete</h1>
        <p>Informazioni generali di sistema / rete</p>

        <h2>Informazioni del Server</h2>
        <pre>
            <?php echo json_encode($serverInfo, JSON_PRETTY_PRINT); ?>
        </pre>

        <h2>Informazioni sulla Rete</h2>
        <pre>
            <?php echo json_encode($networkInfo, JSON_PRETTY_PRINT); ?>
        </pre>
    </div>
</body>
</html>
