<?php
if (isset($_POST['keuze'])) {
    $keuzes = $_POST['keuze'];
    file_put_contents(__DIR__ . '/menu_keuzes.json', json_encode($keuzes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    $success = true;
} else {
    $keuzes = [];
    $success = false;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Menu keuzes opgeslagen</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <h2 class="menuTitle">Menu keuzes opgeslagen</h2>
    <div class="responsive-wrap">
    <?php if ($success): ?>
        <p style="color:#fff;">Keuzes zijn opgeslagen!</p>
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
            <?php foreach ($keuzes as $persoon => $perGang): ?>
                <tr>
                    <td><?= htmlspecialchars($persoon) ?></td>
                    <td><?= isset($perGang['Voorgerecht']) ? htmlspecialchars($perGang['Voorgerecht']) : '' ?></td>
                    <td><?= isset($perGang['Hoofdgerecht']) ? htmlspecialchars($perGang['Hoofdgerecht']) : '' ?></td>
                    <td><?= isset($perGang['Nagerecht']) ? htmlspecialchars($perGang['Nagerecht']) : '' ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="color:#fff;">Geen keuzes ontvangen.</p>
    <?php endif; ?>
    </div>
</body>
</html>
