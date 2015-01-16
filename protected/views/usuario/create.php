<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Personas'=>array('admin'),
	'Crear',
);
?>

<h1>Crear Persona</h1>

<ul class="tabs">
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Persona'), array('usuario/admin'), array('class' => 'tab-select')); ?>
    </li>
</ul>
<div class="clear"></div>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'listTipoFuenteIngreso' => $listTipoFuenteIngreso
));
?>