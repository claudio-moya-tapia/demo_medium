<?php
/* @var $this TipoAntiguedadController */
/* @var $model TipoAntiguedad */

$this->breadcrumbs = array(
    'Antiguedad' => array('admin'),
    'Crear',
);
?>

<h1>Crear Antiguedad</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>