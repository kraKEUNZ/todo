$(document).ready(function() { // le script se lance une fois que le DOM     est pret
    $(':checkbox').change(function(){ //detection du changement d'état
        var done = 0; // départ du boutton toggle
        var id = $(this).attr('name'); // récupére l'id via la BDD sur quel btn le clic est fait

        if ($(this).is(':checked')){ // si le btn cliqué est checké
            done = 1; // en passe la variable done à envoyé en bdd a 1
        }

        $.ajax({ //appel ajax
            url: '../fait.php', //sur quelle page on envoei les infos
            method: 'POST', //par quelle method
            data: {'fait': done, 'id': id}, //formatage des données pour les envoyés en objet

            success: function () { // si succes reload de la page

            },
            error: function () { // simple alert en cas d'erreur
                alert('votre requete à échoué');
            }
        })

    })
});

