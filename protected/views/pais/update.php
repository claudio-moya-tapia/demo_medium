<?php
/* @var $this PaisController */
/* @var $model Pais */

$this->breadcrumbs = array(
    'Paises' => array('admin'),
    $model->nombre => array('view', 'id' => $model->pais_id),
    'Actualizar',
);
?>

<h1>Actualizar Pais #<?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>