<?php
session_start();
require_once 'db-connect.php';
 
// if session is not set this will redirect to login page
if( !isset($_SESSION['email']) ) {
    header("Location: page/login.php");
    exit;
}
 
// select loggedin users detail
$query = "SELECT * FROM users WHERE email=".$_SESSION['email'];
$result = mysqli_query($conn,$query);
$userRow = mysqli_num_rows($result);

?>
<div uk-grid>
	<div class="uk-width-1-2@m">
		<ul class="uk-subnav uk-subnav-pill"  uk-margin>
	    	<li class="uk-active"><a href="#">Bilder</a></li>
	    	<li><a href="#">Videos</a></li>
		</ul>
	</div>

	<div id="filters" class="uk-width-1-2@m" align="right">
        <?php
        $sql_tags = "SELECT * FROM tags;";
        $result_tags = mysqli_query($conn, $sql_tags);
        $resultCheck = mysqli_num_rows($result_tags);

        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result_tags)){
                echo '<a class="uk-label">' . $row['name'] . '</a>';
            }
        }
        ?>
	</div>
</div>

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

<div class="grid">

<?php
    $sql_img = "SELECT * FROM content_img;";
    $result_img = mysqli_query($conn, $sql_img);
    $resultCheck = mysqli_num_rows($result_img);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result_img)){
            echo '<a href="#m'. $row['id'] . '" uk-toggle>';
            echo '<div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
            <div class="uk-inline"><img src="assets/img/' . $row['path'] . '" /></div>';
            echo '<div class="uk-overlay uk-position-bottom">
        <span class="uk-label">BFE</span> <span class="uk-label">Banking</span>
      </div></div></a>';
        }
    }
    $result_img_m = mysqli_query($conn, $sql_img);
    if($resultCheck > 0){
        while($row_m = mysqli_fetch_assoc($result_img_m)){
            echo '<div id="m' . $row_m['id'] . '" class="uk-modal-container" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <button class="uk-modal-close-outside" type="button" uk-close></button>
                <div class="uk-modal-body" uk-grid>
                    <div class="uk-width-2-3@m">
                         <img src="assets/img/' . $row_m['path'] . '" />
                    </div>
                    <div class="uk-width-1-3@m">
                        <ul class="uk-list uk-list-large uk-list-divider">
                            <li>' . $row_m['size'] . '</li>
                            <li>Tags: <span class="uk-label">BFE</span></li>
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
                                    <select class="uk-select">
                                        <option>Online</option>
                                        <option>Print</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="uk-input" type="text" placeholder="Zweck">
                                </td>
                                <td>
                                    <input class="uk-input" type="text" placeholder="Sabrina Thoma" disabled>
                                </td>
                                <td>
                                    <input class="uk-input" type="text" placeholder="' . date("d.m.Y") . '" disabled>
                                </td>
                                <td>
                                    <button class="uk-button uk-button-primary">Download</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h4>Verwendung:</h4>
                    <table class="uk-table uk-table-hover uk-table-divider uk-table-small">
                        <thead>
                            <tr>
                                <th>Art</th>
                                <th>Zweck</th>
                                <th>Benutzer</th>
                                <th>Datum</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Print</td>
                                <td>Inserat Cash</td>
                                <td>Simone Jeker</td>
                                <td>18.12.16</td>
                            </tr>
                            <tr>
                                <td>Print</td>
                                <td>Inserat 20Min</td>
                                <td>Simone Jeker</td>
                                <td>02.12.16</td>
                            </tr>
                            <tr>
                                <td>Online</td>
                                <td>Inserat 20Min</td>
                                <td>Vlado Repic</td>
                                <td>03.02.16</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
</div>';
        }
    }


?>

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