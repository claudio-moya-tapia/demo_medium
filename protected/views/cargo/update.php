<?php
/* @var $this TipoCargoController */
/* @var $model TipoCargo */

$this->breadcrumbs = array(
    'Tipo Cargo' => array('admin'),
    $model->titulo => array('view', 'id' => $model->tipo_cargo_id),
    'Actualizar',
);
?>

<h1>Actualizar TipoCargo #<?php echo $model->titulo; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>