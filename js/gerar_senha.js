/*
$('#btGerarSenhaAluno').click(function(){
    var setor = $('#setor').val();
    var aluno = $('#nome_aluno').val();
    var ra = $('#ra').val();
    var prioritario = 0;

    if(setor == 'Selecione o setor'){
        $('#selecioneSetor').modal('show');
    }else if(aluno == '' || aluno == 'RA não encontrado'){
        $('#informeRA').modal('show');
        $('#ra').val('');
    }else{       
        $('#senhaGerada').modal('show');
        $.post("../services/gerar_senha_aluno.php", {ra, setor, aluno, prioritario}, function(data){
            setTimeout(function(){
                window.location.href='../pages/senha.php';
            }, 4000)
        })
    }
})

$('#btGerarSenhaAlunoPrior').click(function(){
    var setor = $('#setor').val();
    var aluno = $('#nome_aluno').val();
    var ra = $('#ra').val();
    var prioritario = 1;

    if(setor == 'Selecione o setor'){
        $('#selecioneSetor').modal('show');
    }else if(aluno == '' || aluno == 'RA não encontrado'){
        $('#informeRA').modal('show');
        $('#ra').val('');
    }else{       
        $('#senhaGerada').modal('show');
        $.post("../services/gerar_senha_aluno.php", {ra, setor, aluno, prioritario}, function(data){
            setTimeout(function(){
                window.location.href='../pages/senha.php';
            }, 4000)
        })
    }
})
*/

$('#btGerarSenhaAluno').click(function(){
    $('#btGerarSenhaAluno').attr('disabled', true);
    $('#btGerarSenhaAlunoPrior').attr('disabled', true);
    var ra = $('#ra').val();
    $.post("../services/api/busca_aluno.php", {ra}, function(data){
        $('#resultBusca').html(data); // .html é uma função que carrega retornos em html
        if($('#nome_aluno').val() == 'RA não encontrado'){
            $('#raNaoEncontrado').modal('show');
            $('#ra').val('');
            $('#btGerarSenhaAluno').attr('disabled', false);
            $('#btGerarSenhaAlunoPrior').attr('disabled', false);
        }else{
            $('#ra').attr('readonly', true);
            var setor = $('#setor').val();
            var aluno = $('#nome_aluno').val();
            var ra = $('#ra').val();
            var prioritario = 0;
            if(setor == 'Selecione o setor'){
                $('#selecioneSetor').modal('show');
                $('#btGerarSenhaAluno').attr('disabled', false);
                $('#btGerarSenhaAlunoPrior').attr('disabled', false);
            }else if(aluno == '' || aluno == 'RA não encontrado'){
                $('#informeRA').modal('show');
                $('#ra').val('');
                $('#btGerarSenhaAluno').attr('disabled', false);
                $('#btGerarSenhaAlunoPrior').attr('disabled', false);
            }else if(aluno == 'Senha padrão'){
                var cpf = 'Não informado';
                var visitante = 'Aluno - preencher dados';
                $('#senhaGerada').modal('show');
                $.post("../services/gerar_senha_visitante.php", {cpf, setor, visitante, prioritario}, function(data){
                    setTimeout(function(){
                        window.location.href='../pages/senha.php';
                    }, 4000)
                })
            }else{       
                $('#senhaGerada').modal('show');
                $.post("../services/gerar_senha_aluno.php", {ra, setor, aluno, prioritario}, function(data){
                    setTimeout(function(){
                        window.location.href='../pages/senha.php';
                    }, 4000)
                })
            }
        }
    })
})

$('#btGerarSenhaAlunoPrior').click(function(){
    $('#btGerarSenhaAluno').attr('disabled', true);
    $('#btGerarSenhaAlunoPrior').attr('disabled', true);
    var ra = $('#ra').val();
    $.post("../services/api/busca_aluno.php", {ra}, function(data){
        $('#resultBusca').html(data); // .html é uma função que carrega retornos em html
        if($('#nome_aluno').val() == 'RA não encontrado'){
            $('#raNaoEncontrado').modal('show');
            $('#ra').val('');
            $('#btGerarSenhaAluno').attr('disabled', false);
            $('#btGerarSenhaAlunoPrior').attr('disabled', false);
        }else{
            $('#ra').attr('readonly', true);
            var setor = $('#setor').val();
            var aluno = $('#nome_aluno').val();
            var ra = $('#ra').val();
            var prioritario = 1;

            if(setor == 'Selecione o setor'){
                $('#selecioneSetor').modal('show');
                $('#btGerarSenhaAluno').attr('disabled', false);
                $('#btGerarSenhaAlunoPrior').attr('disabled', false);
            }else if(aluno == '' || aluno == 'RA não encontrado'){
                $('#informeRA').modal('show');
                $('#ra').val('');
                $('#btGerarSenhaAluno').attr('disabled', false);
                $('#btGerarSenhaAlunoPrior').attr('disabled', false);;
            }else if(aluno == 'Senha padrão'){
                var cpf = 'Aluno - preencher dados';
                var visitante = 'Visitante';
                $('#senhaGerada').modal('show');
                $.post("../services/gerar_senha_visitante.php", {cpf, setor, visitante, prioritario}, function(data){
                    setTimeout(function(){
                        window.location.href='../pages/senha.php';
                    }, 4000)
                })
            }else{       
                $('#senhaGerada').modal('show');
                $.post("../services/gerar_senha_aluno.php", {ra, setor, aluno, prioritario}, function(data){
                    setTimeout(function(){
                        window.location.href='../pages/senha.php';
                    }, 4000)
                })
            }
        }
    })
})

$('#btGerarSenhaVisitante').click(function(){
    $('#btGerarSenhaVisitante').attr('disabled', true);
    $('#btGerarSenhaVisitantePrior').attr('disabled', true);
    var setor = $('#setor').val();
    var visitante = 'Visitante';
    var cpf = $('#cpf').val();
    var prioritario = 0;
    
    if(setor == 'Selecione o setor'){
        $('#selecioneSetor').modal('show');
        $('#btGerarSenhaVisitante').attr('disabled', false);
        $('#btGerarSenhaVisitantePrior').attr('disabled', false);
    }else if(cpf != '' && !validarCPF(cpf)){
        $('#cpf').val('');
        $('#cpfInvalido').modal('show');
        $('#btGerarSenhaVisitante').attr('disabled', false);
        $('#btGerarSenhaVisitantePrior').attr('disabled', false);
    }else{
        if(cpf == ''){
            cpf = 'Não informado';
        }
        $('#senhaGerada').modal('show');
        $.post("../services/gerar_senha_visitante.php", {cpf, setor, visitante, prioritario}, function(data){
            setTimeout(function(){
                window.location.href='../pages/senha.php';
            }, 4000)
        })
    }
})

$('#btGerarSenhaVisitantePrior').click(function(){
    $('#btGerarSenhaVisitante').attr('disabled', true);
    $('#btGerarSenhaVisitantePrior').attr('disabled', true);
    var setor = $('#setor').val();
    var visitante = 'Visitante';
    var cpf = $('#cpf').val();
    var prioritario = 1;
    
    if(setor == 'Selecione o setor'){
        $('#selecioneSetor').modal('show');
        $('#btGerarSenhaVisitante').attr('disabled', false);
        $('#btGerarSenhaVisitantePrior').attr('disabled', false);
    }else if(cpf != '' && !validarCPF(cpf)){
        $('#cpf').val('');
        $('#cpfInvalido').modal('show');
        $('#btGerarSenhaVisitante').attr('disabled', false);
        $('#btGerarSenhaVisitantePrior').attr('disabled', false);
    }else{
        if(cpf == ''){
            cpf = 'Não informado';
        }
        $('#senhaGerada').modal('show');
        $.post("../services/gerar_senha_visitante.php", {cpf, setor, visitante, prioritario}, function(data){
            setTimeout(function(){
                window.location.href='../pages/senha.php';
            }, 4000)
        })
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


