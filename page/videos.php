<?php
session_start();

$searchstring = trim($_GET['s']);
$searchstring = strip_tags($searchstring);
$searchstring = mysqli_real_escape_string($conn, $searchstring);
$searchstring = htmlspecialchars($searchstring);


if($searchstring != '') {
    $sql_search_query = "SELECT DISTINCT content_vid.*
                         FROM content_vid
                         LEFT JOIN vid_to_tag ON
                                content_vid.id = vid_to_tag.vid_id
                         LEFT JOIN tags ON
                                tags.id = vid_to_tag.tag_id
                         WHERE tags.name LIKE '%$searchstring%'
                         OR content_vid.title LIKE '%$searchstring%'
                         OR content_vid.id = '$searchstring'
                         ORDER BY content_vid.id DESC
                         LIMIT 50;";
     $sql_video = $sql_search_query;
} else {
    $sql_video = "SELECT * FROM content_vid ORDER BY content_vid.id DESC LIMIT 50;";
}
$result_video = mysqli_query($conn, $sql_video);
$resultCheck = mysqli_num_rows($result_video);
?>
<div class="uk-margin uk-flex uk-flex-center" uk-grid>
    <div id="filters" class="uk-width-1-2@m uk-card uk-card-default uk-card-body uk-card-primary uk-width-medium" aria-hidden="true" hidden="hidden" align="center">
        <a class="uk-label" href="videos">ALLE</a>
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
    <p class="uk-text-center"><a href="videos">Filter löschen</a></p>'; 
} else if ($searchstring != ''){
    echo '<p class="uk-text-center uk-text-large">' . $resultCheck . ' Suchergebnisse f&uuml;r <strong>"' . $searchstring . '"</strong>:</p>
    <p class="uk-text-center"><a href="videos">Filter löschen</a></p>'; 
}
?>

<style>
td {height: 100px;}
</style>
<?php

if($resultCheck > 0){
echo '<table class="uk-table uk-table-hover uk-table-divider uk-table-small">
    <thead>
        <tr>
            <th>Video-ID</th>
            <th class="uk-width-1-4"></th>
            <th>Titel</th>
            <th>Tags</th>
        </tr>
    </thead>
    <tbody>';
    while($row = mysqli_fetch_assoc($result_video)) {
        $sql_tags = "SELECT vid_to_tag.vid_id, tags.name FROM vid_to_tag INNER JOIN tags ON vid_to_tag.tag_id=tags.id WHERE vid_to_tag.vid_id='" . $row['id'] . "';";
        $result_tags = mysqli_query($conn, $sql_tags);
        $resultCheck_tags = mysqli_num_rows($result_tags);
        
                echo '
                    <tr>
                        <td>
                            ' . $row['id'] . '
                        </td>
                        <td class="uk-cover-container">';
                        /* allow_url_fopen must be 1 or on for file_get_contents to work */
                        $link = $row['link'] . '.json';
                        $json = file_get_contents($link);
                        // $json = file_get_contents('https://cyp-media.wistia.com/medias/id0netygw2.json');
                        $obj = json_decode($json);
                        $imagepath = $obj->thumbnail->url;
                        echo '<img src="' . $imagepath . '" uk-cover />';

                        echo
                        '</td>
                        <td>
                            ' . $row['title'] . '
                            <br>
                            <div title="Abspielen" uk-tooltip="pos: bottom-left" style="display: inline;"><script src="https://fast.wistia.com/embed/medias/';
                            $linkonly = $row['link'];
                            $videoid = substr($linkonly, 36);
                            echo $videoid . '.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><span class="wistia_embed wistia_async_' . $videoid . ' popover=true popoverContent=link" style="display:inline"><a href="#" uk-icon="icon: play-circle; ratio: 1.5"></a></span></div>
                            <div title="Permalink" uk-tooltip="pos: bottom-left" style="display: inline;"><a href="' . $row['link'] . '" target="_blank" uk-icon="icon: link; ratio: 1.5"></a></div>
                            <div class="uk-inline" title="Einbettungscode" uk-tooltip="pos: bottom-left" style="display: inline;">
                                <a uk-icon="icon: code; ratio: 1.5"></a>
                                <div uk-dropdown="mode: click"><p style="font-family: \'Courier New\';">' . htmlspecialchars($row['code']) . '</p></div>
                            </div>
                        </td>
                        <td>';
                        if($resultCheck_tags > 0) {
                        while($row_t = mysqli_fetch_assoc($result_tags)){
                            echo '<span class="uk-label">' . $row_t['name'] . '</span>
                            ';
                            }
                        }
                        echo '</td>
                    </tr>
                    ';
    }
} else {
            echo 'Keine Eintr&auml;ge';
    }

echo '
    </tbody>
</table>';

?>
