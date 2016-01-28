<h1>STRONA WIDOKU INDEX</h1>
<hr />
<p><?php echo $this->title; ?></p>
<br />
<h3>Uzytkownicy:</h3>
<table style="border-collapse: collapse;">
	<tr style="background: silver; color: #fff; text-transform: uppercase; font-weight: bold;">
		<td style="width: 50px;">id</td>
		<td style="width: 150px;">nazwa</td>
		<td style="width: 150px;">haslo</td>
	</tr>

<?php

foreach($this->users as $user){

echo '<tr style="border-bottom: 1px solid silver;">
		<td>'.$user['id'].'</td>
		<td>'.$user['name'].'</td>
		<td>'.$user['password'].'</td>
	</tr>
	';

}

?>

</table>