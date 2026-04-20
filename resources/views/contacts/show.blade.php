<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $contact->nom_complet }}</title>
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
        .profile-card {
            background: #fff;
            border: 0.5px solid #e5e7eb;
            border-radius: 16px;
            overflow: hidden;
        }
        .profile-header {
            background: linear-gradient(135deg, #0f0c29, #312e81);
            padding: 2rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }
        .avatar-xl {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(167,139,250,0.25);
            border: 2px solid rgba(167,139,250,0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 500;
            color: #c4b5fd;
            flex-shrink: 0;
        }
        .profile-name { font-size: 20px; font-weight: 500; color: #fff; }
        .profile-meta { font-size: 13px; color: rgba(255,255,255,0.4); margin-top: 3px; }
        .info-list { padding: 0 1.5rem; }
        .info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 0;
            border-bottom: 0.5px solid #f3f4f6;
        }
        .info-row:last-child { border-bottom: none; }
        .info-label {
            font-size: 12px;
            color: #9ca3af;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .info-label svg {
            width: 14px;
            height: 14px;
            stroke: #d1d5db;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .info-value { font-size: 14px; color: #1e1b4b; font-weight: 500; }
        .info-value a { color: #7c3aed; text-decoration: none; }
        .info-value a:hover { text-decoration: underline; }
        .profile-footer {
            padding: 1.25rem 1.5rem;
            border-top: 0.5px solid #f3f4f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }
        @media (max-width: 480px) {
            nav { padding: 1rem; }
            .profile-footer { flex-direction: column; align-items: stretch; }
        }
    </style>
</head>
<body>

<nav>
    <a href="{{ route('contact.index') }}" class="brand">
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

    <a href="{{ route('contact.index') }}" class="back-link">
        <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Retour aux contacts
    </a>

    <div class="profile-card">
        <div class="profile-header">
            <div class="avatar-xl">{{ $contact->initiales }}</div>
            <div>
                <p class="profile-name">{{ $contact->nom_complet }}</p>
                <p class="profile-meta">Ajouté le {{ $contact->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="info-list">
            <div class="info-row">
                <span class="info-label">
                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Prénom
                </span>
                <span class="info-value">{{ $contact->prenom }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">
                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Nom
                </span>
                <span class="info-value">{{ $contact->nom }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">
                    <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    Email
                </span>
                <span class="info-value">
                    @if($contact->email)
                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                    @else
                        <span style="color:#d1d5db;">—</span>
                    @endif
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">
                    <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.67A2 2 0 012 .84h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                    Téléphone
                </span>
                <span class="info-value">
                    @if($contact->telephone)
                        <a href="tel:{{ $contact->telephone }}">{{ $contact->telephone }}</a>
                    @else
                        <span style="color:#d1d5db;">—</span>
                    @endif
                </span>
            </div>
        </div>

        <div class="profile-footer">
            <form method="POST" action="{{ route('contact.destroy', $contact) }}" style="margin:0;"
                onsubmit="return confirm('Supprimer définitivement ce contact ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger-outline">Supprimer</button>
            </form>
            <a href="{{ route('contact.edit', $contact) }}" class="btn btn-purple">Modifier</a>
        </div>
    </div>

</div>
</body>
</html>