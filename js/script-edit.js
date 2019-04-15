$(document).ready(function(){
    let fileHtml = '<label for="task">Ajouter une image :</label>' +
        '<input type="file"' +
        'class="form-control-file"' +
        'id="imgTodo" name="imgTodo" />';
    $("#btn-add-img").click(function(){
        $(this).hide();
        $("#edit-form").attr("enctype","multipart/form-data");
        $("#file-group-container").html(fileHtml);
    });
    $("#btn-delete-img").click(function(){
        $("#img-btn-group").hide();
        $("#current-img").attr("src","./images/default.jpg");
        $("#edit-form").attr("enctype","multipart/form-data");
        $("#file-group-container").html(fileHtml).append('<input type="hidden" name="delete" value="true"/>');
    });
    $("#btn-change-img").click(function(){
        $("#img-btn-group").hide();
        $("#edit-form").attr("enctype","multipart/form-data");
        $("#file-group-container").html(fileHtml);
    });
});