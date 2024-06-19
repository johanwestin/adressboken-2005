<table border="1" cellspacing="0" cellpadding="3">
<tr>
	<td><strong><a href="?o=n">Namn</strong></a></td>
	<td><strong><a href="?o=s">Stad</strong></a></td>
	<td><strong><a href="?o=l">Län</strong></a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>

<?php 
	foreach ($list as $value) { 

// använder &rnd=rand(1,200) 
// för att den inte ska cacha länkarna
// inte den smidigaste lösningen kanske men det fungerar. 



?>
<tr>
	<td>
		<a href="detaljer.php?id=<?php echo $value['id'] ?>&rnd=<?php echo rand(1,200); ?>"><?php echo $value['namn']; ?></a>
	</td>
	<td>
		<?php echo $value['stad']; ?>
	</td>
	<td>
		<?php echo $value['lan']; ?>
	</td>
	<td>
		<a href="form.php?id=<?php echo $value['id']; ?>&rnd=<?php echo rand(1,200); ?>">Redigera</a>
	</td>
	<td>
		<a href="?delete_id=<?php echo $value['id']; ?>&rnd=<?php echo rand(1,200); ?>">Radera</a>
	</td>
</tr>
<?php } ?>

</table>
<br/><br/>
<a href="form.php">Lägg till nytt ungdomsråd</a>
