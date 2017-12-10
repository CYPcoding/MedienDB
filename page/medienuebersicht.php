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
        $sql = "SELECT * FROM tags;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
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
  <a href="#media001" uk-toggle>
    <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
      <div class="uk-inline">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/orange-tree.jpg" />
      </div>
      <div class="uk-overlay uk-position-bottom">
        ><span class="uk-label">BFE</span> <span class="uk-label">Banking</span>
      </div>
      
    </div>
  </a>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/submerged.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/one-world-trade.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/drizzle.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/cat-nose.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/contrail.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/golden-hour.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/flight-formation.jpg" />
  </div>  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/submerged.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/one-world-trade.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/drizzle.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/cat-nose.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/contrail.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/golden-hour.jpg" />
  </div>
  <div class="grid-item uk-card uk-card-small uk-box-shadow-hover-xlarge">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/flight-formation.jpg" />
  </div>
</div>


<div id="media001" class="uk-modal-container" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <button class="uk-modal-close-outside" type="button" uk-close></button>
                <div class="uk-modal-body" uk-grid>
                    <div class="uk-width-2-3@m">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/orange-tree.jpg" alt="" />
                    </div>
                    <div class="uk-width-1-3@m">
                        <ul class="uk-list uk-list-large uk-list-divider">
                            <li>Grösse: 1920 x 720 px</li>
                            <li>Tags: <span class="uk-label">BFE</span></li>
                        </ul>
                        
                            <br><br><br><br><br>Lizenz:
                            <ul class="uk-list uk-list-large uk-list-divider">
                                <li>Bigstockphoto 185421579 - online</li>
                                <li>Bigstockphoto 142157681 - print</li>
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
                                    <input class="uk-input" type="text" placeholder="<?php echo date("d.m.Y"); ?>" disabled>
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