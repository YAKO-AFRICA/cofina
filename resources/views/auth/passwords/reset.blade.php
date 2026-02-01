<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>

    {{-- Lien vers Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #086633 0%, rgba(10, 66, 13, 0.705) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: transparent;
            border-bottom: none;
            text-align: center;
        }

        .card-header h4 {
            font-weight: 700;
            color: #086633;
        }

        .btn-primary {
            background-color: #086633;
            border: none;
            border-radius: 50px;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #064d25;
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-header mb-2">
                        <h4>🔑 Réinitialisation du mot de passe</h4>
                        <p class="text-muted mb-0">Veuillez saisir votre adresse e-mail et votre nouveau mot de passe.</p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            {{-- Adresse e-mail --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse e-mail</label>
                                <input id="email" type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" value="{{ $email ?? old('email') }}" 
                                    required autocomplete="email" autofocus
                                    placeholder="exemple@domaine.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nouveau mot de passe --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Nouveau mot de passe</label>
                                <input id="password" type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" required autocomplete="new-password"
                                    placeholder="••••••••">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Confirmation --}}
                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">Confirmer le mot de passe</label>
                                <input id="password-confirm" type="password" 
                                    class="form-control" 
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="••••••••">
                            </div>

                            {{-- Bouton --}}
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Réinitialiser le mot de passe
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{ route('login') }}" class="text-decoration-none text-success">
                                    ← Retour à la connexion
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

