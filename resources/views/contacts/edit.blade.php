<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le contact</title>
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
        .btn-danger-outline {
            background: transparent;
            color: #ef4444;
            border: 0.5px solid #fecaca;
        }
        .btn-danger-outline:hover { background: #fef2f2; }
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
        .avatar-lg {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #ede9fe;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 500;
            color: #7c3aed;
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
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        .form-footer {
            padding: 1.25rem 1.5rem;
            border-top: 0.5px solid #f3f4f6;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
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

    <form method="POST" action="{{ route('logout') }}" style="margin:0;">
        @csrf
        <button type="submit" class="btn btn-ghost">Déconnexion</button>
    </form>
</nav>

<div class="main">

    <a href="{{ route('contacts.index') }}" class="back-link">
        <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Retour aux contacts
    </a>

    <div class="form-card">

        <div class="form-card-header">
            <div class="avatar-lg">{{ $contact->initiales }}</div>
            <div>
                <p class="form-card-title">{{ $contact->nom_complet }}</p>
                <p class="form-card-subtitle">Modifier les informations</p>
            </div>
        </div>

        <!-- UPDATE -->
        <form method="POST" action="{{ route('contacts.update', $contact) }}">
            @csrf
            @method('PUT')

            <div class="form-body">
                <div class="form-row">
                    <div class="form-group">
                        <label>Prénom</label>
                        <input type="text" name="prenom" class="form-control"
                               value="{{ old('prenom', $contact->prenom) }}">
                    </div>

                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" class="form-control"
                               value="{{ old('nom', $contact->nom) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email', $contact->email) }}">
                </div>

                <div class="form-group">
                    <label>Téléphone</label>
                    <input type="text" name="telephone" class="form-control"
                           value="{{ old('telephone', $contact->telephone) }}">
                </div>
            </div>

            <div class="form-footer">
                <a href="{{ route('contacts.index') }}" class="btn btn-ghost">Annuler</a>
                <button type="submit" class="btn btn-purple">Enregistrer</button>
            </div>
        </form>

        <!-- DELETE séparé -->
        <form method="POST"
              action="{{ route('contacts.destroy', $contact) }}"
              onsubmit="return confirm('Supprimer définitivement ce contact ?')"
              style="padding: 1rem;">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger-outline">
                Supprimer
            </button>
        </form>

    </div>
</div>

</body>
</html>