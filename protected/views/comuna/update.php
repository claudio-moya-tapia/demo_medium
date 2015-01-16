<?php
/* @var $this ComunaController */
/* @var $model Comuna */

$this->breadcrumbs = array(
    'Comunas' => array('admin','pais_id'=>$model->pais_id,'region_id'=>$model->region_id,'ciudad_id'=>$model->ciudad_id),
    $model->nombre => array('view', 'id' => $model->comuna_id),
    'Actualizar',
);
?>

<h1>Actualizar Comuna #<?php echo $model->nombre; ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'listPais' => $listPais,
    'listRegion' => $listRegion,
    'listCiudad' => $listCiudad
));
?>