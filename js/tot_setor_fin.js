$(document).ready(function(){
    $('#btn_pesquisar').click(function(){
        var dt_inicial = $('#dt_inicial').val();
        var dt_final = $('#dt_final').val();
        $.post("../services/busca_tot_setor_fin.php", {dt_inicial, dt_final}, function(data){
            
            $('#relTotalAtendFinSetor').html(data); // .html é uma função que carrega retornos em html

        })
    })
})