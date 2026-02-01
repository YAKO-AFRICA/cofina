<div class="modal fade" id="addUsers" tabindex="-1" aria-labelledby="membreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <style>
            .steps-banner {
                position: relative;
                border-bottom: 1px solid #ddd;
                margin-bottom: 20px;
            }

            .step-indicators {
                display: flex;
                justify-content: space-between;
            }

            .step-indicator {
                text-align: center;
                flex-grow: 1;
                font-size: 0.9rem;
                padding: 10px;
                background: #f9f9f9;
                border: 1px solid #ddd;
                border-radius: 4px;
                margin: 0 5px;
                color: #555;
                transition: background 0.3s, color 0.3s;
            }

            .step-indicator.active {
                background: #0b3a09;
                color: #fff;
                font-weight: bold;
            }

        </style>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="membreModalLabel">Ajouter un nouveau Membre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('setting.user.store') }}" method="POST" class="submitForm">
                @csrf
                <div class="modal-body">

                    <div class="steps-banner mb-4">
                        <ul class="step-indicators d-flex justify-content-between list-unstyled p-0">
                            <li id="step-indicator-1" class="step-indicator active">1. Réseau</li>
                            <li id="step-indicator-2" class="step-indicator">2. Informations</li>
                            <li id="step-indicator-3" class="step-indicator">3. Comptes</li>
                            <li id="step-indicator-4" class="step-indicator">4. Contacts</li>
                        </ul>
                    </div>

                    <div id="step-1" class="step">
                        <fieldset class="border p-3 w-100 row">

                            <legend class="float-none w-auto px-2"><small><h5 class="mb-4">Étape 1 : Reseau</h5></small></legend>
                        
                            <div class="mb-3 form-group col-12">
                                <label for="codeagent" class="form-label">Code Agent <span class="text-danger">*</span></label>
                                <input type="text" name="codeagent" id="codeagent" class="form-control" required>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="codereseau" class="form-label">Réseau de commercialisation</label>
                                <select name="codereseau" id="codereseau" class="form-select">
                                    <option value="">-- Choisir une option --</option>
                                    @foreach ($reseaux as $item)
                                        <option class="form-control" value="{{ $item->id }}">{{ $item->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="codezone" class="form-label">Zone/Departement</label>
                                <select name="codezone" id="codezone" class="form-select" id="">
                                    <option value="">-- Choisir une zone --</option>
                                    @foreach ($zones as $zone)
                                        <option class="form-control" value="{{ $zone->id }}">{{ $zone->libellezone }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="codeequipe" class="form-label">Equipe/Agence</label>
                                <select name="agence" id="agence" class="form-select">
                                    <option value="">-- Choisir une agence --</option>
                                    @foreach ($agences as $agence)
                                        <option class="form-control" data-agenceValue="{{ $agence->libelle }}" value="{{ $agence->id }}">{{ $agence->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="nomagence" value="" class="form-control" id="nomagence">
                            <input type="hidden" name="branche"class="form-control" value="BANKASS" id="branche">
                            <div class="mb-3 col-6 d-none">
                                <label for="codePart" class="form-label">Partenaire</label>
                                <input type="hidden" name="codePart" id="codePart" value="COFINA" class="form-control">
                               
                            </div>

                        </fieldset>
                    </div>

                    <div id="step-2" class="step d-none">
                        <fieldset class="border p-3 row">

                            <legend class="float-none w-auto px-2"><small><h5 class="mb-4">Étape 2 : Informations personnelles</h5></small></legend>
                            
                            <div class="mb-3 col-12">
                                <label class="form-label d-block">Sexe</label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="sexeF" name="sexe" value="F" class="form-check-input">
                                    <label class="form-check-label" for="sexeF">Féminin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="sexeM" name="sexe" value="M" class="form-check-input">
                                    <label class="form-check-label" for="sexeM">Masculin</label>
                                </div>
                            </div>
                            
                            <div class="row col-12">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" name="nom" id="nom" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="prenom" class="form-label">Prenoms</label>
                                        <input type="text" name="prenom" id="prenom" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="datenaissance" class="form-label">Date de naissance</label>
                                        <input type="date" name="datenaissance" id="datenaissance" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="profession" class="form-label">Profession</label>
                                        <input type="text" name="profession" id="profession" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </div>

                    <div id="step-3" class="step d-none">
                        <fieldset class="border p-3 row">

                            <legend class="float-none w-auto px-2"><small><h5 class="mb-4">Étape 3 : Comptes</h5></small></legend>
                            <div class="mb-3 col-12">
                                <label for="login" class="form-label">Nom d'utilisateur (Login) <span class="text-danger">*</span></label>
                                <input type="text" name="login" id="login" class="form-control" required>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3 form-group">
                                    <label for="role" class="form-label">Profile <span class="text-danger">*</span></label>
                                    <select name="role" id="" class="form-control" required>
                                        <option value="">-- Choisir une option --</option>
                                        <option class="form-option"  value="ADMINISTRATEUR">ADMINISTRATEUR</option>
                                        <option class="form-option"  value="SUPERVISEUR">SUPERVISEUR</option>
                                        <option class="form-option"  value="RESPONSABLE">RESPONSABLE</option>
                                        <option class="form-option"  value="MANAGER">MANAGER</option>
                                        <option class="form-option"  value="CONSEILLER">CONSEILLER</option>
                                    </select>

                                </div>
                            </div>
                            
                            <div class="row col-12">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="pass" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                                        <input type="password" name="pass" id="pass" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="cpass" class="form-label">Confirmation Mot de passe</label>
                                        <input type="password" name="cpass" id="cpass" class="form-control">
                                    </div>
                                </div>
                            </div>
                            

                        </fieldset>
                    </div>
                    <div id="step-4" class="step d-none">
                        <fieldset class="border p-3 row">

                            <legend class="float-none w-auto px-2"><small><h5 class="mb-4">Étape 4 : Contacts</h5></small></legend>
                            <div class="mb-3 col-12">
                                <label for="login" class="form-label">Email  <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="row col-12">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="cel" class="form-label">Mobile 1</label>
                                        <input type="text" name="cel" id="cel" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tel" class="form-label">Mobile 2</label>
                                        <input type="tel" name="tel" id="tel" class="form-control">
                                    </div>
                                </div>
                            </div>
                            

                        </fieldset>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary prev-ste" onclick="changeStep()">Précédent</button>
                    <button type="button" class="btn btn-primary next-step d-non" id="next-step">Suivant</button>
                    <button type="submit" class="btn btn-success d-non finish-step" id="finish-step">Terminer</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <script>
    let currentStep = 1;

    const showStep = (step) => {
        // Show the correct step
        document.querySelectorAll('.step').forEach(el => el.classList.add('d-none'));
        document.querySelector(`#step-${step}`).classList.remove('d-none');
        
        // Update buttons
        document.querySelector('.prev-step').classList.toggle('d-none', step === 1 || step === 3);
        document.querySelector('.next-step').classList.toggle('d-none', step === 4);

        if (step != 4) {
            document.getElementById('next-step').classList.remove('d-block');
        }else{
            document.getElementById('next-step').classList.add('d-none');
        }
        if (step === 4) {
            document.getElementById('finish-step').classList.remove('d-block');
        }else{
            document.getElementById('finish-step').classList.add('d-none');
        }

        // Update the step indicator
        document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
            indicator.classList.toggle('active', index + 1 === step);
        });
    };

    document.querySelector('.next-step').addEventListener('click', () => {
        if (currentStep < 4) {
            currentStep++;
            showStep(currentStep);
        }
    });

    function changeStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }

  

    // Initialize with the first step
    showStep(currentStep);
</script>
<script>

const agenceSelect = document.getElementById('agence');
const nomAgenceInput = document.getElementById('nomagence');

agenceSelect.addEventListener('change', function() {
  const selectedOption = agenceSelect.options[agenceSelect.selectedIndex];
  nomAgenceInput.value = selectedOption.getAttribute('data-agenceValue');
});
</script> --}}

<script>
    let currentStep = 1;
    const totalSteps = 4;

    // Fonction pour afficher une étape spécifique
    const showStep = (step) => {
        // Masquer toutes les étapes
        document.querySelectorAll('.step').forEach(el => el.classList.add('d-none'));
        // Afficher l'étape courante
        document.querySelector(`#step-${step}`).classList.remove('d-none');
        
        // Mettre à jour les indicateurs d'étape
        document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
            indicator.classList.toggle('active', index + 1 === step);
        });

        // Gestion des boutons
        const prevBtn = document.querySelector('.prev-step');
        const nextBtn = document.querySelector('.next-step');
        const finishBtn = document.querySelector('.finish-step');

        // Bouton Précédent
        prevBtn.classList.toggle('d-none', step === 1);
        prevBtn.disabled = step === 1;

        // Bouton Suivant/Terminer
        nextBtn.classList.toggle('d-none', step === totalSteps);
        finishBtn.classList.toggle('d-none', step !== totalSteps);

        // Désactiver le bouton Suivant si validation échoue
        if (step < totalSteps) {
            nextBtn.disabled = !validateStep(step);
        }
    };

    // Fonction de validation de l'étape courante
    const validateStep = (step) => {
        switch(step) {
            case 1:
                return document.getElementById('codeagent').value.trim() !== '';
            case 2:
                return document.getElementById('nom').value.trim() !== '' && 
                       document.getElementById('prenom').value.trim() !== '';
            case 3:
                const pass = document.getElementById('pass').value;
                const cpass = document.getElementById('cpass').value;
                return pass.length >= 6 && pass === cpass;
            case 4:
                return document.getElementById('email').value.trim() !== '';
            default:
                return true;
        }
    };

    // Écouteurs d'événements
    document.querySelector('.next-step').addEventListener('click', (e) => {
        e.preventDefault();
        if (currentStep < totalSteps && validateStep(currentStep)) {
            currentStep++;
            showStep(currentStep);
        }
    });

    document.querySelector('.prev-step').addEventListener('click', (e) => {
        e.preventDefault();
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    });

    // Validation en temps réel pour les champs requis
    document.querySelectorAll('input[required], select[required]').forEach(input => {
        input.addEventListener('input', () => {
            if (currentStep < totalSteps) {
                document.querySelector('.next-step').disabled = !validateStep(currentStep);
            }
        });
    });

    // Initialisation
    document.addEventListener('DOMContentLoaded', () => {
        showStep(currentStep);
        
        // Gestion du changement d'agence
        const agenceSelect = document.getElementById('agence');
        const nomAgenceInput = document.getElementById('nomagence');
        
        agenceSelect?.addEventListener('change', function() {
            const selectedOption = agenceSelect.options[agenceSelect.selectedIndex];
            nomAgenceInput.value = selectedOption.getAttribute('data-agenceValue') || '';
        });
    });

    // Soumission du formulaire
    document.querySelector('.submitForm').addEventListener('submit', function(e) {
        if (!validateStep(totalSteps)) {
            e.preventDefault();
            alert('Veuillez compléter tous les champs requis avant de soumettre.');
        }
    });
</script>