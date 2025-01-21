<?php

// Funzione per ottenere le informazioni di rete
function getNetworkInfo() {
    $ipAddress = $_SERVER['REMOTE_ADDR'];  // Indirizzo IP del client

    // Ottenere l'indirizzo IP del server
    $serverIp = gethostbyname('localhost');

    // Ottenere informazioni sull'interfaccia di rete tramite ifconfig (per sistemi Linux)
    $networkDetails = shell_exec('ifconfig');

    // Variabili per le informazioni Wi-Fi
    $connectionType = 'LAN';
    $ssid = '';
    $bssid = '';
    $signalStrength = '';
    $frequency = '';
    $channel = '';

    // Verifica se il sistema ha una connessione Wi-Fi (verifica se l'interfaccia wlan0 è presente)
    $wifiInfo = shell_exec('iwconfig 2>&1');

    if (strpos($wifiInfo, 'no wireless extensions') === false) {
        $connectionType = 'Wi-Fi';
        $ssid = trim(shell_exec('iwgetid -r'));  // Ottieni SSID della rete Wi-Fi
        $bssid = trim(shell_exec('iw dev wlan0 link | grep "SSID" -A 5 | grep "BSSID" | cut -d" " -f2'));  // Ottieni BSSID
        $signalStrength = trim(shell_exec('iw dev wlan0 link | grep "signal" | cut -d" " -f2'));  // Forza del segnale
        $frequency = trim(shell_exec('iw dev wlan0 info | grep "freq" | cut -d" " -f2'));  // Frequenza
        $channel = trim(shell_exec('iw dev wlan0 info | grep "channel" | cut -d" " -f2'));  // Canale
    }

    $hostName = gethostname();
    $localIp = shell_exec("hostname -I | awk '{print $1}'");

    return [
        'IP_address' => $ipAddress,
        'Server_ip' => $serverIp,
        'Host_name' => $hostName,
        'Connection_type' => $connectionType,
        'SSID' => $ssid,
        'BSSID' => $bssid,
        'Signal_strength' => $signalStrength . ' dBm',
        'Frequency' => $frequency . ' MHz',
        'Channel' => $channel,
        'Local_IP' => $localIp,
        'Network_details' => $networkDetails
    ];
}

?>
