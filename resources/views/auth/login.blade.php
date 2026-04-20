<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #0f0c29;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .bg-orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.4;
            pointer-events: none;
            z-index: 0;
        }
        .bg-orb-1 { width: 500px; height: 500px; background: #5b21b6; top: -100px; left: -150px; }
        .bg-orb-2 { width: 400px; height: 400px; background: #7c3aed; bottom: 0; right: -100px; }
        .bg-orb-3 { width: 300px; height: 300px; background: #2563eb; top: 40%; left: 40%; }

        .auth-card {
            position: relative;
            z-index: 5;
            background: rgba(255,255,255,0.05);
            border: 0.5px solid rgba(255,255,255,0.12);
            border-radius: 16px;
            padding: 2.5rem;
            width: 100%;
            max-width: 440px;
            backdrop-filter: blur(16px);
        }

        .auth-logo {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #7c3aed, #2563eb);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.25rem;
        }

        .auth-logo svg {
            width: 20px;
            height: 20px;
            stroke: white;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .auth-title {
            color: #fff;
            font-size: 22px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 4px;
        }

        .auth-subtitle {
            color: rgba(255,255,255,0.4);
            font-size: 14px;
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-label {
            color: rgba(255,255,255,0.7);
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .form-control {
            background: rgba(255,255,255,0.06);
            border: 0.5px solid rgba(255,255,255,0.12);
            border-radius: 8px;
            color: #fff;
            padding: 10px 14px;
            font-size: 14px;
            transition: border-color 0.18s, background 0.18s;
        }

        .form-control::placeholder { color: rgba(255,255,255,0.25); }
        .form-control:focus {
            background: rgba(255,255,255,0.09);
            border-color: rgba(124,58,237,0.6);
            color: #fff;
            box-shadow: 0 0 0 3px rgba(124,58,237,0.15);
        }

        .form-control.is-invalid {
            border-color: rgba(239,68,68,0.6);
        }

        .invalid-feedback {
            color: #f87171;
            font-size: 12px;
        }

        .form-check-input {
            background-color: rgba(255,255,255,0.06);
            border: 0.5px solid rgba(255,255,255,0.2);
        }

        .form-check-input:checked {
            background-color: #7c3aed;
            border-color: #7c3aed;
        }

        .form-check-label {
            color: rgba(255,255,255,0.5);
            font-size: 13px;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background: #7c3aed;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.18s;
            margin-top: 0.5rem;
        }

        .btn-submit:hover { background: #6d28d9; }

        .auth-footer {
            text-align: center;
            margin-top: 1.25rem;
            font-size: 13px;
            color: rgba(255,255,255,0.4);
        }

        .auth-footer a {
            color: #a78bfa;
            text-decoration: none;
            font-weight: 500;
            margin-left: 4px;
        }

        .auth-footer a:hover { color: #c4b5fd; }

        @media (max-width: 480px) {
            .auth-card { margin: 1.5rem; padding: 1.75rem; }
        }
    </style>
</head>
<body>

    <div class="bg-orb bg-orb-1"></div>
    <div class="bg-orb bg-orb-2"></div>
    <div class="bg-orb bg-orb-3"></div>

    <div class="auth-card">

        <div class="auth-logo">
            <svg viewBox="0 0 24 24">
                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
            </svg>
        </div>

        <h2 class="auth-title">Bon retour</h2>
        <p class="auth-subtitle">Connectez-vous à GestionContacts</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" placeholder="jean@exemple.com" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Mot de passe</label>
                <input type="password" name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="••••••••" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Se souvenir de moi</label>
            </div>

            <button type="submit" class="btn-submit">Se connecter</button>

            <div class="auth-footer">
                Pas encore de compte ?
                <a href="{{ route('register') }}">S'inscrire</a>
            </div>
        </form>

    </div>

</body>
</html>