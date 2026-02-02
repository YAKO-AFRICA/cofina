<div id="test-l-4" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger4">
    <h5 class="mb-1">Informations relatives aux modes de paiement et la periodicité</h5>
    <p class="mb-4">Veuillez entrer les informations relatives aux modes de paiement et la periodicité en tenant compte
        des champs obligatoire.</p>

    <div class="row g-3">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <label for="" class="form-label">Je souhaite payer mes primes par :</label>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="modepaiement" type="radio" value="VIR" id="Virement_bancaire" checked>
                            <label class="form-check-label" for="Virement_bancaire">
                                Virement bancaire
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="modepaiement" type="radio" value="ESP" id="Espece" disabled>
                            <label class="form-check-label" for="Espece">
                                Espèce
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="modepaiement" type="radio" value="CHK" id="Cheque" disabled>
                            <label class="form-check-label" for="Cheque">
                                Chèque
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="modepaiement" type="radio" value="Mobile_money" id="Mobile_money" disabled>
                            <label class="form-check-label" for="Mobile_money">
                                Mobile money
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="modepaiement" type="radio" value="SOURCE" id="Prelevement_source">
                            <label class="form-check-label" for="Prelevement_source">
                                Prélèvement à la source
                            </label>
                        </div>
                    </div>

                    <div class="row mb-3" id="mode_bancaire">
                        <div class="col-12 mb-3">
                            <label for="banque" class="form-label">Ma banque ou organisme de prélèvement</label>
                            <input type="text" class="form-control" id="banque" name="organisme" value="COFINA" readonly>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="Agence" class="form-label">Agence <span class="text-danger">*</span></label>
                                <select class="form-select" id="Agence" name="agence" required>
                                    <option value="">Selectionnez l'agence</option>
                                    @foreach ($agences as $item)
                                        <option value="{{ $item->id }}" data-codebanque="{{ $item->codeBanque }}">{{ $item->libelle ?? ""}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="Agence" class="form-label">Code Banque</label>
                                <input type="text" class="form-control muted" id="codebanque" name="codebanque" value="" readonly >
                            </div>
                        </div>

                        <div class="row col-12">
                            <div class="col-3">
                                <div class="col-12 mb-3">
                                    <label for="codeguichet" class="form-label">Code Guichet <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="codeguichet" name="codeguichet" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 mb-3">
                                    <label for="Matricule" class="form-label">Mon N° de compte (Matricule) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Matricule" name="numerocompte" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-12 mb-3">
                                    <label for="rib" class="form-label">Cle RIB <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="rib" name="rib" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3" id="mode_mobile" style="display: none;">
                        <div class="col-12 mb-3">
                            <label for="numMobile" class="form-label">Mon N° Mobile</label>
                            <input type="text" class="form-control" id="numMobile" name="numMobile">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-lg-5">
                            <label for="Conseiller" class="form-label">Votre conseiller client</label>
                            <input type="text" class="form-control" id=""  disabled value="{{ Auth::user()->membre->nom ?? ""}} {{ Auth::user()->membre->prenom ?? ""}}">
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <label for="CodeConseiller" class="form-label">Code</label>
                            <input type="text" class="form-control" id=""disabled value="{{ Auth::user()->membre->codeagent ?? ""}}">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label for="CodeConseiller" class="form-label">Attribuer la souscription a : <span class="text-danger">*</span></label>
                           <select name="conseiller" id="conseiller" class="form-select" required>
                               <option value="">Selectionnez le conseiller</option>
                               @foreach ($conseillers as $item)
                                   <option class="form-option" data-CodeConseiller="{{ $item->codeagent ?? ""}}" value="{{ $item->nom ?? ""}} {{ $item->prenom ?? ""}}">{{ $item->nom ?? ""}} {{ $item->prenom ?? ""}} </option>
                               @endforeach
                           </select>
                        </div>

                        <input type="hidden" class="form-control" id="CodeConseiller" name="codeConseiller" value="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">

            <div class="card mx-0">
                <div class="card-body">
                    <label for="" class="form-label">Je souhaite payer mes primes chaque :</label>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="periodicite" type="radio" value="M"
                                id="Mois" disabled>
                            <label class="form-check-label" for="Mois">
                                Mois
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="periodicite" type="radio" value="T"
                                id="Trimestre" disabled>
                            <label class="form-check-label" for="Trimestre">
                                Trimestre
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="periodicite" type="radio" value="S"
                                id="Semestre" disabled>
                            <label class="form-check-label" for="Semestre">
                                Semestre
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="periodicite" type="radio" value="A"
                                id="Annee" checked>
                            <label class="form-check-label" for="Annee">
                                Année
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="periodicite" type="radio" value="U"
                                id="Versement_unique">
                            <label class="form-check-label" for="Versement_unique">
                                Versement unique
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="DateEffet" class="form-label">Mon contrat prendra effet le : <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="DateEffetCOntrat" name="dateEffet" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="primepricipale" class="form-label">Je souhaite payer une prime de :</label>
                            <input type="number" class="form-control" id="primepricipale" name="primepricipale" value="2500" readonly>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="capital" class="form-label">Capital souscrit :</label>
                            <input type="number" class="form-control" id="capital" name="capital" value="350000" readonly>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="duree" class="form-label">Durée de cotisation : <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="duree" name="duree" value="1" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="fraisadhesion" class="form-label">Fraie d'adhesion :</label>
                            <input type="number" class="form-control" id="fraisadhesion" name="fraisadhesion" value="1000" readonly >
                        </div>

                    </div>
                </div>
            </div>
        </div>
        

        <div class="col-12">
            {{-- <div class="d-flex align-items-center gap-3">
                <button onclick="event.preventDefault(); stepper1.previous()"
                    class="btn border-btn px-4 btn-previous-form"><i
                        class='bx bx-left-arrow-alt me-2'></i>Previous</button>
                <button onclick="event.preventDefault(); stepper1.next()"
                    class="btn btn-two px-4 btn-next-form">Suivant<i
                        class='bx bx-right-arrow-alt ms-2'></i></button>
            </div> --}}

            <div class="col-12">
                <div class="d-flex align-items-center gap-3">
                    <button onclick="event.preventDefault(); stepper1.previous()" class="btn btn-outline-secondary px-4 btn-previous-form"><i class='bx bx-left-arrow-alt me-2'></i>Previous</button>
    
                    <button onclick="event.preventDefault(); stepper1.next()"
                    class="btn btn-two px-4 btn-next-form">Suivant<i
                        class='bx bx-right-arrow-alt ms-2'></i></button>
                </div>
            </div>
        </div>
    </div><!---end row-->

    {{-- <script>
        document.getElementById("primepricipale").addEventListener("input", function() {
            const primeInput = document.getElementById("primepricipale");
            const primeError = document.getElementById("primepricipale-error");
    
            // Vérifiez si la valeur est inférieure au minimum autorisé
            if (parseInt(primeInput.value) < parseInt(primeInput.min)) {
                primeError.style.display = "block";
            } else {
                primeError.style.display = "none";
            }
        });
    </script> --}}

    <script>
        document.getElementById("Agence").addEventListener("change", function() {
            var selectedOption = this.options[this.selectedIndex];
            var codeBanque = selectedOption.getAttribute("data-codebanque") || "";

            document.getElementById("codebanque").value = codeBanque;

            console.log("Agence sélectionnée :", this.value);
            console.log("Code banque :", codeBanque);
        });
        document.getElementById("conseiller").addEventListener("change", function() {
            var selectedOption = this.options[this.selectedIndex];
            var CodeConseiller = selectedOption.getAttribute("data-CodeConseiller") || "";

            document.getElementById("CodeConseiller").value = CodeConseiller;
        });
    </script>

</div>
