<?php
/* @var $this UsuarioCursoController */
/* @var $model UsuarioCurso */

$this->breadcrumbs=array(
	'Usuario Cursos'=>array('index'),
	$model->usuario_cuso_id=>array('view','id'=>$model->usuario_cuso_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsuarioCurso', 'url'=>array('index')),
	array('label'=>'Create UsuarioCurso', 'url'=>array('create')),
	array('label'=>'View UsuarioCurso', 'url'=>array('view', 'id'=>$model->usuario_cuso_id)),
	array('label'=>'Manage UsuarioCurso', 'url'=>array('admin')),
);
?>

<h1>Update UsuarioCurso <?php echo $model->usuario_cuso_id; ?></h1>

<?php $this->renderPartial('_form', array(
   			'model'=>$model,
                        'ListCursos'=>$ListCursos,
                        'ListUsuarios'=>$ListUsuarios
        )); ?>