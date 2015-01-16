<?php

class SharedController extends Controller {

    public function actionAjaxRegion($id) {
        $this->layout = false;

        if ($id != '') {
            $criteria = new CDbCriteria;
            $criteria->compare('pais_id', $id);
            $aryRegion = Region::model()->findAll($criteria);

            if (count($aryRegion) > 0) {
                $response = CHtml::listData($aryRegion, 'region_id', 'nombre');
            } else {
                $response = CHtml::listData(array(), 'region_id', 'nombre');
            }

            $option = '';
            foreach ($response as $value => $name) {
                $option .= CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
            }

            echo $option;
        }
    }

    public function actionAjaxCiudad($id) {
        $this->layout = false;

        if ($id != '') {

            $criteria = new CDbCriteria;
            $criteria->compare('region_id', $id);
            $aryCiudad = Ciudad::model()->findAll($criteria);

            if (count($aryCiudad) > 0) {
                $response = CHtml::listData($aryCiudad, 'ciudad_id', 'nombre');
            } else {
                $response = CHtml::listData(array(), 'cuidad_id', 'nombre');
            }

            $option = '';
            foreach ($response as $value => $name) {
                $option .= CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
            }

            echo $option;
        }
    }

    public function actionAjaxComuna($id) {
        $this->layout = false;

        if ($id != '') {
        $criteria = new CDbCriteria;
        $criteria->compare('ciudad_id', $id);
        $aryComuna = Comuna::model()->findAll($criteria);

            if (count($aryComuna) > 0) {
                $response = CHtml::listData($aryComuna, 'comuna_id', 'nombre');
            } else {
                $response = CHtml::listData(array(), 'comuna_id', 'nombre');
            }

            $option = '';
            foreach ($response as $value => $name) {
                $option .= CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
            }

            echo $option;
        }
    }

}
