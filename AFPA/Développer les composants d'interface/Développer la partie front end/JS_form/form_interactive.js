var tableau_de_valeur = [];
var compteur = 1;
var value_input = undefined;
var tableau_de_titre = [
    "Votre nom :","Votre prenom :","Votre adresse :","Votre ville :","Votre télephone :"
];
var tab_id = 
[
    "nom","prenom","adresse","ville","télephone"

]
$("#titre").text(tableau_de_titre[0]);

$("#valeur").click(function()
{   
    //Prend la valeur de l'input et l'attribut a une variable.
    value_input = $("#cobaye").val();

    //Supprime l'erreur car nouvelle insertion 
    $("#danger").remove();
    if(value_input != undefined && value_input != "")
    {
        //Affiche une value différente lorsque le derniers champs du 
        //formulaire est atteint.
        if(compteur+1 == tableau_de_titre.length)
        {
            $("#valeur").val("Valider le formulaire");
        }

        //insérer la valeur de l'input dans le tableau en derniere position.
        tableau_de_valeur.push(value_input);

        //Vide le champs de l'input quand on clique sur l'évenement
        //et après avoir insérer la valeur de l'input dans le tableau.
        $("#cobaye").val("");
    
        //si le nombre de champs du formulaire a atteint son maximum :
        //teste avec le nombre de variable insérer dans tableau de titre
        //alors on supprime tous les champs inutiles et l'on envoie le formulaire.
        if(compteur == tableau_de_titre.length)
        {
        //     $("#titre").remove();
        //     $("#cobaye").remove();
        //     $("#valeur").remove();
            envoie_form();
        }
        //si tout les champs n'ont pas été remplis, donc que compteur
        //ne vaut pas le nombre d'insertion dans le tableau alors 
        //on prend la valeur suivante, en simulant un changement de champs
        //en changeant simplement le titre.
        else
        {
            $("#titre").remove();
            $("#insert").prepend('<p id="titre"></p>')
            $("#titre").text(tableau_de_titre[compteur]); 
        }
        //on incrémente le compteur seulement quand le champs n'est pas vide 
        //donc considérer comme valider.
        compteur++; 
    }
    //si le champs de l'input est vide alors on 
    //affiche simplement l'erreur concernée.
    else
    {
        console.log("ok");
        document.getElementById("insert").insertAdjacentHTML("beforeend","<span id='danger'>Votre input est vide !</span>");
    }
});

function envoie_form()
{
    //inseres les valeurs des inputs du tableau dans le formulaire via des attr
    //envoie le formulaires suites a sa.
    for (i = 0; i < tab_id.length; i++ )
    {
        $("#"+tab_id[i]).attr("value",tableau_de_valeur[i]);
        $("form").submit();
    }
}