<?php
$personen = [
    "Gonnie", "Arnoud", "Sander", "jeanise", "Vincent", "Sharon",
    "Jasper", "David", "Sarah", "Andreas", "Martin",
    "Arnouska", "Marco", "Esther", "Marja", "Henk"
];
$menu = [
    "Voorgerecht" => [
        "Carpaccio - Truffel mayonaise",
        "Vitello tonnato",
        "Rode biet en geitenkaas"
    ],
    "Hoofdgerecht" => [
        "Biefstuk - Rodewijnsaus",
        "Maiskip Peper saus",
        "Lasagne - groentes - paddestoelen",
        "Dagvangst vis"
    ],
    "Nagerecht" => [
        "Moulleux van chocolade",
        "3 soorten ijs van hoeve Ruijtenbeek"
    ]
];
$keuzePath = __DIR__ . "/menu_keuzes.json";
if(file_exists($keuzePath)) {
    $invullingen = json_decode(file_get_contents($keuzePath), true);
} else {
    $invullingen = [];
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<title>Menu invullen – Restaurant de Dennen</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="style.css" />
<style>
body { background:#181818; color:#1b6aff; font-family:sans-serif; }
h2 { font-size:1.2em; }
.responsive-wrap { width:100%; overflow-x:auto; }
table, th, td {
    border-collapse: collapse;
    border: 1px solid #1b6aff;
    padding: 6px 4px;
}
table {
    background: #232323;
    min-width: 500px;
    margin-bottom:15px;
    width:100%;
}
th { background: #1b6aff; color: #181818; font-size:1em; }
tr td:first-child { background: #181818; color: #1b6aff; font-weight: bold; min-width:90px;}
select { width:97%; font-size:1em; border-radius:5px; border: 1px solid #1b6aff;}
button { margin:10px 0; padding:9px 18px; background:#1b6aff; color:#181818; border:none; border-radius:8px; font-weight:bold; font-size:1.1em; cursor:pointer;}
button:hover { background:#1240a9; color:#fff;}
@media (max-width:700px) {
    th, td { font-size:0.96em; }
    select { font-size:0.93em;}
}
</style>
</head>
<body>
<h2>Vul hieronder het menu in</h2>
<div class="responsive-wrap">
<form method="POST" action="menu_save.php">
<table>
    <tr>
        <th>Naam</th>
        <?php foreach($menu as $gang => $opties): ?>
            <th><?= htmlspecialchars($gang) ?><br><span style="font-size:0.85em">kies één</span></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach($personen as $persoon): ?>
    <tr>
        <td><?= htmlspecialchars($persoon) ?></td>
        <?php foreach($menu as $gang => $opties): ?>
        <td>
            <select name="keuze[<?= htmlspecialchars($persoon) ?>][<?= htmlspecialchars($gang) ?>]">
                <option value="">-- kies --</option>
                <?php foreach($opties as $optie): ?>
                <option value="<?= htmlspecialchars($optie) ?>"
                  <?= (isset($invullingen[$persoon][$gang]) && $invullingen[$persoon][$gang]==$optie ? 'selected' : '') ?>>
                  <?= htmlspecialchars($optie) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </td>
        <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
</table>
<p style="color:#bbb; font-size:0.97em;">Vul alleen jouw eigen rij in. Alles is direct zichtbaar en later aan te passen.<br>Sleep de tabel horizontaal als deze niet volledig past op je scherm.</p>
<button type="submit">Opslaan/wijzigen</button>
</form>
</div>
</body>
</html>
