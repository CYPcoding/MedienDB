<?php

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
			<th></th>
			<th>Rolle</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	';
	while($row_u = mysqli_fetch_assoc($sql_alluser_result)){
		echo '		<tr>
				<td>' . $row_u['id'] . '</td>' . '
				<td>' . $row_u['name'] . '</td>' . '
				<td>' . $row_u['email'] . '</td>' . '
				<td></td>' . '
				<td>' . $row_u['role'] . '</td>' . '
				<td></td>' . '
			  </tr>';
	} echo '
			  <form action="benutzerverwaltung" method="POST">
				  <tr>
					  <td></td>
					  <td>
					  	<input class="uk-input" type="text" name="newuserName" placeholder="Peter Muster" value="';
					  	if(isset($_POST['newuserName'])){ echo $_POST['newuserName']; }
					  	echo '">
					  </td>
					  <td>
					  	<input class="uk-input" type="text" name="newuserEmail" placeholder="peter.muster@example.ch" value="';
					  	if(isset($_POST['newuserEmail'])){ echo $_POST['newuserEmail']; }
					  	echo '">
					  </td>
					  <td>
					  	<input class="uk-input" type="password" name="newuserPassword" placeholder="Passwort" value="';
					  	if(isset($_POST['newuserPassword'])){ echo $_POST['newuserPassword']; }
					  	echo '">
					  </td>

					  <td>
					  	<select class="uk-select" name="newuserRole">
					  		<option value="Admin">Admin</option>
					  		<option value="User">User</option>
					  	</select>
					  </td>
					  <td>
					  	<button class="uk-button uk-button-primary" type="submit" name="newuserEntry">neuen Benutzer speichern</button>
					  </td>
				  </tr>
			  </form>
			  <?php
			  ';
	echo '</tbody>
		</table>
		<p><span class="uk-text-danger">' . $newusernameError . '<br>' . $newuseremailError . '<br>' . $newuserroleError . '</p>';
} else {
	echo 'Keine Eintr&auml;ge';
}

?>