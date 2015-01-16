<?php
/* @var $this UsuarioPregradoController */
/* @var $model UsuarioPregrado */

$this->breadcrumbs = array(
    'Personas' => array('usuario/admin'),
    'Persona' => array('usuario/view', 'id' => $usuario->usuario_id),
    'Datos Pregrados' => array('list', 'id' => $usuario->usuario_id),
    $usuario->rut,
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $usuario
));

$this->renderPartial('_form', array(
    'model' => $model,
    'usuario' => $usuario,
    'listInstitucion' => $listInstitucion,
    'listCarreras' => $listCarreras,
));
?>