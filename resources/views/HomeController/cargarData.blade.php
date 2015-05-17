<?php 
use App\Models\Seccion;
use App\Models\Horasxmateria;
use App\Models\Tipomateria;
 $cursor = Seccion::getSecciones($id);
 $cadena = "";
$i = 0;
    if(isset($cursor))
    { 
         foreach( $cursor as $item ){
            $checkedOn = $checkedOff = "";
            if($item->es_grupo > 0)
                $checkedOn = "checked";
            else
                $checkedOff = "checked";

            $cadena = $cadena.'
                <input type="hidden" name="identificador[]" id="identificador_'.$id.'" value="'.$item->id.'" />
                <tr>
                <td>'.$item->materia->nombre.'</td>
                <td>'.$item->numero.'</td>
                <td>'.$item->materia->codigo.'</td>
                <td>'.Horasxmateria::getUnidadesCredito($item->materia->unidades_credito).'</td>
                <td>'.Tipomateria::getNombre($item->materia->requiere_laboratorio).'</td>
                <td><input type="radio" id="form-s-r1" name="radio'.$i.'" '.$checkedOff.' value="0" > <label for="form-s-r1">No </label><label><input '.$checkedOn.' value="1" name="radio'.$i.'" type="radio"> Si</label></td>

            </tr>';
            $i++;
            }
     }
     if($cadena == "")
    echo '<br><div class="uk-alert uk-alert-success uk-width-1-1" data-uk-alert><a href="" class="uk-alert-close uk-close"></a><p>No hay secciones en este semestre</p></div>';
        else
     echo $cadena;
 
?>
