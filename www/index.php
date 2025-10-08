<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Home</title>
<link rel="icon" type="image/png" href="images/favicon.png">
<link rel="stylesheet" href="style.css" />
<style>
  /* Canvas als achtergrond fixed */
  #matrix {
    position: fixed;
    top: 0;
    left: 0;
    pointer-events: none;
    width: 100vw;
    height: 100vh;
    z-index: 1;
    display: block;
  }

  /* Navigatieknoppen container */
  #navButtons {
    position: fixed;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
    background: rgba(0,0,0,0.6);
    padding: 5px 10px;
    border-radius: 12px;
    z-index: 20;
    max-width: 90vw;
    box-sizing: border-box;
  }
  .navButton {
    position: static !important;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 16px;
    background-color: #012456;
    color: white;
    font-weight: bold;
    font-family: monospace;
    border-radius: 4px;
    text-decoration: none;
    cursor: pointer;
    user-select: none;
    white-space: nowrap;
    transition: background-color 0.3s ease;
  }
  .navButton:hover {
    background-color: #0341a0;
  }
  @media (max-width: 600px) {
    #navButtons {
      max-width: 100vw;
    }
    .navButton {
      padding: 8px 12px;
      font-size: 0.9em;
    }
  }

  /* Scrollende klok */
  #scrollingClock {
    position: fixed;
    top: 50%;
    left: 100%;
    font-size: 50px;
    font-weight: bold;
    color: rgba(242, 243, 238, 1);
    font-family: monospace;
    user-select: none;
    pointer-events: none;
    transform: translateY(-50%);
    animation-name: scrollLeft;
    animation-duration: 8s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    z-index: 5;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 10px 30px;
    display: flex;
    flex-direction: column;
    align-items: center;
    white-space: nowrap;
    line-height: 1.2;
  }
  #scrollingClock .date,
  #scrollingClock .time {
    display: block;
  }
  @keyframes scrollLeft {
    0% { left: 100%; }
    100% { left: -100%; }
  }

  /* Footer styling */
  #footer {
    position: fixed;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
    display: flex;
    align-items: center;
    gap: 10px;
    color: rgba(255, 255, 255, 1);
    font-family: monospace;
    font-size: 16px;
  }
</style>
</head>
<body>
<canvas id="matrix"></canvas>

<!-- Navigatieknoppen -->
<div id="navButtons">
  <a href="menu.php" class="navButton">Menu</a>
  <a href="info.php" class="navButton">Info</a>
  <a href="images.php" class="navButton">Images</a>
  <a href="visitor_info.php" class="navButton">Visitor Info</a>
  </div>

<!-- Scrollende klok met aparte datum en tijd -->
<div id="scrollingClock">
  <span class="date">00-00-0000</span>
  <span class="time">00:00:00</span>
</div>

<script>
const canvas = document.getElementById('matrix');
const ctx = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*()[]{}'.split('');
const fontSize = 16;
const columns = Math.floor(canvas.width / fontSize);

const drops = new Array(columns).fill(1);

function draw() {
  ctx.fillStyle = 'rgba(0, 0, 0, 0.05)';
  ctx.fillRect(0, 0, canvas.width, canvas.height);

  ctx.fillStyle = 'rgba(30, 8, 119, 1)';
  ctx.font = fontSize + 'px monospace';

  for(let i = 0; i < drops.length; i++) {
    const text = characters[Math.floor(Math.random() * characters.length)];
    ctx.fillText(text, i * fontSize, drops[i] * fontSize);

    if(drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
      drops[i] = 0;
    }
    drops[i]++;
  }
}

setInterval(draw, 50);

window.addEventListener('resize', () => {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
});

// Real-time klok en datum update
function updateClock() {
  const now = new Date();
  const day = now.getDate().toString().padStart(2, '0');
  const month = (now.getMonth()+1).toString().padStart(2, '0');
  const year = now.getFullYear();

  const hours = now.getHours().toString().padStart(2, '0');
  const minutes = now.getMinutes().toString().padStart(2, '0');
  const seconds = now.getSeconds().toString().padStart(2, '0');

  document.querySelector('#scrollingClock .date').textContent = `${day}-${month}-${year}`;
  document.querySelector('#scrollingClock .time').textContent = `${hours}:${minutes}:${seconds}`;
}

updateClock();
setInterval(updateClock, 1000);
</script>

<footer id="footer">
  <a href="https://www.linkedin.com/in/andreas-van-waveren-02264860/" target="_blank" title="LinkedIn">
    <img src="images/linkedin-icon.svg" alt="LinkedIn" id="linkedinIcon" />
  </a>
  <span id="footerText">Andreas-2025 &#8482; - On docker01</span>
</footer>
</body>
</html>
