<?php

class StringFormat extends CApplicationComponent {

    /**
     * 
     * @param string $telefono
     * @return string Telefono con formato
     * @package application.components
     */
    public function applyFecha($fecha) {
        list($year, $month, $day) = explode('-', $fecha);
        return $day . '-' . $month . '-' . $year;
    }

    /**
     * 
     * @param type $telefono
     * @return string
     */
    public function clearFecha($fecha) {
        list($day, $month, $year) = explode('-', $fecha);
        return $year . '-' . $month . '-' . $day;
    }

    /**
     * 
     * @param string $telefono
     * @return string Telefono con formato
     * @package application.components
     */
    public function applyTelefono($telefono) {
        $telefonoFijoStr = '';

        for ($i = 0; $i < strlen($telefono); $i++) {

            if ($i == 1 || $i == 4) {
                $telefonoFijoStr .= '-';
            }
            $telefonoFijoStr .= $telefono[$i];
        }

        return $telefonoFijoStr;
    }

    /**
     * 
     * @param type $telefono
     * @return string
     */
    public function clearTelefono($telefono) {
        return str_replace('-', '', $telefono);
    }

    /**
     * 
     * @param string $telefono
     * @return string Telefono con formato
     * @package application.components
     */
    public function applyCelular($telefono) {
        $telefonoFijoStr = '';

        for ($i = 0; $i < strlen($telefono); $i++) {

            if ($i == 1 || $i == 5) {
                $telefonoFijoStr .= '-';
            }
            $telefonoFijoStr .= $telefono[$i];
        }

        return $telefonoFijoStr;
    }

    /**
     * 
     * @param type $telefono
     * @return string
     */
    public function clearCelular($telefono) {
        return str_replace('-', '', $telefono);
    }
    
    /**
     * 
     * @param string $string
     * @return string String con cualquier formato
     * @package application.components
     */
    public function applyCamelcase($string) {
        return ucfirst(mb_strtolower($string,'UTF-8'));
    }
    
         
    public function applyUnderCase($string) {
        
       return ucfirst(mb_strtolower($string,'UTF-8'));
    }

             
    public function resetNum($string) {
       $var = str_replace('-','',$string);
       $vari = str_replace('.','',$var);
       $variable = str_replace(' ','',$vari);
       return ucfirst(mb_strtolower(trim($variable),'UTF-8'));
    }
}

?>