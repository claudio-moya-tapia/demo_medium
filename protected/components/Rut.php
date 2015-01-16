<?php
class Rut extends CApplicationComponent{
        
    public function addFormat($rut){        
        
        $revRut = strrev($rut);
        
        for($i=0;$i<strlen($revRut);$i++){
            
            if($i == 0){
                $rutFormato = $revRut[$i].'-';
            }else{
                $rutFormato .= $revRut[$i];
            }
                        
            if($i == 3){
                $rutFormato .= '.';
            }
            
            if($i == 6){
                $rutFormato .= '.';
            }
        }
        
        return strrev($rutFormato);        
    }
        
    public function deleteFormat($rut){    
        $rut = str_replace('.', '', $rut);
        $rut = str_replace('-', '', $rut);
        return ($rut);
    }
    
    public function searchFormat($rut){        
        $revRut = strrev($rut);
        
        for($i=0;$i<strlen($revRut);$i++){
            
            if($i == 0){
                $rutFormato = $revRut[$i].'-';
            }else{
                $rutFormato .= $revRut[$i];
            }            
        }
        
        return strrev($rutFormato);        
    }
}
?>