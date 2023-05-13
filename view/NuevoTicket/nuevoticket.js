function init(){
    $("#ticket_form").on("submit",function(e){
        guardaryeditar(e);
    });
}
$(document).ready(function() {
    $('#tick_descrip').summernote({
        height:200
    });

    //Llenar el combo de la categoria
    $.post("../../controllers/categoria.php?op=combo",function(data, status){
        $('#cat_id').html(data)
    });
});

function guardaryeditar(e){
    e.preventDefault();
    /* Array del form ticket */
    var formData = new FormData($("#ticket_form")[0]);
        /* Utilizando Ajax Guardar Ticket */
        $.ajax({
            url: "../../controllers/ticket.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                $('#tick_titulo').val('');
                $('#tick_descrip').summernote('reset');
                swal("Correcto!", "Registrado Correctamente", "success");
            }
        });
    
}

init();