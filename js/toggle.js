$(document).ready(function() { // le script se lance une fois que le DOM     est pret
//     $(':checkbox').change(function(){ //detection du changement d'état
//         var done = 0; // départ du boutton toggle
//         var id = $(this).attr('name'); // récupére l'id via la BDD sur quel btn le clic est fait
//
//         if ($(this).is(':checked')){ // si le btn cliqué est checké
//             done = 1; // on passe la variable done à envoyé en bdd a 1
//         }
//
//         $.ajax({ //appel ajax
//             url: '../fait.php', //sur quelle page on envoei les infos
//             method: 'POST', //par quelle method
//             data: {'fait': done, 'id': id}, //formatage des données pour les envoyés en objet
//
//             success: function () { // si succes reload de la page
//
//             },
//             error: function () { // simple alert en cas d'erreur
//                 alert('votre requete à échoué');
//             }
//         })
//
//     })
// });
    $(".toggleBtn").change(function () {
        let state = $(this).prop("checked");
        let idTodo = $(this).attr("data-value");
        $.ajax({
            url: "../fait.php ",
            type: "POST",
            data: {
                id: idTodo,
                state: state,
            }
        }).then(function(response){
            let result = response.updated;
            if(result === "success") {
                toastr.success('la tâche a été mise à jour.');
                let todo = response.todo, updatedAt = todo.updated_at;
                $(".todo-updated-at", $("#todo-row-id-" + idTodo)).text(updatedAt);
            }else {
                toastr.info('la tâche sélectionnée n\'est pas disponible.');
            }

        }).catch(function () {
            toastr.error('contacter l\'administrateur système.', 'une erreur est survenue');
        });
    });
});