<?php
echo '
<style>
td {height: 100px;}
</style>

               <h4>Meine Verwendungseinträge:</h4>';
                
                $sql_licence = "SELECT img_usage.img_id,
                					   img_usage.licence_type,
                                       img_usage.purpose,
                                       users.name,
                                       img_usage.date,
                                       content_img.path
                                FROM img_usage
                                INNER JOIN users ON
                                    img_usage.user_id = users.id
                                INNER JOIN content_img ON
                                	img_usage.img_id = content_img.id
                                WHERE users.email='" . $_SESSION['email'] . "'
                                ORDER BY img_usage.id DESC;";
                $result_licence = mysqli_query($conn, $sql_licence);
                $resultCheck_licence = mysqli_num_rows($result_licence);

echo '
                
';

                    if($resultCheck_licence > 0){
                        echo '<table class="uk-table uk-table-hover uk-table-divider uk-table-small">
                    <thead>
                        <tr>
                        	<th>Bild-ID</th>
                        	<th class="uk-width-1-4"></th>
                            <th>Art</th>
                            <th>Zweck</th>
                            <th>Benutzer</th>
                            <th>Datum&nbsp;<span uk-icon="icon: arrow-down"></span></th>
                        </tr>
                    </thead>
                    <tbody>';
                        while($row_l = mysqli_fetch_assoc($result_licence)){
                            echo '
                                <tr>
                                	<td>' . $row_l['img_id'] . '</td>
                                	<td class="uk-cover-container">';
                                    // prevent image download with browser developer tools
                                    $image = 'assets/img/' . $row_l['path'];
                                    $type = pathinfo($image, PATHINFO_EXTENSION);
                                    $data = file_get_contents($image);
                                    $dataUri = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                    echo '<img src="' . $dataUri . '" uk-cover />';

                                    echo
                                    '</td>
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
</table>';


?>