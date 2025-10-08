<?php
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return trim(current(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])));
    }
    return $_SERVER['REMOTE_ADDR'] ?? 'unknown';
}

session_start();

$keuzePath = __DIR__ . '/menu_keuzes.json';

// Lees bestaande data
$huidigeData = [];
if (file_exists($keuzePath)) {
    $huidigeData = json_decode(file_get_contents($keuzePath), true);
    if (!is_array($huidigeData)) $huidigeData = [];
}

if (isset($_POST['keuze'])) {
    $keuzes = $_POST['keuze'];

    // IP van huidige sessie ophalen
    $ip = getUserIP();

    foreach ($keuzes as $persoon => $perGang) {
        $huidigeData[$persoon]['keuzes'] = $perGang;
        $huidigeData[$persoon]['ip'] = $ip; // IP IP-adres bij elke save opslaan
        $huidigeData[$persoon]['timestamp'] = date('c'); // timestamp van opslaan
    }

    file_put_contents($keuzePath, json_encode($huidigeData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    $success = true;
} else {
    $success = false;
}

?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8" />
<title>Menu keuzes opgeslagen</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<h2 class="menuTitle">Menu keuzes opgeslagen</h2>

<?php if ($success): ?>
    <p style="color:#fff;">Keuzes zijn succesvol opgeslagen!</p>
<?php else: ?>
    <p style="color:#f00;">Fout bij opslaan keuzes.</p>
<?php endif; ?>

<div class="responsive-wrap">
<table class="menuTable">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Voorgerecht</th>
            <th>Hoofdgerecht</th>
            <th>Nagerecht</th>
            <th>IP-adres</th>
            <th>Laatste wijziging</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($huidigeData as $persoon => $data): ?>
            <tr>
                <td><?= htmlspecialchars($persoon) ?></td>
                <td><?= htmlspecialchars($data['keuzes']['Voorgerecht'] ?? '') ?></td>
                <td><?= htmlspecialchars($data['keuzes']['Hoofdgerecht'] ?? '') ?></td>
                <td><?= htmlspecialchars($data['keuzes']['Nagerecht'] ?? '') ?></td>
                <td><?= htmlspecialchars($data['ip'] ?? '') ?></td>
                <td><?= htmlspecialchars($data['timestamp'] ?? '') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</body>
</html>
