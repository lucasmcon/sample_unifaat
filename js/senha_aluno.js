
/*
$('#btBuscaAluno').click(function(){
    var ra = $('#ra').val();
    //alert(ra);
    $.post("../services/api/busca_aluno.php", {ra}, function(data){
        $('#resultBusca').html(data); // .html é uma função que carrega retornos em html
        if($('#nome_aluno').val() == 'RA não encontrado'){
            $('#raNaoEncontrado').modal('show');
            $('#ra').val('');
        }else{
            $('#ra').attr('readonly', true);
        }
    })
})
*/

var idleTime = 0;
$(document).ready(function () {
    
    var idleInterval = setInterval(timerIncrement, 10000); // 1 minute

    $(this).click(function (e){
        idleTime = 0;
    });
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});

function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > 1) {
        window.location.href = 'senha.php';
    }
}
