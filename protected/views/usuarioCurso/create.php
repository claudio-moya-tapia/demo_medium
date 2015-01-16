<?php
/* @var $this UsuarioCursoController */
/* @var $model UsuarioCurso */

$this->breadcrumbs=array(
	'Usuario Cursos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsuarioCurso', 'url'=>array('index')),
	array('label'=>'Manage UsuarioCurso', 'url'=>array('admin')),
);
?>

<h1>Create UsuarioCurso</h1>

<?php $this->renderPartial('_form', array(
    			'model'=>$model,
                        'ListCursos'=>$ListCursos,
                        'ListUsuarios'=>$ListUsuarios
        
        )); ?>