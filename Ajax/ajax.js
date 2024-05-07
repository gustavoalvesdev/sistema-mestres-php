$(document).ready(function() {
    // Captura url pelo meta base
    var page = $('meta[name=base]').attr('content');
    
    /*
     * CLIENTE
     */

    // Consultar Cliente

    $('body').on('click', "#btn_search", function(e){
        e.preventDefault();

        var form = $("#form_search");
        var form_data = form.serialize();

        var url = page+"Ajax/Clientes/Read.php";
		
        $.ajax({
            url: url,
            type: 'POST',
            data: form_data,
            dataType: 'JSON',

            success: function (data, textStatus, jqXHR) {

                if (data['status'] == 'success') {
                    $(".result").text('');
                    $(".result").prepend('<div id="status-container" class="status-top-right text-center"><div class="status status-' + data['status'] + '"><div class="status-message"><i class="fa fa-user"></i> '+data['message']+'</div></div></div>');

                } else if (data['status'] == 'info') {
                    $(".result").text('');
                    $(".result").prepend('<div id="status-container" class="status-top-right text-center"><div class="status status-' + data['status'] + '"><div class="status-message"><i class="fa fa-info-circle"></i>  '+data['message']+'</div></div></div>');

                } else if (data['status'] == 'warning') {
                    $(".result").text('');
                    $(".result").prepend('<div id="status-container" class="status-top-right text-center"><div class="status status-' + data['status'] + '"><div class="status-message"><i class="fa fa-triangle-exclamation"></i>  '+data['message']+'</div></div></div>');

                } else {
                    $(".result").text('');
                    $(".result").prepend('<div id="status-container" class="status-top-right text-center"><div class="status status-' + data['status'] + '"><div class="status-message"><i class="fa fa-times-circle"></i>  '+data['message']+'</div></div></div>');
                }

                setTimeout(function () {
                    $('#status-container').hide();
                    $('.loading').css('display', 'none');
                    
                }, 3000);

                // Trabalha com os dados vindos do PHP
                var register = data['cliente_cadastro'];
                var stat = data['cliente_status'];



                var mount = '<tr><td><p class="font-text-sub"><b>Cliente:</b></p><p>' + data['cliente_nome'] + '</p></td><td><p class="font-text-sub"><b>Cadastrado:</b></p><p>' + register + '</p></td><td><p class="font-text-sub"><b>E-mail:</b></p><p>' + data['cliente_email'] + '</p></td><td><p class="font-text-sub"><b>Status:</b></p><p class="font-text-sub">' + stat + '</p></td><td><p class="text-center"><a href="#" title="Visualizar e editar informações" class="radius btn_edit editClient" data-id="' + data['cliente_id'] + '"><i class="fa fa-pen"></i></a>&nbsp;&nbsp;<a href="#" title="Remover este registro" class="radius btn_delete deleteClient" data-id="' + data['cliente_id'] + '"><i class="fa fa-trash-alt"></i></a></p></td></tr>';
                $('.row').html(mount);
            }

        });
    });

    // Novo Cliente

    // Atualizar Dados do Cliente

    // Remover Cliente
})