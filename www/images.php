<?php
// Pad naar de map met afbeeldingen
$imageDir = __DIR__ . '/images';

// Haal alle afbeeldingsbestanden op (jpg, png, gif, svg)
$images = glob($imageDir . '/*.{jpg,jpeg,png,gif,svg}', GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8" />
<title>Images</title>
<link rel="icon" type="image/png" href="favicon.png">
<link rel="stylesheet" href="style.css" />
</head>
<body>

<!-- Navigatieknoppen -->
<a href="index.php" class="navButton">Home</a>

<h1>Galerie</h1>
<div class="gallery">
  <?php foreach ($images as $imagePath): 
    $imageFullName = basename($imagePath);
    $imageName = pathinfo($imageFullName, PATHINFO_FILENAME); // Naam zonder extensie
    $imageUrl = 'images/' . $imageFullName;
  ?>
    <div class="imgContainer" tabindex="0" aria-label="<?= htmlspecialchars($imageName) ?>">
      <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($imageFullName) ?>" loading="lazy" />
      <span class="imgName"><?= htmlspecialchars($imageName) ?></span>
    </div>
  <?php endforeach; ?>
</div>

<footer id="footer">
  <span>Andreas-2025 &#8482; - On docker01</span>
</footer>

</body>
</html>
