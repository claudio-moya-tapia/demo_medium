<?php
/* @var $this ClubController */
/* @var $model Club */

$this->breadcrumbs=array(
	'Clubs'=>array('index'),
	$model->club_id=>array('view','id'=>$model->club_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Club', 'url'=>array('index')),
	array('label'=>'Create Club', 'url'=>array('create')),
	array('label'=>'View Club', 'url'=>array('view', 'id'=>$model->club_id)),
	array('label'=>'Manage Club', 'url'=>array('admin')),
);
?>

<h1>Update Club <?php echo $model->club_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>