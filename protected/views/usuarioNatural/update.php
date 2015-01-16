<?php
/* @var $this UsuarioNaturalController */
/* @var $model UsuarioNatural */

$this->breadcrumbs = array(
    'Personas' => array('usuario/admin'),
    'Persona' => array('usuario/view','id'=>$model->usuario_id),    
    'Datos Personales' => array('view', 'id' => $model->usuario_id),
    'Actualizar',
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $model
));
?>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'listEstadoCivil' => $listEstadoCivil,
    'listPais' => $listPais,
    'listRegion' => $listRegion,
    'listCiudad' => $listCiudad,
    'listComuna' => $listComuna,
    'aryTelefonoCodigo'=> $aryTelefonoCodigo,
    'aryCelularCodigo'=> $aryCelularCodigo,
    'listTipoEstadoUsuario' => $listTipoEstadoUsuario,
));
?>