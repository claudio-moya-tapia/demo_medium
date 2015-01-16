<?php
/* @var $this UsuarioDocenteController */
/* @var $model UsuarioDocente */

$this->breadcrumbs = array(
    'Usuario Docentes' => array('index'),
    'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-docente-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administracion Usuario Docentes</h1>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'usuario-docente-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'usuario_id',
            'value' => '$data->usuario->rut',
            'value'=>'CHtml::link($data->usuario->rut, array("usuario/".$data->usuario_id))',
            'type' => 'raw',
            ),
        array(
            'name' => 'usuario_id',
            'value' => '$data->usuario->nombre. " " .$data->usuario->apellido_paterno. " " .$data->usuario->apellido_materno',
            'type' => 'raw',
            'filter'=>false,
        ),
        array(
            'name' => 'tipo_docente_id',
            'value' => '$data->tipo_docente->titulo',
            'type' => 'raw',
        ),
        array(
            'name' => 'tipo_area_especialidad_id',
            'value' => '$data->tipo_area_especialidad->titulo',
            'type' => 'raw',
        ),
        array(
            'name' => 'tipo_estado_laboral_docente_id',
            'value' => '$data->tipo_estado_laboral_docente->titulo',
            'type' => 'raw',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array
                (
                'view' => array(
                    'url' => '$this->grid->controller->createUrl("/usuarioDocente/view", array("id"=>$data->usuario->usuario_id))',
                ),
                'update' => array(
                    'url' => '$this->grid->controller->createUrl("/usuarioDocente/update", array("id"=>$data->usuario->usuario_id))',
                ),
                'delete' => array(
                    'url' => '$this->grid->controller->createUrl("/usuarioDocente/delete", array("id"=>$data->usuario->usuario_id))',
                ),
            ),
        ),
    ),
));
?>