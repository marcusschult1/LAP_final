<?php
    include "dbconn.php";

    $sql = 'SELECT * FROM raumname';
    $result = mysqli_query($conn, $sql);
    $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
            <div class="container">
                <table class="table table-bordered w-100" style="margin-top: 5rem">
                    <thead>
                    <tr>
                        <th scope="col" style="color: white">#</th>
                        <th scope="col" style="color: white">First</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rooms as $object):?>
                    <tr <?php if ($object['rana_id'] == count($rooms)){echo 'style="background-color: lightcoral"';} ?> >
                        <th scope="row" style="color: white"><?php echo $object['rana_id']?></th>
                        <td style="color: white"><?php echo $object['rana_name']?></td>
                    </tr>
                    <?php endforeach; ?>
<!--                    <tr style="background-color: lightcoral">-->
<!--                        <th>test</th>-->
<!--                        <td>test</td>-->
<!---->
<!--                    </tr>-->

                    </tbody>
                </table>
<!--                --><?php //echo gettype($object['rana_id']) ?>



            </div>
