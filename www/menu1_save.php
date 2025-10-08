<?php
// Ontvang keuzes uit POST
if(isset($_POST['keuze'])) {
    $keuzes = $_POST['keuze'];
    // Sla op in JSON-bestand
    file_put_contents(__DIR__ . '/menu1_keuzes.json', json_encode($keuzes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
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
    <title>Keuze Menu 1 - Opslag</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        body { background: #222; color: #0ac20a; font-family: monospace; }
        h1, h2 { color: #0ac20a; }
        table { border-collapse: collapse; background: #222; color: #eee; margin-top: 16px; }
        th, td { border: 1px solid #666; padding: 7px 5px; }
        th { background: #0ac20a; color: #000; }
        tr td:first-child { background: #222; color: #0ac20a; }
    </style>
</head>
<body>
    <h1>Menu 1 keuzes opgeslagen</h1>
    <?php if($success): ?>
        <p>De keuzes zijn opgeslagen!</p>
        <table>
            <tr>
                <th>Naam:</th>
                <?php if (count($keuzes) > 0): ?>
                    <?php foreach (array_keys(reset($keuzes)) as $optie): ?>
                        <th><?= htmlspecialchars($optie) ?></th>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tr>
            <?php foreach($keuzes as $persoon => $opties): ?>
                <tr>
                    <td><?= htmlspecialchars($persoon) ?></td>
                    <?php foreach($opties as $optie => $aangevinkt): ?>
                        <td><?= $aangevinkt ? "✔️" : "" ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Geen keuzes ontvangen.</p>
    <?php endif; ?>
</body>
</html>
