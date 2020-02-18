
var bouton = document.getElementById('bouton');
var nom = document.getElementById('nom');
var prenom = document.getElementById('prenom');
var email = document.getElementById('email');
var demande = document.getElementById('demande');
var mas = document.getElementById('mas');
var fem = document.getElementById('fem');
var regexNom = /^[a-zA-Zéèçàê]+-?[a-zA-Zéèçàê]+$/;
var regexPrenom =  /^[a-zA-Zéèçàê]+-?[a-zA-Zéèçàê]+$/;
var regexEmail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;


bouton.addEventListener('click', verification);

function verification(event)
{
    if(!regexNom.test(nom.value))
    {   
        if(nom.validity.valueMissing)
        { 
            event.preventDefault();
            var paraErreurNom = document.getElementById('missNom');
            paraErreurNom.className = "danger";
            paraErreurNom.textContent = "Nom : Valeur obligatoire";
            
        }
        else
        {
            event.preventDefault();
            var paraErreurNom = document.getElementById('missNom');
            paraErreurNom.className = "danger";
            paraErreurNom.textContent = "Nom : Entrez uniquement des caractères alphabétiques";
            
        }
    }
    if(!regexPrenom.test(prenom.value))
    {
        if(prenom.validity.valueMissing)
        {
            event.preventDefault();
            var paraErreurPrenom = document.getElementById('missPrenom');
            paraErreurPrenom.className = "danger";
            paraErreurPrenom.textContent="Prenom :  Valeur obligatoire";
            
        }
        else
        {
            event.preventDefault();
            var paraErreurPrenom = document.getElementById('missPrenom');
            paraErreurPrenom.className = "danger";
            paraErreurPrenom.textContent="Prenom : uniquement des caractères alphabétiques";
            
        }
    }
    if(!regexEmail.test(email.value))
    {
        if(email.validity.valueMissing)
        {
            event.preventDefault();
            let paraErreurEmail = document.getElementById('missEmail');
            paraErreurEmail.className = "danger";
            paraErreurEmail.textContent = "email : Valeur obligatoire";
            
        }
        else
        {
            event.preventDefault();
            let paraErreurEmail = document.getElementById('missEmail');
            paraErreurEmail.className = "danger";
            paraErreurEmail.textContent = "email : format exemple0@email.com";
            
        }
    }
    if(demande.validity.valueMissing)
    {
        event.preventDefault();
        let paraErreurEmail = document.getElementById('missDemande');
        paraErreurEmail.className = "danger";
        paraErreurEmail.textContent = "Demande : Valeur obligatoire";
        
    }
    if(mas.validity.valueMissing && fem.validity.valueMissing)
    {
        event.preventDefault();
        let paraErreurEmail = document.getElementById('missSexe');
        paraErreurEmail.className = "danger";
        paraErreurEmail.textContent = "Sexe : Valeur obligatoire";
        
    }

}

