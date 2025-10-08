<?php
$statsFile = __DIR__ . '/stats.json';
if(file_exists($statsFile)) {
  $stats = json_decode(file_get_contents($statsFile), true);
} else {
  $stats = ['totalVisits' => 0, 'visitsByDate' => []];
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8" />
<title>Bezoekersstatistieken</title>
<style>
  body { font-family: monospace; background: black; color: #0ac20a; padding: 20px; }
  table { border-collapse: collapse; width: 100%; margin-top: 20px; }
  th, td { border: 1px solid #0ac20a; padding: 8px; text-align: left; }
  th { background: #022; }
</style>
</head>
<body>

<h1>Bezoekersstatistieken</h1>

<p>Totaal aantal bezoeken: <?= htmlspecialchars($stats['totalVisits']) ?></p>

<h2>Bezoeken per datum</h2>
<table>
  <tr><th>Datum</th><th>Aantal bezoeken</th></tr>
  <?php foreach($stats['visitsByDate'] as $date => $count): ?>
    <tr>
      <td><?= htmlspecialchars($date) ?></td>
      <td><?= htmlspecialchars($count) ?></td>
    </tr>
  <?php endforeach; ?>
</table>

</body>
</html>
