
<style>
    /* Styles pour les boutons personnalisés */
    .button {
        /* couleur */
        background-color: #d82264;
        color: white;
        border: none;


        display: inline-block;
        width: 100px;
        height: 20px;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 13px;
        text-align: center;
        line-height: 20px;
    }

    /* Styles pour cacher le bouton de fichier */
    .hidden-input {
        display: none;
    }   
</style>

<form action="#" method="post">
    <h1>Formulaire de création de resto</h1>

    <input type="text" placeholder="Nom du resto" name="nomR" required><br><br>

    <!-- Bouton personnalisé -->
    <label for="imageUpload" class="button">Image resto</label>
    <input type="file" accept="image/*" name="imageUpload" id="imageUpload" class="hidden-input" onchange="previewImage(event)"><br><br><br>

    <!-- preview de l'image (optionnel) -->
    <img id="preview" src="#" alt="Image preview" style="max-width: 300px; max-height: 300px;"><br><br>
    
    <!-- Script de préview de l'image (à développer en compréhension) -->
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var preview = document.getElementById('preview');
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script><br>

    <input type="number" name="numAdr" style="width: 35px; height: 23px;" placeholder="N°" required>
    <input type="voieAdr" name="nomAdr" style="width: 300px; height: 23px;" placeholder="Adresse" required>
    <input type="number" name="cpR" style="width: 100px; height: 23px;" placeholder="code postale" required>
    <input type="text" name="villeR" style="width: 100px;" placeholder="Ville" required><br><br>
    <textarea name="descR" cols="77" rows="10" placeholder="description restaurant" required></textarea><br><br>

    <h1>Horaire d'ouverture</h1>
    <table>
        <thead>
            <tr>
                <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="label">Midi</td>
                <td class="cell">de <input type="time" name="heureDebMidiSem" required><br><br>
                à <input type="time" name="heureFinMidiSem" required></td>

                <td class="cell">de <input type="time" name="heureDebMidiWeek" required><br><br>
                à <input type="time" name="heureFinMidiWeek" required></td>
            </tr>
            <tr>
                <td class="label">Soir</td>
                <td class="cell">de <input type="time" name="heureDebSoirSem" required><br><br>
                à <input type="time" name="heureFinSoirSem" required></td>

                <td class="cell">de <input type="time" name="heureDebSoirWeek" required><br><br>
                à <input type="time" name="heureFinSoirWeek" required></td>
            </tr>
            <tr>
                <td class="label">À emporter</td>
                <td class="cell">de <input type="time" name="heureDebEmpSem" required><br><br>
                à <input type="time" name="heureFinEmpSem" required></td>

                <td class="cell">de <input type="time" name="heureDebEmpWeek" required><br><br>
                à <input type="time" name="heureFinEmpWeek" required></td>
            </tr>
        </tbody>
    </table><br>

    <input name="creerResto" class="button" type="submit" value="Créer" style="height: 40px;">
</form>