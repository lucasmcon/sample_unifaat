var refresh = setInterval(function() {    
    var at_in_id = $('#at_in_id').val();
    $.get("../pages/atendimento_detalhado_espera.php", {at_in_id}, function(data){    
        $('#tempoEspera').html(data); // .html é uma função que carrega retornos em html
    })
}, 350);

$('#at_st_nome').blur(function(){
    if($('#at_st_nome').val() == ''){
        $('#dadosVisitanteInvalidos').modal('show');
        $('#at_st_nome').focus();
    }
});

$('#at_st_documento').blur(function(){
    if($('#at_st_documento').val() == ''){
        $('#dadosVisitanteInvalidos').modal('show');
        $('#at_st_documento').focus();
    }
});


$('#transferir').change(function() {
    if(this.checked) {
        $('#btChamar').prop('disabled', true);
        $('#btFinalizar').prop('disabled', true);
        $('#btNComp').prop('disabled', true);
        $('#obs').prop('readonly', true);
        $('#set_in_transf').prop('disabled', false);
        $('#btTransf').prop('disabled', false);
    }else{
        $('#btChamar').prop('disabled', false);
        $('#btFinalizar').prop('disabled', false);
        $('#btNComp').prop('disabled', false);
        $('#obs').prop('readonly', false);
        $('#set_in_transf').prop('disabled', true);
        $('#btTransf').prop('disabled', true);
    }
});

$('#preencherDados').change(function(){
    if(this.checked){
        $('#at_st_documento').prop('readonly', false);
        $('#at_st_nome').prop('readonly', false);
        $('#at_st_documento').val('');
        $('#at_st_nome').val('');
        $('#at_st_documento').focus();
    }else{
        $('#at_st_documento').val('Não informado');
        $('#at_st_nome').val('VISITANTE');
        $('#at_st_documento').prop('readonly', true);
        $('#at_st_nome').prop('readonly', true);
    }
});