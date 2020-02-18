$("#delete").click(function(e)
{
    if(!window.confirm("Voulez-vous réellement supprimer cet article ?"))
        e.preventDefault();
});