var senha_antiga = document.getElementById('user_st_senha');
var confirma_senha = document.getElementById('user_confirma_senha');
var senha = senha_antiga.value;
var checkSenha = document.getElementById('checkSenha');

checkSenha.onclick = function(){

    if(checkSenha.checked){
        senha_antiga.readOnly = false;
        confirma_senha.readOnly = false;
        senha_antiga.value = '';
        senha_antiga.required = true;
        confirma_senha.required = true;
    }else{
        senha_antiga.readOnly = true;
        confirma_senha.readOnly = true;
        senha_antiga.value = senha;
        confirma_senha.value = ''
        confirma_senha.required = false;
    }
}

confirma_senha.onblur = function(){
    if(senha_antiga.value != confirma_senha.value){
        $('#modalConfirmaSenha').modal('show');
        senha_antiga.value = '';
        confirma_senha.value = '';
        senha_antiga.focus();
    } 
}



