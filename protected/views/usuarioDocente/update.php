<?php
/* @var $this UsuarioDocenteController */
/* @var $model UsuarioDocente */

$this->breadcrumbs=array(
	'Usuario Docentes'=>array('index'),
	$model->usuario->nombre . ' ' . $model->usuario->apellido_paterno,
	'Update',
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $model
)); 
?>

<?php $this->renderPartial('_form', array(
    'model'=>$model,
    'listTipoDocente'=> $listTipoDocente,
    'listTipoAreaEspecialidad'=> $listTipoAreaEspecialidad,
     'listTipoEstadoLaboralDocente'=> $listTipoEstadoLaboralDocente,
        
)); ?>