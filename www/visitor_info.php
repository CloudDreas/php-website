<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<?php
function getUserIP() {
    if (!empty($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        return trim($ips[0]);
    }
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
    return $_SERVER['REMOTE_ADDR'] ?? 'unknown';
}

// Basis info
$ip = getUserIP();
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
$referrer = $_SERVER['HTTP_REFERER'] ?? 'none';
$acceptLang = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'unknown';
$serverTime = date('d-m-Y H:i:s');
$sessionId = session_id() ?: 'no session';

// Optioneel: gebruik IP-geolocatie API (gratis zoals ipinfo.io of ip-api.com) - hier voorbeeld zonder API call

?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8" />
<title>Bezoekersinformatie</title>
<style>
body { background:#181818; color:#fff; font-family: monospace, sans-serif; max-width: 600px; margin: 30px auto; }
h1 { color: #012456; }
table { width: 100%; border-collapse: collapse; }
td, th { padding: 8px 12px; border: 1px solid #012456; }
th { background: #012456; }
</style>
</head>
<body>
<h1>Bezoekersinformatie</h1>
<table>
    <tr><th>Item</th><th>Waarde</th></tr>
    <tr><td>IP-adres</td><td><?=htmlspecialchars($ip)?></td></tr>
    <tr><td>User Agent (browser)</td><td><?=htmlspecialchars($userAgent)?></td></tr>
    <tr><td>Referrer URL</td><td><?=htmlspecialchars($referrer)?></td></tr>
    <tr><td>Taal voorkeur browser</td><td><?=htmlspecialchars($acceptLang)?></td></tr>
    <tr><td>Server datum / tijd</td><td><?=htmlspecialchars($serverTime)?></td></tr>
    <tr><td>Session ID</td><td><?=htmlspecialchars($sessionId)?></td></tr>
</table>
</body>
</html>
