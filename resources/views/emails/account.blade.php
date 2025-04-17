<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo à Plataforma Culinária!</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }

        .header {
            background-color: #ff7043;
            padding: 20px;
            color: white;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 30px;
            color: #333;
        }

        .content h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .content p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .credentials {
            background-color: #fbe9e7;
            padding: 15px;
            border-left: 4px solid #ff5722;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .credentials p {
            margin: 5px 0;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #ff7043;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            font-size: 13px;
            color: #aaa;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>🍳 Bem-vindo à nossa Plataforma de Culinária!</h1>
        </div>
        <div class="content">
            <h2>Olá, {{ $name }}!</h2>
            <p>Você foi registrado como <strong>{{ $role }}</strong> na nossa plataforma de cursos de culinária online.</p>

            <div class="credentials">
                <p>📧 E-mail: {{ $email }}</p>
                <p>🔑 Palavra-passe: {{ $password }}</p>
            </div>

            <p>Você já pode acessar o painel de instrutor e começar a criar seus cursos deliciosos! 😋</p>

            <p>
                <a href="{{ route('login') }}" class="btn">Acessar a plataforma</a>
            </p>
        </div>

        <div class="footer">
            Este é um e-mail automático. Por favor, não responda.
            <br>
            &copy; {{ date('Y') }} Plataforma Culinária.
        </div>
    </div>
</body>
</html>