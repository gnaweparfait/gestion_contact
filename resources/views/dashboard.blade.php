<x-app-layout>
    <x-slot name="header">
        <div style="display:flex; align-items:center; justify-content:space-between;">
            <div style="display:flex; align-items:center; gap:10px;">
                <div style="width:32px;height:32px;background:linear-gradient(135deg,#7c3aed,#2563eb);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                        <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                    </svg>
                </div>
                <h2 style="font-size:18px; font-weight:500; color:#1e1b4b; margin:0;">
                    {{ __('Tableau de bord') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- WELCOME BANNER --}}
            <div style="background:linear-gradient(135deg,#0f0c29,#312e81);border-radius:16px;padding:2rem 2.5rem;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
                <div>
                    <p style="color:rgba(255,255,255,0.5);font-size:13px;margin-bottom:4px;">Bienvenue,</p>
                    <h3 style="color:#fff;font-size:22px;font-weight:500;margin:0;">{{ Auth::user()->name }}</h3>
                    <p style="color:rgba(255,255,255,0.4);font-size:13px;margin-top:4px;">Gérez vos contacts depuis votre tableau de bord.</p>
                </div>
                <a href="{{ route('contacts.create') }}"
                   style="display:inline-flex;align-items:center;gap:8px;padding:10px 20px;background:#7c3aed;color:#fff;border-radius:8px;font-size:14px;font-weight:500;text-decoration:none;transition:background 0.18s;"
                   onmouseover="this.style.background='#6d28d9'" onmouseout="this.style.background='#7c3aed'">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    Nouveau contact
                </a>
            </div>

            {{-- STATS CARDS --}}
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:12px;">

                <div style="background:#fff;border:0.5px solid #e5e7eb;border-radius:12px;padding:1.25rem;">
                    <p style="font-size:12px;color:#6b7280;margin-bottom:6px;text-transform:uppercase;letter-spacing:0.05em;">Total contacts</p>
                    <p style="font-size:28px;font-weight:500;color:#1e1b4b;margin:0;">{{ $totalContacts ?? 0 }}</p>
                </div>

                <div style="background:#fff;border:0.5px solid #e5e7eb;border-radius:12px;padding:1.25rem;">
                    <p style="font-size:12px;color:#6b7280;margin-bottom:6px;text-transform:uppercase;letter-spacing:0.05em;">Ajoutés ce mois</p>
                    <p style="font-size:28px;font-weight:500;color:#7c3aed;margin:0;">{{ $monthContacts ?? 0 }}</p>
                </div>

                <div style="background:#fff;border:0.5px solid #e5e7eb;border-radius:12px;padding:1.25rem;">
                    <p style="font-size:12px;color:#6b7280;margin-bottom:6px;text-transform:uppercase;letter-spacing:0.05em;">Avec email</p>
                    <p style="font-size:28px;font-weight:500;color:#2563eb;margin:0;">{{ $withEmail ?? 0 }}</p>
                </div>

                <div style="background:#fff;border:0.5px solid #e5e7eb;border-radius:12px;padding:1.25rem;">
                    <p style="font-size:12px;color:#6b7280;margin-bottom:6px;text-transform:uppercase;letter-spacing:0.05em;">Avec téléphone</p>
                    <p style="font-size:28px;font-weight:500;color:#059669;margin:0;">{{ $withPhone ?? 0 }}</p>
                </div>

            </div>

            {{-- RECENT CONTACTS --}}
            <div style="background:#fff;border:0.5px solid #e5e7eb;border-radius:16px;overflow:hidden;">
                <div style="padding:1.25rem 1.5rem;border-bottom:0.5px solid #e5e7eb;display:flex;align-items:center;justify-content:space-between;">
                    <h4 style="font-size:15px;font-weight:500;color:#1e1b4b;margin:0;">Contacts récents</h4>
                    <a href="{{ route('contacts.index') }}" style="font-size:13px;color:#7c3aed;text-decoration:none;font-weight:500;">Voir tout →</a>
                </div>

                @if(isset($recentContacts) && $recentContacts->count())
                    <table style="width:100%;border-collapse:collapse;">
                        <thead>
                            <tr style="background:#f9fafb;">
                                <th style="padding:10px 1.5rem;text-align:left;font-size:12px;color:#6b7280;font-weight:500;text-transform:uppercase;letter-spacing:0.05em;">Nom</th>
                                <th style="padding:10px 1.5rem;text-align:left;font-size:12px;color:#6b7280;font-weight:500;text-transform:uppercase;letter-spacing:0.05em;">Email</th>
                                <th style="padding:10px 1.5rem;text-align:left;font-size:12px;color:#6b7280;font-weight:500;text-transform:uppercase;letter-spacing:0.05em;">Téléphone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentContacts as $contact)
                            <tr style="border-top:0.5px solid #f3f4f6;">
                                <td style="padding:12px 1.5rem;">
                                    <div style="display:flex;align-items:center;gap:10px;">
                                        <div style="width:32px;height:32px;border-radius:50%;background:#ede9fe;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:500;color:#7c3aed;">
                                            {{ strtoupper(substr($contact->prenom,0,1)) }}{{ strtoupper(substr($contact->nom,0,1)) }}
                                        </div>
                                        <span style="font-size:14px;color:#1e1b4b;font-weight:500;">{{ $contact->prenom }} {{ $contact->nom }}</span>
                                    </div>
                                </td>
                                <td style="padding:12px 1.5rem;font-size:14px;color:#6b7280;">{{ $contact->email ?? '—' }}</td>
                                <td style="padding:12px 1.5rem;font-size:14px;color:#6b7280;">{{ $contact->telephone ?? '—' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div style="padding:3rem;text-align:center;color:#9ca3af;font-size:14px;">
                        Aucun contact pour l'instant.
                        <a href="{{ route('contacts.create') }}" style="color:#7c3aed;text-decoration:none;font-weight:500;margin-left:4px;">Ajouter le premier →</a>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>