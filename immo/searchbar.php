<?php

include "dbconn.php";

if (isset($_POST['submit'])) {
    $sql_first = 'select objekt.obj_id,
		objekt.obj_strasse_nr,
                strasse.str_name,
                plz.plz_id,
                ort.ort_name,
                preis.pre_betrag,
                bezug.bez_am,
                handel.han_name,
                flaechen.fla_gesamt
        from objekt
        left outer join bezug on objekt.obj_id = bezug.obj_id
        inner join preis on objekt.obj_id = preis.obj_id
        inner join strasse on objekt.str_id = strasse.str_id
        inner join plz on strasse.plz_plz_id = plz.plz_id
        natural join ort
        natural join handel
        inner join flaechen on objekt.obj_id = flaechen.obj_id';

    if ($_POST['att'] == 'fla_gesamt'){
        $sql_extend = ' where fla_gesamt >= '.$_POST['test2'];
    } elseif ($_POST['att'] == 'obj_wohnflaeche') {
        $sql_extend = ' where obj_wohnflaeche >= '.$_POST['test2'];
    } elseif ($_POST['att'] == 'pre_betrag') {
        $sql_extend = ' where pre_betrag <= 2*'.$_POST['test2'];
    } else {
        $sql_extend = ' where '.$_POST['att'].' like "%'.$_POST['test2'].'%";';
    }

    $sql = $sql_first . $sql_extend;
    $result = mysqli_query($conn, $sql);
    $realestates = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<form method="post" action="searchresults.php">
        <div class="container" style="margin-top: 200px">
            <div class="container" style="float: right">
                <label style="color: white" for="html_">Ort</label><input style="margin-right: 0.7rem" type="radio" id="html_" value="ort_name" checked="checked" name="att">
                <label style="color: white" for="html_">PLZ </label><input style="margin-right: 0.7rem" type="radio" id="html_" value="plz_id" name="att">
                <label style="color: white" for="html_">Straßenname </label><input style="margin-right: 0.7rem" type="radio" id="html_" value="str_name" name="att">
                <label style="color: white" for="html_">Preis </label><input style="margin-right: 0.7rem" type="radio" id="html_" value="pre_betrag" name="att">
                <label style="color: white" for="html_">Wohnfläche (ab Suchwert)</label><input style="margin-right: 0.7rem" type="radio" id="html_" value="obj_wohnflaeche"  name="att">
                <label style="color: white" for="html_">Grundstücksgröße (Gesamtgröße ab Suchwert)</label><input style="margin-left: 0.7rem" type="radio" id="html_" value="fla_gesamt"  name="att">
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Suchbegriff: </span>
                </div>
                <input name="test2" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>


            <div class="container">
                <button class="btn btn-light" type="submit" value="submit" name="submit" style="float: right">Suchen</button>
            </div>



        </div>
    </form>