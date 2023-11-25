function alerta(controle){
    alert("item atualizado!");

    var txt_id = $('#input_id'+controle).val();

    var txt_nome = $('#input_nome'+controle).text();

    var txt_desc = $('#input_des'+controle).text();

    $.ajax({
        url: "crud_ajax.php",
        type: "POST",
        data:{
            input_id: txt_id, input_nome: txt_nome, input_des: txt_desc
        },
        beforeSend : function(){
            $("#resposta").html("Enviando...").fadeOut("2000");
        }
    });

    $('#btn_update'+controle).fadeOut();
}

function deletes(){
    alert("item deletado!");
}