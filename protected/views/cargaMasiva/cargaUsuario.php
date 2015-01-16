<h1>Carga masiva Usuarios</h1>
<div class="wpcontent">Carga masiva de usuarios</div>

<form action="/yii/project/puc_dev/cargaMasiva/cargaUsuario" method="post" enctype="multipart/form-data">
    <input type="file" name="CargaUsuario[usuariosCSV]" /><br>
    <input type="submit" name="CargaUsuario[cargaUsuario]" value="Enviar" />
</form>

<p><?php echo $msg; ?></p>