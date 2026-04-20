<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau contact</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f8f7ff;
            min-height: 100vh;
            color: #1e1b4b;
        }
        nav {
            background: #fff;
            border-bottom: 0.5px solid #e5e7eb;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #1e1b4b;
            font-size: 16px;
            font-weight: 500;
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
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.18s;
        }
        .btn-ghost {
            background: transparent;
            color: #6b7280;
            border: 0.5px solid #e5e7eb;
        }
        .btn-ghost:hover { background: #f9fafb; color: #1e1b4b; }
        .btn-purple { background: #7c3aed; color: #fff; }
        .btn-purple:hover { background: #6d28d9; color: #fff; }
        .main { max-width: 560px; margin: 0 auto; padding: 2.5rem 1.5rem; }
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #9ca3af;
            text-decoration: none;
            margin-bottom: 1.5rem;
            transition: color 0.18s;
        }
        .back-link:hover { color: #7c3aed; }
        .back-link svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .form-card {
            background: #fff;
            border: 0.5px solid #e5e7eb;
            border-radius: 16px;
            overflow: hidden;
        }
        .form-card-header {
            padding: 1.5rem;
            border-bottom: 0.5px solid #f3f4f6;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .form-icon {
            width: 40px;
            height: 40px;
            background: #ede9fe;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-icon svg {
            width: 18px;
            height: 18px;
            stroke: #7c3aed;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .form-card-title { font-size: 16px; font-weight: 500; color: #1e1b4b; }
        .form-card-subtitle { font-size: 13px; color: #9ca3af; margin-top: 2px; }
        .form-body { padding: 1.5rem; }
        .form-group { margin-bottom: 1.25rem; }
        label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
        }
        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 0.5px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            color: #1e1b4b;
            background: #fff;
            outline: none;
            transition: border-color 0.18s;
        }
        .form-control:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124,58,237,0.08);
        }
        .form-control::placeholder { color: #d1d5db; }
        .form-control.is-invalid { border-color: #ef4444; }
        .invalid-feedback { color: #ef4444; font-size: 12px; margin-top: 4px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .form-footer {
            padding: 1.25rem 1.5rem;
            border-top: 0.5px solid #f3f4f6;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        @media (max-width: 480px) {
            .form-row { grid-template-columns: 1fr; }
            nav { padding: 1rem; }
        }
    </style>
</head>
<body>

<nav>
    <a href="{{ route('contacts.index') }}" class="brand">
        <div class="brand-icon">
            <svg viewBox="0 0 24 24">
                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
            </svg>
        </div>
        GestionContacts
    </a>
    <div>
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
            @csrf
            <button type="submit" class="btn btn-ghost">Déconnexion</button>
        </form>
    </div>
</nav>

<div class="main">

    <a href="{{ route('contacts.index') }}" class="back-link">
        <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Retour aux contacts
    </a>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/>
                </svg>
            </div>
            <div>
                <p class="form-card-title">Nouveau contact</p>
                <p class="form-card-subtitle">Remplissez les informations ci-dessous</p>
            </div>
        </div>

        <form method="POST" action="{{ route('contacts.store') }}">
            @csrf
            <div class="form-body">
                <div class="form-row">
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom"
                            class="form-control @error('prenom') is-invalid @enderror"
                            value="{{ old('prenom') }}" placeholder="Jean" required autofocus>
                        @error('prenom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom"
                            class="form-control @error('nom') is-invalid @enderror"
                            value="{{ old('nom') }}" placeholder="Dupont" required>
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="jean@exemple.com">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="text" id="telephone" name="telephone"
                        class="form-control @error('telephone') is-invalid @enderror"
                        value="{{ old('telephone') }}" placeholder="+221 77 000 00 00">
                    @error('telephone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-footer">
                <a href="{{ route('contacts.index') }}" class="btn btn-ghost">Annuler</a>
                <button type="submit" class="btn btn-purple">Enregistrer</button>
            </div>
        </form>
    </div>

</div>
</body>
</html>