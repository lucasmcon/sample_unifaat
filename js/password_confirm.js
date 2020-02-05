var user_st_senha = document.getElementById('user_st_senha');
var user_confirma_senha = document.getElementById('user_confirma_senha');

user_confirma_senha.onblur = function(){
    if(user_st_senha.value != user_confirma_senha.value){
        $('#modalConfirmaSenha').modal('show');
        user_st_senha.value = '';
        user_confirma_senha.value = '';
        user_st_senha.focus();
    } 
}

$('#altGuiche').change(function(){
    if(this.checked){
        $('#alt_guiche').prop('disabled', false);
    }else{
        $('#alt_guiche').prop('disabled', true);
    }
});

$('#altSenha').change(function(){
    if(this.checked){     
        $('#user_st_senha').prop('readonly', false);
        $('#user_confirma_senha').prop('readonly', false);
        $('#user_st_senha').prop('required', true);
        $('#user_st_senha').focus();
        
    }else{
        $('#user_st_senha').prop('readonly', true);
        $('#user_confirma_senha').prop('readonly', true);
        $('#user_st_senha').prop('required', false);
    }
});