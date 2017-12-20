<?php

$sql = "SELECT content_img.id, content_img.path, COUNT(content_img.id) AS c
		FROM img_usage
		INNER JOIN content_img
		ON content_img.id = img_usage.img_id
		GROUP BY img_id
		ORDER BY COUNT(img_id) DESC
		LIMIT 10;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0) {
	echo '
	<style>
	td {height: 100px;}
	</style>
	<h1>Rangliste Top 10 in Verwendung</h1>
	<table class="uk-table uk-table-hover uk-table-divider">
	<thead>
		<tr>
			<th>ID</th>
			<th class="uk-width-1-4"></th>
			<th># in Verwendung</th>
		</tr>
	</thead><tbody>';
	while($row = mysqli_fetch_assoc($result)) {
		echo '<tr>
				<td>' . $row['id'] . '</td>
				<td class="uk-cover-container"><img src="assets/img/' . $row['path'] . '" uk-cover /></td>
				<td>' . $row['c'] . '</td>
			  </tr>';
	}
	echo '</tbody>
	</table>';
}

?>