<?php
if(isset($_POST['keuze'])) {
    $keuzes = $_POST['keuze'];
    file_put_contents(__DIR__ . '/menu2_keuzes.json', json_encode($keuzes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
} else {
    $jsonfile = __DIR__ . '/menu2_keuzes.json';
    if (file_exists($jsonfile)) {
        $keuzes = json_decode(file_get_contents($jsonfile), true);
        if (!is_array($keuzes)) $keuzes = [];
    } else {
        $keuzes = [];
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8" />
<title>Menu 2 keuzes bewaard</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<h2 class="menuTitle">Keuzes Menu 2</h2>
<div class="responsive-wrap">
<?php if($keuzes): ?>
    <table class="menuTable">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Voorgerecht</th>
                <th>Hoofdgerecht</th>
                <th>Nagerecht</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($keuzes as $persoon => $perGang): ?>
            <tr>
                <td><?= htmlspecialchars($persoon) ?></td>
                <td><?= isset($perGang['Voorgerecht']) ? htmlspecialchars($perGang['Voorgerecht']) : '' ?></td>
                <td><?= isset($perGang['Hoofdgerecht']) ? htmlspecialchars($perGang['Hoofdgerecht']) : '' ?></td>
                <td><?= isset($perGang['Nagerecht']) ? htmlspecialchars($perGang['Nagerecht']) : '' ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p style="color:#fff; max-width:700px;">Keuzes zijn opgeslagen!</p>
<?php else: ?>
    <p style="color:#fff; max-width:700px;">Geen keuzes ontvangen.</p>
<?php endif; ?>
</div>
</body>
</html>
