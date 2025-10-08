<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

use RobThree\Auth\TwoFactorAuth;

$config = include '/usr/local/config/auth.php';

$error = '';
$showMfa = false;

$tfa = new TwoFactorAuth('JouwSiteNaam');

if (!isset($_SESSION['mfa_passed'])) {
    // Eerste stap: controleren gebruikersnaam en wachtwoord
    if (isset($_POST['username'], $_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        if ($user === $config['username'] && password_verify($pass, $config['password_hash'])) {
            // Sla gebruikersnaam tijdelijk op in sessie voor MFA stap
            $_SESSION['tmp_user'] = $user;
            $showMfa = true; // Toon MFA invoerformulier
        } else {
            $error = "Onjuiste gebruikersnaam of wachtwoord.";
        }
    }
} else {
    // Tweede stap: MFA code check
    if (isset($_POST['mfa_code']) && isset($_SESSION['tmp_user'])) {
        $mfaCode = $_POST['mfa_code'];
        $secret = $config['mfa_secret'];
        if ($tfa->verifyCode($secret, $mfaCode)) {
            $_SESSION['user'] = $_SESSION['tmp_user'];
            unset($_SESSION['tmp_user']);
            $_SESSION['mfa_passed'] = true;
            header('Location: visitor_info.php');
            exit;
        } else {
            $showMfa = true;
            $error = "Onjuiste MFA-code.";
        }
    } else {
        // Toont MFA invoerformulier als direct naar mfa stap gegaan
        $showMfa = true;
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8" />
<title>Login</title>
<style>
/* ...zelfde CSS als je had... */
</style>
</head>
<body>
<form class="login-box" method="POST" action="">
<h2>Login</h2>
<?php if($error): ?>
<div class="error-message"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<?php if (!$showMfa): ?>
<label for="username">Gebruikersnaam</label>
<input type="text" id="username" name="username" required autofocus />
<label for="password">Wachtwoord</label>
<input type="password" id="password" name="password" required />
<input type="submit" value="Volgende" />
<?php else: ?>
<p>Voer uw MFA-code in uit de Authenticator-app.</p>
<label for="mfa_code">MFA-code</label>
<input type="text" id="mfa_code" name="mfa_code" required autofocus />
<input type="submit" value="Inloggen" />
<?php endif; ?>
</form>
</body>
</html>
