<?php
/* @var $this UsuarioNaturalController */
/* @var $model UsuarioNatural */

$this->breadcrumbs = array(
    'Persona' => array('usuario/view','id'=>$model->usuario_id),
    'Datos Personales' => array('list','id'=>$model->usuario_id),
    'Crear',
);
?>

<h1>Create Usuario Natural #<?php echo $model->usuario->rut.' '.$model->usuario->nombre.' '.$model->usuario->apellido_paterno.' '.$model->usuario->apellido_materno; ?></h1>

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
)); ?>