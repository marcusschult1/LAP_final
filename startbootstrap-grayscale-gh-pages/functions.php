<?php
include 'dbconn.php';
$connection = $conn;

function makeDropDown($query, $Name) {
    global $connection;


    $result = mysqli_query($connection, $query);
    $person = mysqli_fetch_all($result, MYSQLI_ASSOC);

    ?>
<!--    <div>-->
<!--        --><?php //echo $person?>
<!--    </div>-->
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $Name ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item">TEst</a>
<!--            --><?php //foreach ($person as $item): ?>
<!--                <a class="dropdown-item" href="#">--><?php //echo $item['vname'] ?><!--</a>-->
<!--            --><?php //endforeach;?>
        </div>
    </div>



    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown button
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </div>

    <select>
                    <?php foreach ($person as $item): ?>
                        <option><?php echo $item['vname'] ?></option>
                    <?php endforeach;?>
    </select>

<?php
}