<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs = array(
    'Regiones' => array('admin','id'=>$model->pais_id),
    $model->nombre => array('view', 'id' => $model->region_id),
    'Actualizar',
);
?>

<h1>Actualizar Región #<?php echo $model->nombre; ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'listPais' => $listPais,
));
?>
