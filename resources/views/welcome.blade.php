<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #0f0c29;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ORBES DE FOND */
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

        /* NAVBAR */
        nav {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 2rem;
            border-bottom: 0.5px solid rgba(255,255,255,0.08);
            background: rgba(15,12,41,0.5);
            backdrop-filter: blur(12px);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            font-size: 17px;
            font-weight: 500;
            text-decoration: none;
        }

        .brand-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #7c3aed, #2563eb);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-icon svg {
            width: 16px;
            height: 16px;
            stroke: white;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .nav-actions { display: flex; gap: 8px; }

        /* BOUTONS */
        .btn-custom {
            padding: 8px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            text-decoration: none;
            transition: all 0.18s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-ghost {
            background: rgba(255,255,255,0.06);
            color: rgba(255,255,255,0.85);
            border: 0.5px solid rgba(255,255,255,0.12);
        }
        .btn-ghost:hover { background: rgba(255,255,255,0.12); color: white; }

        .btn-primary-custom {
            background: #7c3aed;
            color: #fff;
        }
        .btn-primary-custom:hover { background: #6d28d9; color: white; }

        .btn-white {
            background: white;
            color: #1e1b4b;
            font-weight: 600;
        }
        .btn-white:hover { background: #f5f3ff; color: #1e1b4b; }

        .btn-google {
            background: white;
            color: #3c3c3c;
            border: 0.5px solid #e5e7eb;
            font-weight: 500;
        }
        .btn-google:hover {
            background: #f9fafb;
            color: #3c3c3c;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .btn-lg-custom {
            padding: 13px 28px;
            font-size: 16px;
            border-radius: 10px;
        }

        /* HERO */
        .hero {
            position: relative;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 68px);
            padding: 3rem 1.5rem;
        }

        .hero-inner {
            max-width: 680px;
            width: 100%;
            text-align: center;
        }

        /* BADGE */
        .badge-custom {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(124,58,237,0.2);
            border: 0.5px solid rgba(124,58,237,0.4);
            color: #c4b5fd;
            border-radius: 20px;
            padding: 5px 14px;
            font-size: 13px;
            margin-bottom: 1.5rem;
        }

        .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #a78bfa;
        }

        /* TITRE */
        h1 {
            font-size: clamp(2rem, 6vw, 3.2rem);
            font-weight: 500;
            color: #fff;
            line-height: 1.15;
            margin-bottom: 1.25rem;
            letter-spacing: -0.02em;
        }

        h1 span {
            background: linear-gradient(90deg, #a78bfa, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            font-size: clamp(15px, 3vw, 17px);
            color: rgba(255,255,255,0.55);
            line-height: 1.7;
            margin-bottom: 2.5rem;
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
        }

        /* CTA */
        .cta-group {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .divider-line {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0.75rem auto;
            max-width: 280px;
            color: rgba(255,255,255,0.3);
            font-size: 13px;
        }

        .divider-line::before,
        .divider-line::after {
            content: '';
            flex: 1;
            height: 0.5px;
            background: rgba(255,255,255,0.12);
        }

        /* FEATURE CARDS */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 12px;
            margin-top: 3.5rem;
        }

        .feature-card {
            background: rgba(255,255,255,0.04);
            border: 0.5px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            padding: 1.25rem;
            text-align: left;
            transition: border-color 0.2s;
        }

        .feature-card:hover { border-color: rgba(124,58,237,0.4); }

        .feat-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }

        .feat-icon svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .icon-purple { background: rgba(124,58,237,0.2); }
        .icon-purple svg { stroke: #a78bfa; }

        .icon-blue { background: rgba(37,99,235,0.2); }
        .icon-blue svg { stroke: #60a5fa; }

        .icon-green { background: rgba(5,150,105,0.2); }
        .icon-green svg { stroke: #34d399; }

        .feat-title {
            color: #fff;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .feat-desc {
            color: rgba(255,255,255,0.45);
            font-size: 13px;
            line-height: 1.5;
        }

        /* RESPONSIVE MOBILE */
        @media (max-width: 480px) {
            nav { padding: 1rem; }
            .brand span { display: none; }
            .btn-lg-custom { padding: 12px 20px; font-size: 15px; }
            .cta-group { flex-direction: column; align-items: stretch; }
            .cta-group .btn-custom { justify-content: center; }
            .features { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>

    <!-- ORBES DE FOND -->
    <div class="bg-orb bg-orb-1"></div>
    <div class="bg-orb bg-orb-2"></div>
    <div class="bg-orb bg-orb-3"></div>

    <!-- NAVBAR -->
    <nav>
        <a href="#" class="brand">
            <div class="brand-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                </svg>
            </div>
            <span>GestionContacts</span>
        </a>

        <div class="nav-actions">
            <a href="/login" class="btn-custom btn-ghost">Se connecter</a>
            <a href="/register" class="btn-custom btn-primary-custom">S'inscrire</a>
        </div>
    </nav>

    <!-- HERO -->
    <div class="hero">
        <div class="hero-inner">

            <div class="badge-custom">
                <div class="dot"></div>
                Accès sécurisé &amp; chiffré
            </div>

            <h1>Gérez vos contacts <span>simplement</span></h1>

            <p class="subtitle">
                Organisez, sécurisez et accédez à tous vos contacts depuis un seul endroit. Simple, rapide, fiable.
            </p>

            <!-- BOUTONS CTA -->
            <div class="cta-group">
                <a href="/login" class="btn-custom btn-white btn-lg-custom">Se connecter</a>
                <a href="/register" class="btn-custom btn-ghost btn-lg-custom">Créer un compte</a>
            </div>

            <div class="divider-line">ou</div>

            <div style="display:flex; justify-content:center;">
                <a href="/auth/google" class="btn-custom btn-google btn-lg-custom">
                    <svg width="18" height="18" viewBox="0 0 48 48">
                        <path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 12.955 4 4 12.955 4 24s8.955 20 20 20 20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"/>
                        <path fill="#FF3D00" d="M6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 16.318 4 9.656 8.337 6.306 14.691z"/>
                        <path fill="#4CAF50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0124 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44z"/>
                        <path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 01-4.087 5.571l.003-.002 6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917z"/>
                    </svg>
                    Continuer avec Google
                </a>
            </div>

            <!-- FEATURE CARDS -->
            <div class="features">

                <div class="feature-card">
                    <div class="feat-icon icon-purple">
                        <svg viewBox="0 0 24 24">
                            <path d="M13 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V9z"/>
                            <polyline points="13 2 13 9 20 9"/>
                        </svg>
                    </div>
                    <div class="feat-title">Gestion rapide</div>
                    <div class="feat-desc">Ajoutez et retrouvez vos contacts en quelques secondes.</div>
                </div>

                <div class="feature-card">
                    <div class="feat-icon icon-blue">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0110 0v4"/>
                        </svg>
                    </div>
                    <div class="feat-title">Sécurisé</div>
                    <div class="feat-desc">Vos données sont protégées.</div>
                </div>

                <div class="feature-card">
                    <div class="feat-icon icon-green">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="2" y1="12" x2="22" y2="12"/>
                            <path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/>
                        </svg>
                    </div>
                    <div class="feat-title">Accessible partout</div>
                    <div class="feat-desc">Accédez à vos contacts depuis n'importe quel appareil.</div>
                </div>

            </div>

        </div>
    </div>

</body>
</html>