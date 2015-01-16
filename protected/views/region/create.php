<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs = array(
    'Regiones' => array('admin','id'=>$model->pais_id),
    'Crear',
);
?>

<h1>Crear Región</h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'listPais' => $listPais,
));
?>
