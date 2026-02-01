{/* <script> */}


// document.getElementById("loanSimulatorForm").addEventListener("submit", function(event) {
//     event.preventDefault();

    


    
//     // Récupération des données du formulaire
//     // const age = parseInt(document.getElementById("age").value);
//     const duree = parseInt(document.getElementById("loanDuration").value);
//     const montant = parseFloat(document.getElementById("loanMontant").value);

//     // Validation des âges non pris en charge
//     if (montant > 3000000) {
//         // document.getElementById("resultat").innerText = "Veuillez contacter Yako Africa.";
//         const resultat = document.getElementById("resultat");
//         resultat.style.padding = "20px";
//         resultat.style.color = "red";
//         resultat.style.fontWeight = "bold";
//         resultat.style.backgroundColor = "pink";
//         resultat.style.textAlign = "center";
//         resultat.style.fontSize = "20px";
//         resultat.innerText = "Veuillez contacter YAKO AFRICA pour les montant superieure à 3000000.";
//         setTimeout(() => {
//             window.location.reload();
//         }, 5000);
//         return;
//     }else{
//         document.getElementById('resultat').innerHTML = `
//             <div class="alert alert-success py-2 animate__animated animate__fadeIn">
//                 <i class="fas fa-check-circle me-2"></i>
//                 Simulation calculée avec succès
//             </div>
//         `;
//     }

//         // Prime obseque obligatoire
    
//     const primeObseque = 5000;
//     document.getElementById('primeObseque').innerText = primeObseque.toLocaleString('fr-FR', { style: 'currency', currency: 'XAF' });

//     // valeur du taux 

//     let prime = 0

//     const tauxConversation = 0.65 / 100;


//     prime = montant * tauxConversation;
//     console.log('Prime' , prime)

    
    
//     // Résultat final
    
//     const primeFinal = prime + primeObseque;


//     document.getElementById('prime').innerText = prime.toLocaleString('fr-FR', { style: 'currency', currency: 'XAF' });
//     document.getElementById('totalPremium').innerText = primeFinal.toLocaleString('fr-FR', { style: 'currency', currency: 'XAF' });

    
//     console.log("Prime finalllllllllllllllllllllllll:",primeFinal);
//     if (primeFinal  > 10) {
//         document.getElementById("btnSouscrition").disabled = false;
//     }


//     // recuperation des data

//     const data = {
//         duree: duree,
//         montant: montant,
//         prime: prime,
//         primeFinal: primeFinal,
//         primeObseque: primeObseque,
//     };

//     console.log("Data to store:",data);


//     fetch('/epret/store-simulation', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//         },
//         body: JSON.stringify(data),
//     })
//     .then(response => {
//         if (response.ok) {
//             console.log('Simulation data stored successfully');
//         } else {
//             console.error('Failed to store simulation data');
//         }
//     })
//     .catch(error => {
//         console.error('Error:', error);
//     });
    
    

//     // Affichage des données dans la console
//     for (const key in data) {
//         console.log(`${key}: ${data[key]}`);
//     }


//     //mise 

// });


document.getElementById("loanSimulatorForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const duree = parseInt(document.getElementById("loanDuration").value);
    const montant = parseFloat(document.getElementById("loanMontant").value);
    const dob = document.getElementById("dob").value;

    const resultat = document.getElementById("resultat");
    console.log("DOB:", dob);

    // Vérifier si DOB est valide
    if (!dob) {
        swal.fire({

            icon: "error",
            title: "Erreur !",
            text: "Veuillez renseigner votre date de naissance.",
            showConfirmButton: true,
            confirmButtonText: "OK",
            timer: 2000
                
            })
            .then(() => {
            window.location.reload();
        });
        return;
    }

    // Vérifier si DOB est dans le futur
    const todayVerif = new Date();
    const birthDateverif = new Date(dob);
    if (birthDateverif > todayVerif) {
        swal.fire({
            icon: 'error',
            title: 'Erreur',
            text: 'Veuillez renseigner une date de naissance valide.'
        }).then(() => {
            window.location.reload();
            
        })
    }

    // Calcul de l'âge
    const birthDate = new Date(dob);
    const today = new Date();
    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDiff = today.getMonth() - birthDate.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    console.log("Âge calculé :", age);



    // Vérification du montant max
    if (montant > 30000000) {
        resultat.innerHTML = `
            <div class="alert alert-danger text-center fw-bold">
                Veuillez contacter YAKO AFRICA pour les montants supérieurs à 30 000 000.
            </div>`;
        setTimeout(() => window.location.reload(), 5000);
        return;
    }

    // Application des règles de taux
    let taux = null;
    if (age >= 18 && age <= 60 && duree >= 1 && duree <= 24) {
        taux = 0.65 / 100;
    } else if (age >= 18 && age <= 50 && duree >= 25 && duree <= 48) {
        taux = 0.65 / 100;
    } else {
        resultat.innerHTML = `
            <div class="alert alert-warning text-center fw-bold">
                Merci de contacter YAKO AFRICA pour ce type de prêt.
            </div>`;
        return;
    }

    // Garantie Yako obsèque → désactivée / valeur fixe 0
    const primeObseque = 0;
    document.getElementById('primeObseque').innerText = primeObseque.toLocaleString('fr-FR', { style: 'currency', currency: 'XAF' });

    // Calcul prime
    const prime = montant * taux;
    const primeFinal = prime + primeObseque;

    // Affichage
    document.getElementById('prime').innerText = prime.toLocaleString('fr-FR', { style: 'currency', currency: 'XAF' });
    document.getElementById('totalPremium').innerText = primeFinal.toLocaleString('fr-FR', { style: 'currency', currency: 'XAF' });

    resultat.innerHTML = `
        <div class="alert alert-success py-2 animate__animated animate__fadeIn">
            <i class="fas fa-check-circle me-2"></i>
            Simulation calculée avec succès
        </div>
    `;

    if (primeFinal > 10) {
        document.getElementById("btnSouscrition").disabled = false;
    }

    // Envoi données backend
   const data = {
        duree: duree,
        montant: montant,
        dob: dob,
        age: age,
        prime: prime,
        primeFinal: primeFinal,
        primeObseque: primeObseque,
    };




    fetch('/epret/store-simulation', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(data),
    })
    .then(response => response.ok ? console.log('Simulation data stored successfully') : console.error('Failed to store simulation data'))
    .catch(error => console.error('Error:', error));
});

function saveSimulationData(data) {
    sessionStorage.setItem('simulationData.simulationValue', JSON.stringify(data));
}
