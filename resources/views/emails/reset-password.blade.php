<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Restablecer contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: #111827;
        }
        .wrapper {
            width: 100%;
            padding: 24px 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.15);
        }
        .header {
            background: linear-gradient(135deg, #92400e, #f59e0b);
            padding: 24px;
            text-align: center;
            color: #f9fafb;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
            letter-spacing: 0.03em;
        }
        .header span {
            display: block;
            margin-top: 4px;
            font-size: 13px;
            opacity: 0.9;
        }
        .content {
            padding: 24px 28px 32px;
        }
        .content h2 {
            margin: 0 0 12px;
            font-size: 20px;
        }
        .content p {
            margin: 0 0 12px;
            line-height: 1.6;
            font-size: 14px;
            color: #4b5563;
        }
        .button-wrapper {
            margin: 24px 0 16px;
            text-align: center;
        }
        .btn-primary {
            display: inline-block;
            padding: 12px 24px;
            background-color: #d97706;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 14px;
        }
        .btn-primary:hover {
            background-color: #b45309;
        }
        .small {
            font-size: 12px;
            color: #9ca3af;
        }
        .footer {
            text-align: center;
            padding: 16px;
            font-size: 11px;
            color: #9ca3af;
        }
        .warning {
            background: #fff7ed;
            border: 1px solid #fed7aa;
            padding: 12px 14px;
            border-radius: 10px;
            margin: 16px 0;
            color: #9a3412;
            font-size: 13px;
            line-height: 1.5;
        }
        @media (max-width: 640px) {
            .container { margin: 0 12px; }
            .content { padding: 20px 18px 24px; }
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="header">
            <h1>Muebles Ligno</h1>
            <span>Restablecimiento de contraseña</span>
        </div>

        <div class="content">
            <h2>Hola {{ $user->Usuario ?? 'usuario' }},</h2>

            <p>
                Se recibió una solicitud para restablecer la contraseña de tu cuenta en
                <strong>Muebles Ligno</strong>.
            </p>

            <p>
                Haz clic en el siguiente botón para crear una nueva contraseña.
            </p>

            <div class="button-wrapper">
                <a href="{{ $url }}" class="btn-primary" target="_blank">
                    Restablecer contraseña
                </a>
            </div>

            <div class="warning">
                Si tú no solicitaste este cambio, puedes ignorar este mensaje.
                Tu contraseña actual seguirá siendo la misma.
            </div>

            <p class="small">
                Si el botón no funciona, copia y pega este enlace en tu navegador:
                <br>
                <span style="word-break: break-all;">{{ $url }}</span>
            </p>

            <p class="small">
                Por tu seguridad, este enlace expirará después de un tiempo.
            </p>
        </div>
    </div>

    <div class="footer">
        © {{ date('Y') }} Muebles Ligno. Todos los derechos reservados.
    </div>
</div>
</body>
</html>
