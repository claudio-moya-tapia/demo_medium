<?php
/* @var $this ClubController */
/* @var $model Club */

$this->breadcrumbs=array(
	'Clubs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Club', 'url'=>array('index')),
	array('label'=>'Manage Club', 'url'=>array('admin')),
);
?>

<h1>Create Club</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>