<?php include ("dbconn.php");
include("header.php");


$sql1 = 'select concat_ws(" bis ", ter_beginn, ter_ende) as "Zeitraum", 
    concat_ws(" ", per_vname, per_nname) as "Patient", 
    concat_ws ("/", per_svnr, per_geburt) as "SVNr", 
    dia_name as "Diagnose" 
    from behandlungszeitraum NATURAL JOIN diagnose 
    NATURAL JOIN person 
    where per_svnr = "'.$_POST['per_svnr'].'"
    and per_geburt = "'.$_POST['per_geburt'].'"';

if($_POST['start'] == '' && $_POST['end'] == '') {
    echo "1";
    $sql2 = ';';
}   elseif ($_POST['start'] != '' && $_POST['end'] == '') {
    $sql2 = 'and ter_beginn > "'.$_POST['start'].'";';
    echo "2";
}   elseif ($_POST['start'] != '' && $_POST['end'] != '') {
    $sql2 = 'and ter_beginn > "'.$_POST['start'].'"
    and ter_ende < "'.$_POST['end'].'";';
    echo "3";
}


$sql = $sql1 . $sql2;
$result = mysqli_query($conn, $sql);
$results = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="container">
    <div class=" mt-5">
        <h2> Patienten - Diagnosen </h2>
        <p>Suchkriterien: </p>
        <p>SVNr: <?php echo $_POST['per_svnr'] ?>/<?php echo $_POST['per_geburt'] ?></p>
        <p>Startdatum: <?php echo $_POST['start'] ?></p>
        <p>Enddatum: <?php echo $_POST['end'] ?></p>
        
        
        <form method="post" action=""> 
            <table class="table">
        <thead>
            <tr>
                <th scope="col">Zeitraum</th>
                <th scope="col">Patient</th>
                <th scope="col">SVNr</th>
                <th scope="col">Diagnose</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $obj): ?>
                <tr>
                    <th scope="row"><?php echo $obj['Zeitraum'] ?></th>
                    <td><?php echo $obj['Patient'] ?></td>
                    <td><?php echo $obj['SVNr'] ?></td>
                    <td><?php echo $obj['Diagnose'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
        </form>
        
    </div>
</div>


<?php include("footer.php") ?>
