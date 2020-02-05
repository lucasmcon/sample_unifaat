
$('#btn_filtrar').click(function(){
    
    var dt_inicial = $('#dt_inicial').val();
    var dt_final = $('#dt_final').val();
    var set_st_desc = $('#set_st_desc').val();
    var user_st_nome = $('#user_st_nome').val();

    $.post("../services/busca_historico.php", {set_st_desc, user_st_nome, dt_inicial, dt_final}, function(data){     
        $('#filtroHistorico').html(data); // .html é uma função que carrega retornos em html
    })    
})

function buscaHistorico() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("inputBusca");
    filter = input.value.toUpperCase();
    table = document.getElementById("tableHistorico");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
}

function selectSetor(){
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("set_st_desc");
    filter = input.value.toUpperCase();
    table = document.getElementById("tableHistorico");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[7];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
}

function selectAtendente(){
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("user_st_nome");
    filter = input.value.toUpperCase();
    table = document.getElementById("tableHistorico");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[8];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
}