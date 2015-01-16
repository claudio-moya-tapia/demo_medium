<?php
/* @var $this UsuarioDocenteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuario Docentes',
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $model
)); 
?>

<h1>Usuario Docentes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
