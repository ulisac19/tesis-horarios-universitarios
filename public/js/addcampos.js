$(document).ready(function() {

    var MaxInputs       = 8; //Número Maximo de Campos
    var contenedor       = $("#contenedor"); //ID del contenedor
    var AddButton       = $("#agregarCampo"); //ID del Botón Agregar

    //var x = número de campos existentes en el contenedor
    var x = $("#contenedor div").length + 1;
    var FieldCount = x-1; //para el seguimiento de los campos

    $(AddButton).click(function (e) {
       
            FieldCount++;
            //agregar campo

            //$(contenedor).append('<div class="uk-grid uk-width-1-1"> <div class="uk-width-4-10"> <label class="uk-form-label">Codigo</label> <input type="text" name="mitexto[]" id="campo_'+ FieldCount +'" placeholder="Ingrese codigo" class="uk-width-1-1"> </div><div class="uk-width-4-10"> <label class="uk-form-label">Materia</label> <input type="text" disabled placeholder="" class="uk-width-1-1"> </div><div class="uk-width-2-10"> <label class="uk-form-label"> &nbsp;</label><br><button class="uk-button uk-button-danger eliminar"><i class="uk-icon-trash"></i> </button> </div></div>');
            $(contenedor).append('<div class="uk-grid uk-width-1-1"><div class="uk-width-8-10"> <label class="uk-form-label">Codigo - Materia - Seccion <em class="uk-text-danger">*</em></label> <input name="mitexto[]" id="campo_'+ FieldCount +'" type="text" placeholder="Ingrese codigo, materia y seccion" class="uk-width-1-1"> </div><div class="uk-width-1-10"> <label class="uk-form-label"> &nbsp;</label><br><button class="uk-button uk-button-danger eliminar"><i class="uk-icon-trash"></i> </button> </div></div>');
            x++; //text box increment
       
        return false;
    });

    $("body").on("click",".eliminar", function(e){ //click en eliminar campo
        if( x > 1 ) {
            $(this).parent('div').parent('div').remove(); //eliminar el campo
            x--;
        }
        return false;
    });
});