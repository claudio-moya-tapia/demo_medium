<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs = array(
    'Personas' => array('admin'),
    $model->rut => array('view', 'id' => $model->usuario_id),
    'Actualizar',
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $model
));

$this->renderPartial('_form', array(
    'model' => $model,
    'listTipoFuenteIngreso' => $listTipoFuenteIngreso
));
?>