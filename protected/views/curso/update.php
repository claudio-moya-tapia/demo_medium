<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->curso_id=>array('view','id'=>$model->curso_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Curso', 'url'=>array('index')),
	array('label'=>'Create Curso', 'url'=>array('create')),
	array('label'=>'View Curso', 'url'=>array('view', 'id'=>$model->curso_id)),
	array('label'=>'Manage Curso', 'url'=>array('admin')),
);
?>

<h1>Update Curso <?php echo $model->curso_id; ?></h1>

<?php $this->renderPartial('_form', array(
         'model'=>$model,
        'ListAreaAcademica'=> $ListAreaAcademica,
        'ListEsOptativo'=> $ListEsOptativo,
        'ListDocente'=>$ListDocente,
        
        )); ?>