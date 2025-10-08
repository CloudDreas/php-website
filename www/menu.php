<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Home</title>
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
    /* Verwijder fixed van container-row, maak het scrollbaar met margin */
    .container-row {
      position: relative; /* verandering hier: niet fixed */
      margin: 120px auto 80px auto; /* ruimte boven en onder */
      max-width: 1200px;
      display: flex;
      justify-content: center;
      gap: 30px;
      padding: 10px;
      flex-wrap: wrap; /* zodat menu's bij kleinere schermen onder elkaar komen */
      z-index: 2;
    }
    .menu-container {
      background: rgba(255,255,255,0.87);
      border-radius: 12px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.12);
      padding: 28px 24px 18px 24px;
      width: 330px;
      min-width: 230px;
      min-height: 480px;
      display: flex;
      flex-direction: column;
      backdrop-filter: blur(1px);
      flex-shrink: 0;
    }
    .menu-container h2 {
      margin-top: 0;
      color: #a03919;
      font-size: 1.25em;
      border-bottom: 1px solid #eee;
      padding-bottom: 7px;
      margin-bottom: 16px;
    }
    .section-title {
      margin: 18px 0 5px 0;
      font-weight: bold;
      color: #444;
      font-size: 1.08em;
    }
    ul {
      padding-left: 1em;
      margin-top: 0;
      margin-bottom: 16px;
    }
    li {
      margin-bottom: 7px;
    }
    .price {
      color: #b22222;
      font-weight: bold;
      font-size: 1.08em;
    }
    /* Responsive */
    @media (max-width: 1100px) {
      .container-row {
        flex-direction: column;
        align-items: center;
        margin-top: 60px;
        margin-bottom: 40px;
      }
      .menu-container {
        width: 90vw;
        margin-bottom: 30px;
      }
    }
    #imagesButton, #scrollingText {
      position: relative;
      z-index: 3;
      display: block;
      width: fit-content;
      margin: 30px auto 0 auto;
    }
    footer {
      position: relative;
      z-index: 3;
      margin-top: 40px;
      text-align: center;
    }
    /* Zorg dat body en html inhoud scrollen */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
      overflow-y: auto;
      font-family: Arial, sans-serif;
      background: transparent;
    }
  </style>
</head>
<body>
  <canvas id="matrix"></canvas>
  <a href="index.html" id="imagesButton">Home</a>

  <div class="container-row">
    <div class="menu-container">
      <h2>Menu 1 <span class="price">€36,50</span></h2>
      <div class="section-title">Voorgerechten</div>
      <ul>
        <li>Tomatensoep, room, basilicum, gehaktballetjes</li>
        <li>Soep van de dag</li>
      </ul>
      <div class="section-title">Hoofdgerechten</div>
      <ul>
        <li>Runder biefstuk grain fed, seizoen groentes, rode wijnsaus</li>
        <li>Varkenshaas, seizoen groentes, champignonsaus</li>
        <li>Dagvangst vis, seizoengroentes, kruidensaus</li>
      </ul>
      <div class="section-title">Desserts</div>
      <ul>
        <li>Moulleux van chocolade met vanille-ijs</li>
        <li>3 soorten ijs van hoeve de ruitenbeek</li>
      </ul>
    </div>
    <div class="menu-container">
      <h2>Menu 2 <span class="price">€40,50</span></h2>
      <div class="section-title">Voorgerechten</div>
      <ul>
        <li>Carpaccio, truffelmayonaise, rucola, pijnboompitten, oude kaas</li>
        <li>Vitello tonnato, kappertjes, rucola, tonijnmayonaise</li>
        <li>Tartaar van rode biet, geitenkaas, cress, vijgensiroop</li>
      </ul>
      <div class="section-title">Hoofdgerechten</div>
      <ul>
        <li>Runder biefstuk grain fed, seizoen groentes, rode wijnsaus</li>
        <li>Maïskip suprême, seizoen groentes, pepersaus</li>
        <li>Lasagne van groentes, paddestoelen, ras el hanoutsaus</li>
        <li>Dagvangst vis, seizoengroentes, kruidensaus</li>
      </ul>
      <div class="section-title">Desserts</div>
      <ul>
        <li>Moulleux van chocolade met vanille-ijs</li>
        <li>3 soorten ijs van hoeve de ruitenbeek</li>
      </ul>
    </div>
    <div class="menu-container">
      <h2>Menu 3 <span class="price">€44,50</span></h2>
      <div class="section-title">Voorgerechten</div>
      <ul>
        <li>Carpaccio, truffelmayonaise, rucola, pijnboompitten, oude kaas</li>
        <li>Burratta, tomaat, vijgensiroop, pittenmix, basilicum</li>
        <li>Gerookte zalm, crème fraîche, venkel</li>
      </ul>
      <div class="section-title">Tussengerecht</div>
      <ul>
        <li>Bospaddestoelenbouillon met kaneelroom</li>
      </ul>
      <div class="section-title">Hoofdgerechten</div>
      <ul>
        <li>Runder biefstuk grain fed, seizoen groentes, rode wijnsaus</li>
        <li>Gevulde varkenshaas, tomaten tapenade, rode wijnsaus</li>
        <li>Lasagne van groentes, paddenstoelen, ras el hanoutsaus</li>
        <li>Dagvangst vis, seizoengroentes, kruidensaus</li>
      </ul>
      <div class="section-title">Desserts</div>
      <ul>
        <li>Proeverij van desserts</li>
        <li>3 soorten ijs van hoeve de ruitenbeek</li>
      </ul>
      <p>
        <em>Tournedos is tegen meerprijs te bestellen.<br>
        Hoofdgerechten worden geserveerd met friet &amp; salade.</em>
      </p>
    </div>
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
      ctx.fillStyle = 'rgba(9, 255, 0, 1)';
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
  </script>

  <footer id="footer">
    <span id="footerText">by Andreas &amp; Gonnie &#169;</span>
  </footer>
</body>
</html>
