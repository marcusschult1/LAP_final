<?php include("header.php") ?>

<div class="container">
    <div class=" mt-5 w-50">
        <h2> Patienten - Diagnosen</h2>
        <form method="post" action="result_patients.php"> 
            <div class="form-group"> 
                <label>SV-Nr. </label>
                <input name="per_svnr" type="text" required>
            </div>
            <div class="form-group"> 
                <label>Geburtsdatum: </label>
                <input name="per_geburt" type="date" required>
            </div>
            <h2>Behandlungszeitraum</h2>
            <div class="form-group"> 
                <label>Start: </label>
                <input name="start" type="date">
            </div>
            <div class="form-group"> 
                <label>Ende: </label>
                <input name="end" type="date">
            </div>
            
            <button class="btn btn-dark" type="submit" value="submit" name="submit" style="float: right">Suchen</button>

        </form>
        
    </div>
</div>

<?php include("footer.php") ?>