var audio = document.getElementById('audioChamada');
var senhaOld = 0;
var tentativaOld = 0;


$(window).load(function(){
    $('#carregarHistorico').modal('show');
    var refresh = setInterval(function() { 
        $('#refreshSenha').load('chamadas_senha.php');
        $('#refreshSolicitante').load('chamadas_solicitante.php');
        $('#refreshGuiche').load('chamadas_guiche.php'); 
        $('#refreshHistorico').load('chamadas_historico.php');
        $('#refreshSenha').css('background-color', 'white');
        $('#refreshSolicitante').css('background-color', 'white');
        $('#refreshGuiche').css('background-color', 'white');
     
        var senhaChamada = $('#senhaChamada').text();
        var tentativaChamada = $('#tentativaChamada').text();
    
        if(senhaOld != senhaChamada && senhaOld != 0){
            audio.play();
            $('#refreshSenha').css('background-color', 'orange');
            $('#refreshSolicitante').css('background-color', 'orange');
            $('#refreshGuiche').css('background-color', 'orange');
        }else if(tentativaOld != tentativaChamada){
            audio.play();
            $('#refreshSenha').css('background-color', 'orange');
            $('#refreshSolicitante').css('background-color', 'orange');
            $('#refreshGuiche').css('background-color', 'orange');
        }
        senhaOld = senhaChamada;
        tentativaOld = tentativaChamada;
    }, 250);
})

$('#ok').click(function(){
    $('#carregarHistorico').modal('hide');
})

