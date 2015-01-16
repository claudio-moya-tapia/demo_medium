<?php
/* @var $this IndustriaController */
/* @var $model Industria */

$this->breadcrumbs = array(
    'Industrias' => array('admin'),
    $model->titulo => array('view', 'id' => $model->industria_id),
    'Actualizar',
);
?>

<h1>Actualizar Industria #<?php echo $model->titulo; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>