<?php
/* @var $this RangoPerdidaController */
/* @var $model RangoPerdida */

$this->breadcrumbs = array(
    'Perdidas' => array('admin'),
    'Crear',
);
?>

<h1>Crear Perdida</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>