<?php
$title = "Meu Projeto PHP";
$message = "PHP está funcionando com Apache!";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: white;
            border-radius: 16px;
            padding: 48px 56px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            max-width: 520px;
            width: 90%;
        }

        .logo {
            font-size: 72px;
            margin-bottom: 16px;
        }

        h1 {
            color: #4a4a8a;
            font-size: 28px;
            margin-bottom: 12px;
        }

        .badge {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 24px;
        }

        .message {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 28px;
        }

        .info-box {
            background: #f5f5ff;
            border-left: 4px solid #667eea;
            border-radius: 8px;
            padding: 16px 20px;
            text-align: left;
        }

        .info-box p {
            font-size: 14px;
            color: #444;
            margin-bottom: 6px;
        }

        .info-box p:last-child {
            margin-bottom: 0;
        }

        .info-box strong {
            color: #4a4a8a;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">🐘</div>
        <h1><?php echo $title; ?></h1>
        <span class="badge">PHP <?php echo phpversion(); ?></span>
        <p class="message"><?php echo $message; ?></p>
        <div class="info-box">
            <p><strong>Servidor:</strong> <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Apache'; ?></p>
            <p><strong>Versão PHP:</strong> <?php echo PHP_VERSION; ?></p>
            <p><strong>Sistema:</strong> <?php echo PHP_OS; ?></p>
            <p><strong>Data/Hora:</strong> <?php echo date('d/m/Y H:i:s'); ?></p>
        </div>
    </div>
</body>
</html>
