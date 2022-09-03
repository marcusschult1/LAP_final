<?php

include "dbconn.php";

$sql = 'show tables from '.$_POST['database'];
$result = mysqli_query($conn, $sql);
$db = mysqli_fetch_all($result, MYSQLI_ASSOC);

//session_start();
$_SESSION['test1'] = $_POST['database']
?>

<?php include('header.php') ?>

	    <div class="container" style="margin-top: 3rem; margin-bottom: 15rem">
			<h2>Inside Database "<?php echo $_SESSION['test1'] ?>"</h2>
	        <form method="post" action="tableinfo.php">
	            <table class="table table-bordered w-100" style="margin-top: 5rem">
	                <thead>
	                <tr>
	                    <th scope="col" style="color: black">#</th>
	                    <th scope="col" style="color: black">First</th>
	                    <th>Auswahl</th>
	                </tr>
	                </thead>
	                <tbody>
	                <?php foreach ($db as $object): ?>
	                    <tr>
	                        <th scope="row" style="color: black"></th>
	                        <td style="color: black"><?php echo $object['Tables_in_'.$_POST['database']] ?></td>
	                        <td style="color: black">
	                            <input type="radio" checked="checked" value="<?php echo $object['Tables_in_'.$_POST['database']] ?>" id="html" name="table">
	                        </td>
	                    </tr>
	                <?php endforeach; ?>
	                </tbody>
	            </table>
	            <div class="container">
	                <button class="btn btn-dark" type="submit" onclick="form.action='tableinfo.php'" value="submit" name="submit" style="float: right; margin-left: 3rem">Details Anzeigen</button>
	                <button class="btn btn-dark" type="submit" onclick="form.action='tablecontent.php'" value="submit" name="content" style="float: right">Inhalt Anzeigen</button>
	            </div>
	        </form>
	    </div>

<?php include('footer.php') ?>