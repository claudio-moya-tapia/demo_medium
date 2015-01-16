<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs = array(
    'Ciudades' => array('admin'),
    $model->nombre => array('view', 'id' => $model->ciudad_id),
    'Actualizar',
);
?>

<h1>Actualizar Ciudad #<?php echo $model->nombre; ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'listPais' => $listPais,
    'listRegion' => $listRegion
));
?>