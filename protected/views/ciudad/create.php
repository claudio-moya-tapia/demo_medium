<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs = array(
    'Ciudades' => array('admin','pais_id'=>$model->pais_id,'region_id'=>$model->region_id),
    'Create',
);
?>

<h1>Crear Ciudad</h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'listPais' => $listPais,
    'listRegion' => $listRegion
));
?>