document.addEventListener("DOMContentLoaded", function() {
    const birthdayInput = document.getElementById('Date_naissance');
    const birthday = new Date(birthdayInput.value);
  
    // Récupérer la date actuelle
    const today = new Date();
  
    // Calculer l'âge en années
    let age = today.getFullYear() - birthday.getFullYear();
  
    // calcule de la duree de la garantie
    const dureCalculate = 65 - age;
    const duree = document.querySelector('input[name="duree"]');
  
    duree.value = dureCalculate;
  });


  document.addEventListener("DOMContentLoaded", function() {
      const numerocompte = document.getElementById('numerocompte');
      const cNumerocompte = document.getElementById('cNumCompte');
      const errorMessage = document.getElementById('error-message');

      const validateCompte = () => {
          if (numerocompte.value !== cNumerocompte.value) {
              errorMessage.style.display = 'block';
              cNumerocompte.classList.add('is-invalid');
              document.getElementById('nextBtn').disabled = true;
          } else {
              errorMessage.style.display = 'none';
              cNumerocompte.classList.remove('is-invalid');
              document.getElementById('nextBtn').disabled = false;
          }
      };

      // Vérifie la correspondance en temps réel
      cNumerocompte.addEventListener('input', validateCompte);
      numerocompte.addEventListener('input', validateCompte);
  })