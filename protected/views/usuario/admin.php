<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs = array(
    'Personas' => array('admin'),
    'Administrar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Personas</h1>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'usuario-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
//		'usuario_id',
//		'sexo_id',
        'rut',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
//		'fecha_nacimiento',
//		'fecha_creacion',	
//		'identidad_id',
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array
                (
                'update' => array(
                    'url' => '$this->grid->controller->createUrl("/usuario/update", array("id"=>$data->usuario_id))',                
                ),
            ),
        ),
    ),
));
?>

<?php echo CHtml::link(CHtml::encode('Crear'), array('create'), array('class' => 'boton-admin')); ?>
