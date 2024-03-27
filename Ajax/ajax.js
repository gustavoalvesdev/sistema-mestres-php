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
                    if (data['redirect'] != '') {
						
                        window.location.href = data['redirect'];
                    }
                }, 3000);

            }

        });
    });

    // Novo Cliente

    // Atualizar Dados do Cliente

    // Remover Cliente
})