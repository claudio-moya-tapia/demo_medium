<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs = array(
    'Empresas' => array('admin'),
    $model->nombre,
);
?>

<h1>Detalle Empresa #<?php echo $model->nombre; ?></h1>

<div class="form">
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'empresa_id',
            array(
                'label' => 'Pais',
                'value' => $model->pais->nombre
            ),
            array(
                'label' => 'Region',
                'value' => $model->region->nombre
            ),
            array(
                'label' => 'Ciudad',
                'value' => $model->ciudad->nombre
            ),
            array(
                'label' => 'Comuna',
                'value' => $model->comuna->nombre
            ),
            array(
                'label' => 'Tipo de Sociedad',
                'value' => $model->tipo_sociedad->titulo
            ),
            'rut',
            'nombre',
            'direccion',
            'url',
              array(
                'label' => 'Codigo Postal',
                'value' => $model->codigo_postal
            ),
              array(
                'label' => 'Razón Social',
                'value' => $model->razon_social
            ),
              array(
                'label' => 'Tipo de Giro',
                'value' => $model->tipo_giro_id->titulo
            ),
            array(
                'label' => 'Tipo de Antiguedad',
                'value' => $model->tipo_antiguedad->titulo
            ),
            array(
                'label' => 'Rango Empleado',
                'value' => $model->rango_empleado->titulo
            ),
            array(
                'label' => 'Rango Utilidad',
                'value' => $model->rango_utilidad->titulo
            ),
            array(
                'label' => 'Rango Perdida',
                'value' => $model->rango_perdida->titulo
            ),
            array(
                'label' => 'Rango Facturacion',
                'value' => $model->rango_facturacion->titulo
            ),
            array(
                'label' => 'fono fijo',
                'value' => $model->telefono_fijo
            ),
            array(
                'label' => 'fono movil',
                'value' => $model->telefono_celular
            ),
            array(
                'label' => 'fono fax',
                'value' => $model->telefono_fax
            ),
            array(
                'label' => 'email',
                'value' => $model->email
            ),
        ),
    ));
    ?>
    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->empresa_id)); ?>
        </div>        
    </div>

</div>