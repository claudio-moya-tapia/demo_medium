<?php
/* @var $this TipoAntiguedadController */
/* @var $model TipoAntiguedad */

$this->breadcrumbs = array(
    'Antiguedad' => array('admin'),
    $model->titulo => array('view', 'id' => $model->tipo_antiguedad_id),
    'Actualizar',
);
?>

<h1>Actualizar Antiguedad #<?php echo $model->titulo; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>