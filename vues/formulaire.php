<!-- Modal -->
<div class="modal fade" id="ModFom" tabindex="-1" aria-labelledby="h1" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title fs-5" id="h1">Nouvel Utilisateur</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            
            <!-- <form id="formulaire" method="POST"> -->

                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nom"  placeholder="Nom">
                        <label for="nom">Nom</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="prenom"  placeholder="Prénom">
                        <label for="prenom">Prenom</label>
                    </div>

                    <select class="form-select mb-3" id="filiere" placeholder="Filière">
                        <option value="MRH">MRH</option>
                        <option value="SIL">SIL</option>
                        <option value="RIT">RIT</option>
                        <option value="SPRI">SPRI</option>
                    </select>

                    <div class="form-floating ">
                        <input type="text" class="form-control" id="scolarite"  placeholder="Scolarité">
                        <label for="scolarite">Scolarité</label>
                    </div>

                    <input type="text" disabled id="idE">

                </div>

                <div class="modal-footer">

                    <button type="button" id="submit" class="btn btn-primary">Enregistrer</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    
                </div>

            <!-- </form> -->

        </div>

    </div>

</div>

