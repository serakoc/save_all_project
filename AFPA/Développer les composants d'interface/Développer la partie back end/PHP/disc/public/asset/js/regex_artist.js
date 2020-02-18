

$('#go').click(function(event)
{
    var name = $("#artist_name").val();
    var url = $("#url").val();
    var regText_space = /^[a-zA-Z\ \-_àèùâêîôéû]+$/;
    var regUrl = /^https?:\/\/www.[a-zA-Z-_]+.[a-zA-Z]{2,5}$/;
    
    if(!regText_space.test(name))
    {
        event.preventDefault();
        alert("name");
    }

    if(url !== "")
    {
        if(!regUrl.test(url))
        {
            event.preventDefault();
            alert("url");
            console.log(url);
        }
    }
    
});
