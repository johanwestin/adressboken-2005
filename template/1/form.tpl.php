<?php if($inlagt == 1) { ?>
Ungdomsråd inlagt, skriv in info om nästa råd eller gå <a href="search.php">tillbaka till listan</a><br/><br/>
<?php } ?>
<style>
body {
	background-color: #ccc;
}
</style>
<form method="post" name="register">

<div id="allmant" class="formfloat">
<strong>Om Ungdomsrådet:</strong><br/>
	<div class="float"> 
	    Namn: <br/>
	    <input type="text" value="<?php echo $i['namn'] ?>" name="namn"><br/>
	    Stad:<br/>
	    <input type="text" value="<?php echo $i['stad'] ?>" name="stad"><br/>
	    Län: <br/>
	    <input type="text" value="<?php echo $i['lan'] ?>" name="lan"><br/>
	</div>
	<div class="float">
	    Hemsida: <br/>
	    <input type="text" value="<?php echo $i['hemsida'] ?>" name="hemsida"><br/>
	    Epost: <br/>
	    <input type="text" value="<?php echo $i['epost'] ?>" name="epost"><br/>
	    Wikisida: <br/>
	    <input type="text" value="<?php echo $i['wiki'] ?>" name="wiki"><br/>
		<input style="width: 10px;" name="medlem" type="checkbox" value="1"<?php if($i['medlem'] == 1) echo "checked";?>> Medlem i Sveriges Ungdomsmråd
	</div>

</div>

<div id="adress" class="formfloat">
	<strong>Postadress:</strong><br/>

	<div class="float">
		Namn: <br/>
		<input type="text" value="<?php echo $i['adress_namn'] ?>" name="adress_namn">
	</div>

	<div class="float">
		Gata: <br/>
		<input type="text" value="<?php echo $i['adress_gata'] ?>" name="adress_gata">
	</diV>

	<div class="float">
		<div class="thin-float" id="postnr">
			Postnr: <br/>
			<input type="text" value="<?php echo $i['adress_postnr'] ?>" name="adress_postnr" size="6">
		</div>
		<div class="thin-float">
			Stad: <br>
			<input type="text" value="<?php echo $i['adress_stad'] ?>" name="adress_stad" size="10">
		</div>
	</div>

</div>

<div id="kontaktpersoner" class="formfloat">
<strong>Kontaktpersoner:</strong><br/>

	<div id="vuxen" class="float">
		<strong>Vuxen kontaktperson:</strong><br/>
		Namn: <br/>
		<input type="text" value="<?php echo $i['vuxen_namn'] ?>" name="vuxen_namn"><br/>
		Epost: <br/>
		<input type="text" value="<?php echo $i['vuxen_epost'] ?>" name="vuxen_epost"><br/>
		Telefon: <br/>
		<input type="text" value="<?php echo $i['vuxen_telefon'] ?>" name="vuxen_telefon">  <br/>
		Mobil: <br/>
		<input type="text" value="<?php echo $i['vuxen_mobil'] ?>" name="vuxen_mobil">  <br/>
	</div>

	<div id="ungdom" class="float">
		<strong>Ungdom kontaktperson:</strong><br/>
		Namn: <br/>
		<input type="text" value="<?php echo $i['ungdom_namn'] ?>" name="ungdom_namn"><br/>
		Epost: <br/>
		<input type="text" value="<?php echo $i['ungdom_epost'] ?>" name="ungdom_epost"><br/>
		Telefon: <br/>
		<input type="text" value="<?php echo $i['ungdom_telefon'] ?>" name="ungdom_telefon"><br/>
		Mobil: <br/>
		<input type="text" value="<?php echo $i['ungdom_mobil'] ?>" name="ungdom_mobil"><br/>
	</div>
</div>




<div id="other" class="formfloat">
	<strong>Presentation:</strong><br/>
	<div class="float">
		Presentation:<br/>
		<textarea name="presentation" rows="10" cols="35"><?php echo $i['presentation'] ?></textarea>
	</div>
	<div class="float">
		Verksamhet: <br/>
		<textarea name="verksamhet" rows="10" cols="35"><?php echo $i['verksamhet'] ?></textarea>
	</div>
</div>

<div id="medlemmar" class="formfloat">
	<strong>Medlemmar:</strong><br/>
	<div class="float">
		Antal:<br/>
		<input type="text" value="<?php echo $i['antal'] ?>" name="antal" size="2">
	</div>
	<div class="float">
		Hur ansluts medlemmar:<br/>
		<textarea name="ansluter" rows="1" cols="35"><?php echo $i['ansluter'] ?></textarea>
	</div>
</div>


<div id="save" class="float">
    <input type="submit" value="Spara" name="submit"><br/>
</div>



</form>
