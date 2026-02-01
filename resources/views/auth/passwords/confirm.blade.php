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

        .btn-link {
            color: #086633;
            text-decoration: none;
            font-weight: 500;
        }

        .btn-link:hover {
            text-decoration: underline;
            color: #064d25;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-header mb-2">
                        <h4>🔒 Confirmation du mot de passe</h4>
                        <p class="text-muted mb-0">Veuillez confirmer votre mot de passe avant de continuer.</p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            {{-- Champ mot de passe --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input id="password" type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" required autocomplete="current-password"
                                    placeholder="••••••••">

                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Bouton de confirmation --}}
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Confirmer le mot de passe
                                </button>
                            </div>

                            {{-- Lien mot de passe oublié --}}
                            @if (Route::has('password.request'))
                                <div class="text-center mt-3">
                                    <a class="btn-link" href="{{ route('password.request') }}">
                                        Mot de passe oublié ?
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

