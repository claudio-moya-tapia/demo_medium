<?php
/* @var $this PaisController */
/* @var $model Pais */

$this->breadcrumbs = array(
    'Paises' => array('admin'),
    'Crear',
);
?>

<h1>Crear Pais</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>