<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire de souscription assur compte</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <style>
        input {
            font-size: 20px;
            color: #000;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-size: 12px;
        }

        body {
            font-family: Arial, sans-serif;
            padding-left: 35px;
            padding-right: 35px;
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .chechbox {
            border: 1px solid black;
            color: #fff;
            max-width: 3px !important;
            max-height: 3px !important;
            font-size: 9px;
            margin-right: 5px;
        }
        .underline {
            text-decoration: underline;
        }
    </style>

    @php
        $productGaranti = App\Models\ProduitGarantie::where('CodeProduit',$contrat->codeproduit)->get();
    @endphp

    <div class="a4-container">
        <section>
            <div class="container1_1 row" style="width: 100%; align-items: center">
        
                <div style="width: 25%; float: left; justify-content: start">
                    <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('root/images/logo.png'))) }}" alt="Logo" style="width: 100px">
                </div>
                <div style="width: 50%; float: center; margin-left: 170px; border: 1px solid black; padding: 5px">
                    <center>
                        <h2>BULLETIN D'ADHESION ASSURCOMPTE</h2>
                    </center>
                </div>
                <div style="width: 25%; float: right; margin-top: -20px; margin-right: -50px">
                    <img src="data:image/png;base64,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" alt="Logo" style="width: 130px">
                </div>
            </div>
        </section>
        
        <section style="margin-top: 50px">
            <div class="container1_1 row underline" style="width: 100%; align-items: center;">
                <h3>CONDITIONS PARTICULIERES CONVENTION N° 000-00</h3>
            </div>
        </section>

        <div style="width: 100%; margin-top: 30px">
            <div class="col" style="width: 50%; float: left">Agence : {{ $contrat->agence ?? '.................' }}</div>
            <div class="col" style="width: 50%; float: right; text-align: right; margin-right: 0px">Bulletin N° : {{ $contrat->numBullettin ?? '' }}</div>
        </div>

        <section style="margin-top: 20px; padding-bottom: 20px; border: 1px solid #ccc; ">
            <div class="container-fluid" style="">
                <div class="aderent" style="border: 1px solid #ccc; background-color: #747171; height: 18px">
                    <h4 style="color: #fff; font-size: 13px; ">ADHERENT :</h4>
                </div>
    
                <div class="content1" style="margin-top: 10px; padding: 5px">

                    <div class="nom" >
                        <label for="nom"><strong>Nom :</strong> {{{ $contrat->adherent->nom ?? ''}}}</label>
                    </div>

                    <div class="prenom" style="margin-top: 10px;">
                        <label for="nom"><strong>Prenom :</strong> {{ $contrat->adherent->prenom ?? '' }}</label>
                    </div>

                    <div class="identite" style="margin-top: 10px">
    
                        <div class="bithday" style="float: left ;width: 49%">
                            <label for="bithday"><strong>Date de naissance :</strong>{{{ $contrat->adherent->datenaissance ?? ''}}}</label>
                        </div>
                        <div class="lieunaissance" style="float: right; width: 49%">
                            <div class="lieunaissance">
                                <label for="lieunaissance"><strong>lieu de naissance :</strong> {{ $contrat->adherent->lieunaissance ?? '' }}</label>
                            </div>
                        </div>
    
                    </div>
                    <div class="identite" style="margin-top: 25px">
                        <div class="domicile" style="float: left ;width: 49%">
                            <label for="domicile"><strong>Domicile :</strong> {{ $contrat->adherent->lieuresidence ?? '' }}</label>
                        </div>
                        <div class="postal" style="float: right; width: 49%">
                            <div class="postal">
                                <label for="postal"><strong>Boite Postale :</strong> ------------</label>
                            </div>
                        </div>
                    </div>
                    <div class="identite" style="margin-top: 25px">
                        <div class="profession" style="float: left ;width: 49%">
                            <label for="profession"><strong>Profession :</strong> {{ $contrat->adherent->profession ?? '' }}</label>
                        </div>
                        <div class="employeur" style="float: right; width: 49%">
                            <div class="employeur">
                                <label for="employeur"><strong>Employeur :</strong> <span>{{ $contrat->adherent->employeur ?? '' }}</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="identite" style="margin-top: 25px">
                        <div class="numeropiece" style="float: left ;width: 49%">
                            <label for="numeropiece"><strong>CNI/Passport/Attestation d'identité :</strong> {{ $contrat->adherent->numeropiece ?? '' }}</label>
                        </div>
                        <div class="telephone" style="float: right; width: 49%">
                            <div class="telephone">
                                <label for="telephone"><strong>Téléphone / Cell :</strong> <span>{{ $contrat->adherent->telephone ?: $contrat->adherent->mobile }}</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="identite" style="margin-top: 25px">
                        <div class="civilite" style="float: left ;width: 49%">
                            <label for="civilite"><strong>Genre :</strong> {{ $contrat->adherent->civilite ?? '' }}</label>
                        </div>
                        <div class="telephone" style="float: right; width: 49%">
                            <div class="telephone">
                                <label for="telephone"><strong>Situation Matrimoniale :</strong> 
                                    <span>
                                        <span>Céliba <span class="chechbox">aa</span></span>
                                        <span>Marié (e) <span class="chechbox">aa</span></span>
                                        <span>Veuve <span class="chechbox">aa</span></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>

            <div style="margin-top: 20px; margin-left: 10px">
                <label for=""> Ci-après dénommé "le client"</label>
            </div>
        </section>


        <fieldset class="" style="border: 1px solid #ccc; padding: 1rem; margin-top: 30px">
            <legend class="float-none w-auto px-2" style="float: none; width: auto; font-size: 0.875rem; border: 1px solid #ccc; padding: 5px">
                <small style="">GARANTIES SOUSCRITES ET PRIMES D'ASSURANCE</small>
            </legend>

            <div class="garantie " style="margin-top: 20px">
                <strong class="underline">
                    Garanties
                </strong>

                <div style="margin-left: 65px; margin-top: -10px">
                    @foreach ($productGaranti as $item)
                        <span>{{ $item->MonLibelle }}</span>
                    @endforeach
                </div>
            </div>
            <div class="prime " style="margin-top: 10px">
                <div>
                    <strong class="underline">
                        Prime annuelle d'assurance :
                    </strong>
                </div>
                <div style="margin-left: 170px; margin-top: -28px">
                    {{ number_format($contrat->prime, 2, ',', ' ') }} <span>F CFA</span> <span>{{ isset($contrat->prime) ? nombreEnLettre($contrat->prime) : '' }} Franc cfa</span>
                </div>
                <div style="margin-top: 15px">
                    Cette prime sera prélévée mensuellement sur le compte d'épargne du client à raison de  
                    <span class="underline">{{ number_format($contrat->prime, 2, ',', ' ') }}FCFA par mois</span>
                </div>
            </div>

            <div style="margin-top: 20px">
                <strong style="margin-right: 10px">N° du compte de prélevement</strong>  

                
                <div style="width: 100%; margin-top: -8px; margin-left: 200px; margin-bottom: 30px">
                    <div style="width : 20%; float: left; justify-content: space-between">
                        <div class="underline">{{ $contrat->codeguichet ?? "-----------------------"}}</div>
                        <div>(Code guichet)</div>
                    </div>
                    <div style="width : 60%">
                        <div style="float: left; width: 60%; justify-content: space-between">
                            <div class="underline">{{ $contrat->numerocompte ?? "----------------------------------------"}}</div>
                            <div >(N° Compte)</div>
                        </div>
                        <div style="width : 30%; float: right; margin-right: -80px">
                            <div class="underline">{{ $contrat->rib ?? "----------------------"}}</div>
                            <div>(Clé RIB)</div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </fieldset>


       <fieldset class="" style="border: 1px solid #ccc; padding: 1rem; margin-top: 30px">
            <legend class="float-none w-auto px-2" style="float: none; width: auto; font-size: 0.875rem; border: 1px solid #ccc; padding: 5px">
                <small style="">INFORMATIONS GENERALES DU CLIENT</small>
            </legend>
        
            <div style="margin-top: 20px">
                Après avoir pris connaissance  du résumé des conditions générale de <strong>ASSURCOMPTE</strong> au verso de la présente, <br>
                je déclare adherer à ce contrat suivant les caractéristiques indiquées ci-dessus. <br>
                Je déclare avoir reçu un exemplaire du présent document résumant les conditions générales du contrat ASSURCOMPTE.
            </div>
        </fieldset>

        <section>
            <div class="fait" style="width: 100%; margin-top: 10px">

                <label for="fait">Fait à : ......................................................................le...........................................................................</label>

            </div>
        </section>

        <section style="margin-top: 30px">
            <div class="identiteee row" style="width: 100%">
                <div class="col-4" style="width: 30%; float: left;  justify-content: center">

                    <div class="nom">
                        <label for="nom"><strong class="underline">L'ADHERENT </strong></label> <br>
                        <span>(signature précedée de la mention <br>
                        "Lu et Approuvé")</span>
                    </div>

                </div>

                <div class="col-4"  style="margin-left: 280px;float: center;">

                    <div class="nom">

                        <label for="nom"><strong class="underline">POUR LA BANQUE </strong></label>


                    </div>

                </div>
                <div class="col-4"  style="width: 30%; float: right;">

                    <div class="sign-yako">

                        <strong class="underline">POUR L'ASSUREUR</strong>
                        <div>
                            <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('root/images/Signature_Dta.jpg'))) }}" alt="Logo" style="width: 200px">
                        </div>
                    </div>

                </div>
            </div>
        </section>

       

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>



</html>

