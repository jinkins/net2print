$('#clientConnexionBouton').ajaxStart(function(request, settings) {
    $(this).attr("disabled", true)
});
$('#clientConnexionBouton').ajaxStop(function(request, settings) {
    $(this).attr("disabled", false)
});

function clientConnexion()
{
    console.log("Envoi");
    $.ajax({
        type: 'POST',
        url: 'connexion.php',
        data: "Email=" + $("#un").val()
                + "&" + "MDP=" + $("#pw").val(),
        dataType: 'xml',
        success: clientConnexionOK,
        error: function() {
            alert('Nos serveurs ont rencontré un problème, merci de réessayer plus tard.');
        }
    });
}

function clientConnexionOK(reponse)
{
    var code;
    code = $(reponse).find("code").text();

    if (code == 1)
    {
        document.location.href = "index.php";
    }

    else
    {
        alert($(reponse).find("texte").text());
    }
}
