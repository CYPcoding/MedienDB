<?php
session_start();
$_SESSION['page'] = 'videos';
// header('Set-Cookie: fileLoading=true');

echo '
<div class="uk-margin uk-flex uk-flex-center" uk-grid>
    <div id="filters" class="uk-width-1-2@m uk-card uk-card-default uk-card-body uk-card-primary uk-width-medium" aria-hidden="true" hidden="hidden" align="center">
        <a class="uk-label" href="overviewimg">ALLE</a>';
        
        $sql_tags = "SELECT * FROM tags;";
        $result_tags = mysqli_query($conn, $sql_tags);
        $resultCheckVidTag = mysqli_num_rows($result_tags);

        if($resultCheckVidTag > 0){
            while($row = mysqli_fetch_assoc($result_tags)){
                echo '<a class="uk-label" href="?s=' . $row['name'] . '">' . $row['name'] . '</a>
                ';
            }
        }
        ?>
    </div>
</div>

<?php

?>
