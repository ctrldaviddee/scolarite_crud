$(() => {

/**=================================================================================================================== */

    function Afficher_la_table() {

        $.ajax({

            url: 'controlleurs/operations.php',

            method: 'POST',

            dataType: 'JSON',

            data: { action : 'Afficher_la_table'},

            success : function(data){

                if (Array.isArray(data) && data.length > 0) {

                    var lignes = "";

                    $.each(data, function(index, element){
    
                        lignes += `<tr>
                                        <th scope="row">${index + 1}</th>
                                        <td>${element.nom}</td>
                                        <td>${element.prenom}</td>
                                        <td>${element.filiere}</td>
                                        <td>${element.scolarite}</td>
                                        <td>
                                            <button class="btn delete" title="Supprimer" data-id="${element.id}">
                                                <i class="fa-solid fa-trash-alt text-danger"></i>
                                            </button>

                                            <button class="btn edit" data-bs-target="#ModFom" data-bs-toggle="modal" title="Éditer" data-id="${element.id}">
                                                <i class="fa-solid fa-edit text-info"></i>
                                            </button>
                                        </td>

                                    </tr>`;
    
    
                    });
    
                $('#table').html(lignes);

                } else {
                    console.log("Invalid or empty data received from the server");

                }


            },

            error : function(message) {

                console.log(arguments);
                console.log('Error: ' + message);

            }

        });
    }


    /** =========================================================================================================== */

    $(document).on('click', 'button.delete', function(e){

        e.preventDefault();

        var id = $(this).data('id');

        if(confirm('Voulez-vous vraiment supprimer')){

            $.ajax({

                url: 'controlleurs/operations.php',

                method : 'GET',

                dataType : 'JSON',

                data : {id : id, action : 'supprimer'},

                success : function(ligne) {
                    
                    if(ligne.del){

                        $('#resultat').html("Supprimé").fadeIn().delay(2000).fadeOut();

                        Afficher_la_table();
                    }else {
                        console.log(ligne.error); 
                    }
                    
                },

                error : function(error){
                    console.log(arguments);
                    console.log('Error  ' + error);
                }

            });

        }


    });

    /** ************************************************************************************************* */

    $(document).on('click', 'button.edit', function(){

        var id = $(this).data('id');

        $.ajax({

            url : 'controlleurs/operations.php',

            method : 'GET',

            dataType : 'json',

            data : { id : id, action : 'modifier'},

            success : function(ligne){

                if(ligne){

                    $('#nom').val(ligne.nom);
                    $('#prenom').val(ligne.prenom);
                    $('#filiere').val(ligne.filiere);
                    $('#scolarite').val(ligne.scolarite);
                    $('#idE').val(ligne.id);

                    $('.modal-title').text('Modifier Utilisateur');

                    $('#submit').text('Mettre à Jour');
                }

            },

            error : function(error){

                console.log(arguments);

                console.log('Error ' + error);
            },

        });

    });

    $('#ajouter').on('click', function(){

                $('#nom').val("");
                $('#prenom').val("");
                $('#filiere').val("MRH");
                $('#scolarite').val("");
                $('#idE').val("");

                $('.modal-title').text('Nouvel Utilisateur');

            $('#submit').text('Enregistrer');

});


    /** ******************************************************************************************************* */
    $(document).on('click', '#submit', function () {



        var nom = $('#nom').val();
        var prenom = $('#prenom').val();
        var filiere = $('#filiere').val();
        var scolarite = $('#scolarite').val();
        var id = $('#idE').val();

        $.ajax({

            url: 'controlleurs/operations.php',

            method: 'POST',

            data: {

                nom: nom,
                prenom: prenom,
                filiere: filiere,
                scolarite: scolarite,
                id : id,
                action: 'enregistrer'
            },

            success: function (data, status) {

                if (data.insert) {
                    $('#resultat').html(' ' + 'Enregistrement réussi');
                } else if (data.update) {
                    $('#resultat').html(' ' + 'Mise à jour réussie');
                }

                $('#ModFom').modal('hide');

                $('#nom').val("");
                $('#prenom').val("");
                $('#filiere').val("");
                $('#scolarite').val("");
                $('#idE').val("");

                Afficher_la_table();

            },

            error: function (error) {

                console.log(arguments);

                console.log("Error: " + error);

            },

        });
        $('#resultat').fadeIn().delay(1300).fadeOut();
    });

    /** ======================================================================================================= */

    Afficher_la_table();

});

