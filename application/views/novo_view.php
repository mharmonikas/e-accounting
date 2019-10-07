<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
 



 
<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
</style>
</head>
<body>
<center>

прикажи извештај по конто:
<?php echo form_open('novo/izbor');       ?>
<select name="izbor" value="partneri">
<option value="partneri"> 663</option>
<option value="kontent_plan">120</option>
<option value="nalog"> 100</option>
</select>
<input type="submit" value="прикажи">

<?php echo form_close(); ?>
<p>
<?php if(isset($records)): foreach($records as $row):?>
 
    <?php echo "<b>".$row->konto."</b>" ;?>
	 
	<?php endforeach; ?>
	<?php echo form_open('novo/test');       ?>
	<input type="submit" value="prikazi detalno">
	<?php echo form_close();?>

	<?php else : ?>
	
	<?php endif; ?>
	

<h3><p>dodadi element</h3>
<?php echo form_open('novo/dodadi');       ?>
opis<input type="text" name="opis"><br>
adresa<input type="text" name="adresa"><br>
grad<input type="text" name="grad"><br>
smetka<input type="text" name="smetka"><br>
telefon<input type="text" name="telefon"><br>
e-mail<input type="text" name="e-mail"><br>
direktor<input type="text" name="direktor"><br>
<input type="submit" value="zacuvaj">

<?php echo form_close(); ?>
</center>
</body>
</html>
 