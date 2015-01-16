<?php
/* @var $this TipoCargoController */
/* @var $model TipoCargo */

$this->breadcrumbs = array(
    'Tipo Cargo' => array('admin'),
    'Crear',
);
?>

<h1>Crear Tipo Cargo</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>