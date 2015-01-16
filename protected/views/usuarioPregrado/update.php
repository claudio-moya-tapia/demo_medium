<?php
/* @var $this UsuarioPregradoController */
/* @var $model UsuarioPregrado */

$this->breadcrumbs = array(
    'Personas' => array('usuario/admin'),
    'Persona' => array('usuario/view', 'id' => $model->usuario_id),
    'Datos Pregrado' => array('list', 'id' => $model->usuario_id),
    $usuario->rut,
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $usuario
));

$this->renderPartial('_form', array(
    'model'=>$model,
    'usuario'=>$usuario,
    'listInstitucion' => $listInstitucion,
    'listCarreras' => $listCarreras,
       
)); 

?>