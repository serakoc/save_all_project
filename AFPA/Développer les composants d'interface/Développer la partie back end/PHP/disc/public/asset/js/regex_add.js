$("#go").click(
function verification(evenement)
{
    var titre = $('#Title').val();
    var year = $('#year').val();
    var label = $('#label').val();
    var artist_id = $('#artist').val();
    var prix = $('#price').val();

    var regTextOnly = /^[a-zA-Z\ ]+$/;
    var regNumOnly = /^[0-9]+$/;
    var regDecimal = /^[0-9]+\.?[0-9]{0,2}$/;

    if(!regTextOnly.test(titre))
    {
        alert("title error");
        evenement.preventDefault();
    }

    if(!regNumOnly.test(year))
    {
        alert("year error");
        evenement.preventDefault();
    }

    if(!regTextOnly.test(label))
    {
        alert("label error");
        evenement.preventDefault();
    }

    if(!regNumOnly.test(artist_id))
    {
        alert("artist error");
        evenement.preventDefault();
    }

    if(!regDecimal.test(prix))
    {
        alert("prix error");
        evenement.preventDefault();
    }
});