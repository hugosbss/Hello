<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Hello</title>
</head>
<body style="margin:0;padding:0;background:#020617;font-family:Arial,Helvetica,sans-serif;color:#e2e8f0;">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#020617;padding:30px 12px;">
    <tr>
        <td align="center">
            <table role="presentation" width="620" cellspacing="0" cellpadding="0" style="max-width:620px;background:#0f172a;border-radius:22px;overflow:hidden;border:1px solid #1e293b;">
                <tr>
                    <td style="background:linear-gradient(135deg,#06b6d4 0%,#0ea5e9 45%,#2563eb 100%);padding:34px 30px 30px;">
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <p style="margin:0;color:#e0f2fe;font-size:12px;letter-spacing:1.6px;text-transform:uppercase;font-weight:700;">Hello Social</p>
                                    <h1 style="margin:10px 0 0;font-size:30px;line-height:1.2;color:#ffffff;">Sua rede comecou agora.</h1>
                                </td>
                                <td align="right" valign="top">
                                    <span style="display:inline-block;background:rgba(255,255,255,0.18);padding:7px 12px;border-radius:999px;font-size:12px;color:#ffffff;font-weight:700;">
                                        Conta ativa
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding:30px;">
                        <p style="margin:0 0 14px;font-size:17px;line-height:1.6;color:#f8fafc;">
                            Fala, <strong>{{ $user->name ?? $name ?? 'novo usuario' }}</strong>!
                        </p>

                        <p style="margin:0 0 24px;font-size:15px;line-height:1.75;color:#cbd5e1;">
                            Seu cadastro no <strong>Hello</strong> foi concluido com sucesso. Agora voce ja pode publicar, seguir pessoas, comentar e construir sua comunidade.
                        </p>

                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin:0 0 24px;background:#111827;border:1px solid #1f2937;border-radius:14px;">
                            <tr>
                                <td style="padding:18px;">
                                    <p style="margin:0 0 8px;font-size:13px;color:#38bdf8;font-weight:700;text-transform:uppercase;letter-spacing:0.8px;">Primeiros passos</p>
                                    <p style="margin:0;font-size:14px;line-height:1.8;color:#cbd5e1;">
                                        1. Complete seu perfil<br>
                                        2. Publique seu primeiro post<br>
                                        3. Explore o feed e faca conexoes
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <table role="presentation" cellspacing="0" cellpadding="0" style="margin:0 0 22px;">
                            <tr>
                                <td align="center" bgcolor="#0ea5e9" style="border-radius:999px;">
                                    <a href="{{ $appUrl ?? config('app.url') }}" target="_blank" style="display:inline-block;padding:13px 24px;color:#ffffff;text-decoration:none;font-size:14px;font-weight:700;">
                                        Entrar no Hello
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <p style="margin:0;font-size:13px;line-height:1.7;color:#94a3b8;">
                            Se esse cadastro nao foi feito por voce, ignore esta mensagem.
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="padding:18px 30px;background:#0b1220;border-top:1px solid #1e293b;">
                        <p style="margin:0;font-size:12px;line-height:1.7;color:#64748b;">
                            Hello Social · Este e-mail foi enviado automaticamente apos o registro.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
