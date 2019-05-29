<div align="center">
<img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/c321da50288907.58cc4227d8dae.gif">
<h3 style="color:red;">Error!</h3>
<p>Ha ocurrido un error en el sistema al ingresar el registro a la base de datos. Por favor comuniquese con el administrador de la plataforma.</p>
<a href="<?=$url?>">Volver</a><br>
<br>
<p style="color: darkred;"><b>Query:</b></p>
<pre>
	<?=$sql;?>
</pre>
<h3>Mensaje del sistema: </h3>
<pre style="overflow-x: auto;width: 500px;"><?=$msg?></pre>
<div align="left" style="width: 400px;overflow-x:auto; ">
	<h3>En conflicto:</h3>
	<pre><?php print_r($bind); ?></pre>
</div>
<br>
</div>