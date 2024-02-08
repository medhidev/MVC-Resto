<h1>Formulaire de création de resto</h1>
<input type="text" placeholder="Nom du resto" name="nomR"><br><br>

<input type="number" name="numAdr" style="width: 35px; height: 23px;" placeholder="N°">
<input type="voieAdr" name="numAdr" style="width: 300px; height: 23px;" placeholder="Adresse">
<input type="number" name="cpR" style="width: 100px; height: 23px;" placeholder="code postale">
<input type="text" name="villeR" style="width: 100px;" placeholder="Ville"><br><br>

<textarea name="descR" cols="77" rows="10" placeholder="description restaurant"></textarea><br><br>

<h1>Horaire d'ouverture</h1>
<form action="#" method="post">
    <table>
        <thead>
            <tr>
                <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="label">Midi</td>
                <td class="cell">de <input type="time" name="heureDebMidiSem"><br><br>
                à <input type="time" name="heureFinMidiSem"></td>

                <td class="cell">de <input type="time" name="heureDebMidiWeek"><br><br>
                à <input type="time" name="heureFinMidiWeek"></td>
            </tr>
            <tr>
                <td class="label">Soir</td>
                <td class="cell">de <input type="time" name="heureDebSoirSem"><br><br>
                à <input type="time" name="heureFinSoirSem"></td>

                <td class="cell">de <input type="time" name="heureDebSoirWeek"><br><br>
                à <input type="time" name="heureFinSoirWeek"></td>
            </tr>
            <tr>
                <td class="label">À emporter</td>
                <td class="cell">de <input type="time" name="heureDebEmpSem"><br><br>
                à <input type="time" name="heureFinEmpSem"></td>

                <td class="cell">de <input type="time" name="heureDebEmpWeek"><br><br>
                à <input type="time" name="heureFinEmpWeek"></td>
            </tr>
        </tbody>
    </table><br>

    <input name="creerResto" type="submit" value="Créer" style="width: 100px;">
</form>