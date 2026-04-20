<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mes contacts</title>

<style>
* { margin:0; padding:0; box-sizing:border-box; }

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    background: #0f0c29;
    min-height: 100vh;
    color: #fff;
}

/* ORBES */
.bg-orb {
    position: fixed;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.4;
    pointer-events: none;
    z-index: 0;
}
.bg-orb-1 { width:500px; height:500px; background:#5b21b6; top:-100px; left:-150px; }
.bg-orb-2 { width:400px; height:400px; background:#7c3aed; bottom:0; right:-100px; }
.bg-orb-3 { width:300px; height:300px; background:#2563eb; top:40%; left:40%; }

/* NAV */
nav {
    position: relative;
    z-index:10;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:1.2rem 2rem;
    background: rgba(15,12,41,0.5);
    backdrop-filter: blur(12px);
    border-bottom:0.5px solid rgba(255,255,255,0.08);
}

.brand {
    display:flex;
    align-items:center;
    gap:10px;
    text-decoration:none;
    color:#fff;
    font-weight:500;
}

.brand-icon {
    width:32px;
    height:32px;
    background: linear-gradient(135deg,#7c3aed,#2563eb);
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
}

.btn {
    padding:8px 14px;
    border-radius:8px;
    border:none;
    cursor:pointer;
    font-size:13px;
}

.btn-ghost {
    background:rgba(255,255,255,0.06);
    color:#fff;
    border:0.5px solid rgba(255,255,255,0.15);
}

.btn-purple {
    background:#7c3aed;
    color:#fff;
}

/* CONTAINER */
.container {
    position: relative;
    z-index:5;
    max-width:1000px;
    margin: 40px auto;
    padding:0 20px;
}

.header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.title {
    font-size:26px;
    font-weight:500;
}

.subtitle {
    color:rgba(255,255,255,0.6);
    font-size:14px;
}

/* SEARCH */
.search-bar {
    display:flex;
    gap:10px;
    margin:20px 0;
}

.search-bar input {
    flex:1;
    padding:12px;
    border-radius:10px;
    border:0.5px solid rgba(255,255,255,0.15);
    background:rgba(255,255,255,0.05);
    color:#fff;
    outline:none;
}

/* CARD TABLE */
.card {
    background: rgba(255,255,255,0.04);
    border:0.5px solid rgba(255,255,255,0.1);
    border-radius:16px;
    overflow:hidden;
    backdrop-filter: blur(12px);
}

table {
    width:100%;
    border-collapse: collapse;
}

th {
    text-align:left;
    font-size:12px;
    padding:14px;
    color:rgba(255,255,255,0.6);
    border-bottom:0.5px solid rgba(255,255,255,0.08);
}

td {
    padding:14px;
    border-bottom:0.5px solid rgba(255,255,255,0.05);
    font-size:14px;
}

.row {
    display:flex;
    align-items:center;
    gap:10px;
}

.avatar {
    width:34px;
    height:34px;
    border-radius:50%;
    background:#7c3aed;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:12px;
    font-weight:600;
}

/* ACTIONS */
.actions {
    display:flex;
    gap:8px;
}

.btn-edit {
    background:rgba(124,58,237,0.2);
    color:#a78bfa;
    border:0.5px solid rgba(124,58,237,0.4);
    padding:6px 10px;
    border-radius:8px;
    font-size:12px;
    text-decoration:none;
}

.btn-delete {
    background:rgba(239,68,68,0.1);
    color:#f87171;
    border:0.5px solid rgba(239,68,68,0.3);
    padding:6px 10px;
    border-radius:8px;
    font-size:12px;
}
</style>
</head>

<body>

<div class="bg-orb bg-orb-1"></div>
<div class="bg-orb bg-orb-2"></div>
<div class="bg-orb bg-orb-3"></div>

<!-- NAV -->
<nav>
    <a href="{{ route('contacts.index') }}" class="brand">
        <div class="brand-icon">👥</div>
        GestionContacts
    </a>

    <div style="display:flex; gap:10px;">
        <span>{{ auth()->user()->name }}</span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-ghost">Déconnexion</button>
        </form>
    </div>
</nav>

<!-- CONTENT -->
<div class="container">

    <div class="header">
        <div>
            <div class="title">Mes contacts</div>
            <div class="subtitle">{{ $contacts->count() }} contact(s)</div>
        </div>

        <a href="#" class="btn btn-purple">+ Nouveau contact</a>
    </div>

    <div class="search-bar">
        <input type="text" placeholder="Rechercher un contact...">
        <button class="btn btn-ghost">Rechercher</button>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>
                        <div class="row">
                            <div class="avatar">
                                {{ strtoupper(substr($contact->prenom,0,1)) }}{{ strtoupper(substr($contact->nom,0,1)) }}
                            </div>
                            <strong>{{ $contact->prenom }} {{ $contact->nom }}</strong>
                        </div>
                    </td>

                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->telephone }}</td>

                    <td>
                        <div class="actions">
                            <a href="{{ route('contacts.edit', $contact) }}" class="btn-edit">
                                Modifier
                            </a>

                            <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

</body>
</html>