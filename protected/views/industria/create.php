<?php
/* @var $this IndustriaController */
/* @var $model Industria */

$this->breadcrumbs = array(
    'Industrias' => array('admin'),
    'Crear',
);
?>

<h1>Crear Industria</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>