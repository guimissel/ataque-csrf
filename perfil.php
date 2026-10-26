<?php

session_set_cookie_params([
    "lifetime" => 86400,
    "path" => "/",
    "secure" => false,
    "httponly" => true,
    "samesite" => "Strict"
]);

session_start();

$_SESSION["id_usuario"] = 1;
$_SESSION["email"] = $_SESSION["email"] ?? "teste@email.com";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["id_usuario"])) {
    $novoEmail = filter_var($_POST["novo-email"], FILTER_VALIDATE_EMAIL);

    if (!$novoEmail) exit;

    $_SESSION["email"] = $novoEmail;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <h1><?= $_SESSION["email"] ?></h1>
</body>
</html>