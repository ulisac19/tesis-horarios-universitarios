var x = $("#contenedor2 div").length + 1;
var FieldCount = x-1; 

    $(document).ready(function() {
        $('#agregarCampo3').click(function (e) {
            $("#contenedor2").append('<div class="uk-grid"><div class="uk-width-1-3">'+ '{!! Form::label("seccion") !!}'+ '{!! Form::input("text", "seccion_o", "", array("class"=>"uk-width-1-1", "placeholder"=>"Ejemplo: 1-9, 11, 14", "autocomplete" =>"off")) !!} '+ '<em class="uk-text-danger">'+'</em>' + '<span id="_seccion_o"></span>'+ '</div>'+ '<div class="uk-width-1-3">'+'{!! Form::label("Carrera") !!}<em class="uk-text-danger">*</em>'+ '{!! Form::select("Carrera", carrera::all()->lists("nombre", "id"), "", array("class"=>"uk-width-1-1" )) !!}<em class="uk-text-danger">'+'</em>' + '<span id="_carrera"></span></div>'+ '<div class="uk-width-1-10"><label class="uk-width-1-1" for="">&nbsp;</label><button class="uk-button uk-button-danger uk-width-1-1 eliminar2"><i class="uk-icon-trash"></i> </button></div> </div>'+ '</div>');
            return false;
        });

        $(".uk-grid").on("click",".eliminar2", function(e){ //click en eliminar campo
        
            $(this).parent('div').parent('div').remove(); //eliminar el campo
            x--;
        
        return false;   
    }); 


    });


