<?php
session_start();

$searchstring = trim($_GET['s']);
$searchstring = strip_tags($searchstring);
$searchstring = mysqli_real_escape_string($conn, $searchstring);
$searchstring = htmlspecialchars($searchstring);

if($searchstring != '') {
	$sql_alluser_query = "SELECT users.id, users.name, users.email, users.role FROM users 
						  WHERE users.name LIKE '%$searchstring%'
	                      OR users.email LIKE '%$searchstring%'
	                      OR users.role LIKE '%$searchstring%'
	                      LIMIT 50;";
} else {
	$sql_alluser_query = "SELECT id, name, email, role FROM users LIMIT 50;";
}

$sql_alluser_result = mysqli_query($conn, $sql_alluser_query);
$sql_alluser_resultCheck = mysqli_num_rows($sql_alluser_result);

if ($sql_alluser_resultCheck == 1){
    echo '<p class="uk-text-center uk-text-large">1 Suchergebnis f&uuml;r <strong>"' . $searchstring . '"</strong>:</p>
    <p class="uk-text-center"><a href="benutzerverwaltung">Filter löschen</a></p>'; 
} else if ($searchstring != ''){
    echo '<p class="uk-text-center uk-text-large">' . $sql_alluser_resultCheck . ' Suchergebnisse f&uuml;r <strong>"' . $searchstring . '"</strong>:</p>
    <p class="uk-text-center"><a href="benutzerverwaltung">Filter löschen</a></p>'; 
}

if($sql_alluser_resultCheck > 0){
	echo '<table class="uk-table uk-table-hover uk-table-divider uk-table-small">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>E-Mail</th>
			<th>Rolle</th>
		</tr>
	</thead>
	<tbody>
	';
	while($row_u = mysqli_fetch_assoc($sql_alluser_result)){
		echo '		<tr>
				<td>' . $row_u['id'] . '</td>' . '
				<td>' . $row_u['name'] . '</td>' . '
				<td>' . $row_u['email'] . '</td>' . '
				<td>' . $row_u['role'] . '</td>' . '
			  </tr>
			  ';
	}
	echo '</tbody>
		</table>';
} else {
	echo 'Keine Eintr&auml;ge';
}

?>