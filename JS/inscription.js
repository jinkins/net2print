$('#clientConnexionBouton').ajaxStart(function(request, settings) {
    $(this).attr("disabled", true)
});
$('#clientConnexionBouton').ajaxStop(function(request, settings) {
    $(this).attr("disabled", false)
});

function inscription()
{
    if ($("#cgv").prop("checked") == true)
    {
        
        if ($("#email").val() != '' && $("#mdp").val() != '' && $("#nom").val() != '' && $("#prenom").val() != '' && $("#rue").val() != '' && $("#numero").val() != '' && $("#cp").val() != '' && $("#localite").val() != '' && $('#tel').val() )
            $.ajax({
                type: 'POST',
                url: 'inscription2.php',
                data: "Email=" + $("#email").val()
                        + "&" + "MDP=" + $("#mdp").val()
                        + "&" + "Nom=" + $("#nom").val()
                        + "&" + "Prenom=" + $("#prenom").val()
                        + "&" + "Rue=" + $("#rue").val()
                        + "&" + "Numero=" + $("#numero").val()
                        + "&" + "CP=" + $("#cp").val()
                        + "&" + "Localite=" + $("#localite").val()
                        + "&" + "Societe=" + $("#societe").val()
                        + "&" + "Tel="+$('#tel').val()

                        ,
                dataType: 'xml',
                success: clientConnexionOK,
                error: function() {
                    alert('Nos serveurs ont rencontré un problème, merci de réessayer plus tard.');
                }
            });
            
        else
        {
            alert("Merci de remplir tous les champs. Seul le champ Société/Ecole peut être vide.");
        }
    }


    else
    {
        alert("Merci d'accepter les conditions générales de ventes");
    }
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