<?php
session_start();

$searchstring = trim($_GET['s']);
$searchstring = strip_tags($searchstring);
$searchstring = mysqli_real_escape_string($conn, $searchstring);
$searchstring = htmlspecialchars($searchstring);

if ($searchstring != '') {
    $sql_search_query = "SELECT DISTINCT content_img.*
                FROM content_img
                INNER JOIN img_to_tag ON
                       img_to_tag.img_id = content_img.id
                INNER JOIN tags ON
                       tags.id = img_to_tag.tag_id
                WHERE tags.name LIKE '%$searchstring%'
                OR content_img.id ='$searchstring' 
                ORDER BY content_img.id DESC
                LIMIT 100;";
    $sql_img = $sql_search_query;
} else {
    $sql_img = "SELECT * FROM content_img ORDER BY content_img.id DESC LIMIT 50;";
}

$result_img = mysqli_query($conn, $sql_img);
$resultCheck = mysqli_num_rows($result_img);
?>
<div class="uk-margin uk-flex uk-flex-center" uk-grid>
    <div id="filters" class="uk-width-1-2@m uk-card uk-card-default uk-card-body uk-card-primary uk-width-medium" aria-hidden="true" hidden="hidden" align="center">
        <a class="uk-label" href="bilder">ALLE</a>
        <?php
        $sql_tags = "SELECT * FROM tags;";
        $result_tags = mysqli_query($conn, $sql_tags);
        $resultCheckTag = mysqli_num_rows($result_tags);

        if($resultCheckTag > 0){
            while($row = mysqli_fetch_assoc($result_tags)){
                echo '<a class="uk-label" href="?s=' . $row['name'] . '">' . $row['name'] . '</a>
                ';
            }
        }
        ?>
    </div>
</div>
<?php
if ($resultCheck == 1){
    echo '<p class="uk-text-center uk-text-large">1 Suchergebnis f&uuml;r <strong>"' . $searchstring . '"</strong>:</p>
    <p class="uk-text-center"><a href="bilder">Filter löschen</a></p>'; 
} else if ($searchstring != ''){
    echo '<p class="uk-text-center uk-text-large">' . $resultCheck . ' Suchergebnisse f&uuml;r <strong>"' . $searchstring . '"</strong>:</p>
    <p class="uk-text-center"><a href="bilder">Filter löschen</a></p>'; 
}
?>

<style>
* { box-sizing: border-box; }

/* force scrollbar */
html { overflow-y: scroll; }

/* ---- grid ---- */
/* clear fix */
.grid:after {
  content: '';
  display: block;
  clear: both;
}

/* ---- .grid-item ---- */

.grid-item {
  width: 20%;
}

.grid-item {
  float: left;
}

.grid-item img {
  display: block;
  max-width: 100%;
}
</style>

<div class="grid uk-large-margin body">
<?php

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result_img)){
            $sql_tags = "SELECT img_to_tag.img_id, tags.name FROM img_to_tag INNER JOIN tags ON img_to_tag.tag_id=tags.id WHERE img_to_tag.img_id='" . $row['id'] . "';";
            $result_tags = mysqli_query($conn, $sql_tags);
            $resultCheck_tags = mysqli_num_rows($result_tags);
            echo '
    <!---------------------------------------------------------
         START: Bild (ID) ' . $row['id'] . ' --->
    <a href="#m'. $row['id'] . '" uk-toggle>
        <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
            <div class="uk-inline">';
            // prevent image download with browser developer tools
            $image = 'assets/img/' . $row['path'];
            $type = pathinfo($image, PATHINFO_EXTENSION);
            $data = file_get_contents($image);
            $dataUri = 'data:image/' . $type . ';base64,' . base64_encode($data);
            echo '<img src="' . $dataUri . '" />';

            echo '</div>
            <div class="uk-overlay uk-position-bottom">';
                if($resultCheck_tags > 0){
    while($row = mysqli_fetch_assoc($result_tags)){
        echo '<span class="uk-label">' . $row['name'] . '</span>
        ';
    }
}
echo '
            </div>
        </div>
    </a>
    <!-- ENDE: Bild (ID) ' . $row['id'] . ' 
    ----------------------------------------------------------->
    ';
        }
    }
    $result_img_m = mysqli_query($conn, $sql_img);
    if($resultCheck > 0){
        while($row_m = mysqli_fetch_assoc($result_img_m)){
            if ($searchstring != '') {
                $sql_tags = "SELECT img_to_tag.img_id, tags.name FROM img_to_tag INNER JOIN tags ON img_to_tag.tag_id=tags.id WHERE img_to_tag.img_id='" . $row_m['id'] . "';";
            } else {
                $sql_tags = "SELECT img_to_tag.img_id, tags.name FROM img_to_tag INNER JOIN tags ON img_to_tag.tag_id=tags.id WHERE img_to_tag.img_id='" . $row_m['id'] . "';";
            }
            $result_tags = mysqli_query($conn, $sql_tags);
            $resultCheck_tags = mysqli_num_rows($result_tags);

            echo '

    <!---------------------------------------------------------
         START: Modal-Box für Bild (ID) ' . $row_m['id'] . ' --->

    <div id="m' . $row_m['id'] . '" class="uk-modal-container" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <button class="uk-modal-close-outside" type="button" uk-close></button>
            <div class="uk-modal-body" uk-grid>
                <div class="uk-width-2-3@m uk-inline">';
                    // prevent image download with browser developer tools
                    $image = 'assets/img/' . $row_m['path'];
                    $type = pathinfo($image, PATHINFO_EXTENSION);
                    $data = file_get_contents($image);
                    $dataUri = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    echo '<img src="' . $dataUri . '" />';
                echo '
                    <div class="uk-overlay uk-light uk-position-center">
                        <p>Copyright &copy; CYP Association</p>
                        <p>&nbsp;</p>
                        <p>Copyright &copy; CYP Association</p>
                        <p>&nbsp;</p>
                        <p>Copyright &copy; CYP Association</p>
                    </div>
                </div>
                <div class="uk-width-1-3@m">
                    <ul class="uk-list uk-list-large uk-list-divider">
                        <li>Bildnummer (ID): ' . $row_m['id'] . '</li>
                        <li>' . $row_m['size'] . '</li>
                        <li>Tags: ';
                         if($resultCheck_tags > 0){
                            while($row_t = mysqli_fetch_assoc($result_tags)){
                                echo '<span class="uk-label">' . $row_t['name'] . '</span>
                                ';
                            }
                        }
echo '
    </li>
                    </ul>
                    
                        <br><br><br><br><br>Lizenz:
                        <ul class="uk-list uk-list-large uk-list-divider">
                            <li>' . $row_m['licence_online'] . '</li>
                            <li>' . $row_m['licence_print'] . '</li>
                        </ul>
                    
                </div>
            </div>
            <div class="uk-modal-footer">
                <h4>Dieses Bild neu verwenden:</h4>
                <form action="page/function/purpose_entry.php" method="POST">
                    <table class="uk-table uk-table-hover uk-table-divider uk-table-small">
                        <thead>
                            <tr>
                                <th>Art</th>
                                <th>Zweck</th>
                                <th>Benutzer</th>
                                <th>Datum</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="uk-select" name="licencetype">
                                        <option value="online">Online</option>
                                        <option value="print">Print</option>
                                    </select>
                                </td>
                                <td>';
                                ?>
                                    <input class="uk-input" type="text" name="purpose" placeholder ="Zweck" value="<?php if(isset($_POST['purpose'])){ echo $_POST['purpose']; } ?>" required><br>
                                    <span class="uk-text-danger"><?php echo $purposeError; ?></span>
                                    <?php echo '
                                    <input name="imgid" value="' . $row_m['id'] . '" type="hidden" >
                                </td>
                                <td>
                                    <input class="uk-input" type="text" name="username" placeholder="' . $userName . '" disabled>
                                </td>
                                <td>
                                    <input class="uk-input" type="text" name="date" placeholder="' . date("d.m.Y") . '" disabled>
                                </td>
                                <td>
                                    <button class="uk-button uk-button-primary" type="submit" name="licencedownload">Download</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>

                <h4>Verwendung:</h4>';
                
                $sql_licence = "SELECT img_usage.id,
                                       img_usage.licence_type,
                                       img_usage.purpose,
                                       users.name,
                                       img_usage.date
                                FROM img_usage
                                INNER JOIN users ON
                                    img_usage.user_id = users.id
                                WHERE img_usage.img_id='" . $row_m['id'] . "'
                                ORDER BY img_usage.id DESC;";
                $result_licence = mysqli_query($conn, $sql_licence);
                $resultCheck_licence = mysqli_num_rows($result_licence);

echo '
                
';

                    if($resultCheck_licence > 0){
                        echo '<table class="uk-table uk-table-hover uk-table-divider uk-table-small">
                    <thead>
                        <tr>
                            <th>Art</th>
                            <th>Zweck</th>
                            <th>Benutzer</th>
                            <th>Datum</th>
                        </tr>
                    </thead>
                    <tbody>';
                        while($row_l = mysqli_fetch_assoc($result_licence)){
                            echo '
                                <tr>
                                    <td>' . $row_l['licence_type'] . '</td>
                                    <td>' . $row_l['purpose'] . '</td>
                                    <td>' . $row_l['name'] . '</td>';
                                    $licence_date = date_create($row_l['date']); echo '
                                    <td>' . date_format($licence_date, 'd.m.Y') . '</td>
                                </tr>
                                ';
                        } 
                    } else {
                            echo 'Keine Eintr&auml;ge';
                        }

echo '
    </tbody>
</table>

            </div>
        </div>
    </div>

    <!-- ENDE: Modal-Box für Bild (ID) ' . $row_m['id'] . ' 
    ----------------------------------------------------------->
            ';
        }
    }
?>

</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://unpkg.com/packery@2/dist/packery.pkgd.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js"></script>
<script>
// external js: packery.pkgd.js, imagesloaded.pkgd.js

// init Packery
var $grid = $('.grid').packery({
  itemSelector: '.grid-item',
  percentPosition: true
});
// layout Packery after each image loads
$grid.imagesLoaded().progress( function() {
  $grid.packery();
});  

</script>

<?php

?>
