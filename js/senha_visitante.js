
$('#btBuscaVisitante').click(function(){
	var cpf = $('#cpf').val();
	
    if(validarCPF(cpf)){
        $.post("../services/busca_visitante.php", {cpf}, function(data){
			$('#resultBusca').html(data); // .html é uma função que carrega retornos em html
			$('#cpf').attr('readonly', true);
        })
    }else{
		$('#cpfInvalido').modal('show');
		$('#cpf').val('');
		$('#cpf').focus();
    }
})

function validarCPF(cpf) {	
	cpf = cpf.replace(/[^\d]+/g,'');	
	if(cpf == '') return false;	
	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 || 
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999")
			return false;		
	// Valida 1o digito	
	add = 0;	
	for (i=0; i < 9; i ++)		
		add += parseInt(cpf.charAt(i)) * (10 - i);	
		rev = 11 - (add % 11);	
		if (rev == 10 || rev == 11)		
			rev = 0;	
		if (rev != parseInt(cpf.charAt(9)))		
			return false;		
	// Valida 2o digito	
	add = 0;	
	for (i = 0; i < 10; i ++)		
		add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	
		rev = 0;	
	if (rev != parseInt(cpf.charAt(10)))
		return false;		
	return true;   
}

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