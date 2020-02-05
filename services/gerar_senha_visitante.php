<?php
    
    include('glo_tb_atendimento.php');
    
    $cpf = $_POST['cpf'];
    $setor = explode(' - ', $_POST['setor']);
    $visitante = $_POST['visitante'];
    $set_in_id = $setor[0];
    $set_st_desc = $setor[1];
    $prioritario = $_POST['prioritario'];
   
    $glo_tb_atendimento = new glo_tb_atendimento();

    $Rs = $glo_tb_atendimento->gerarSenhaAtendimento($cpf, $set_in_id, strtoupper($visitante), 'v', $prioritario);
    $Rs_2 = $glo_tb_atendimento->buscaSenhaPrinter();

    $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
    $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');

    $set_st_desc = str_replace($comAcentos, $semAcentos, $set_st_desc);
    $cpf = str_replace($comAcentos, $semAcentos, $cpf);

    $glo_tb_atendimento->gravaVisitante($cpf, strtoupper($visitante));

    $ticket = fopen("ticket.txt", "w");
    
    $txt = "===================================".chr(10).chr(10);
    $txt.=chr(32).chr(32).chr(32).chr(27).chr(69)."CENTRO UNIVERSITARIO UNIFAAT".chr(27).chr(70).chr(10).chr(10);
    $txt.= "SENHA: ".chr(27).chr(86).' '.chr(27).chr(14).''.chr(27).chr(69).$Rs_2[0]['at_st_senha'].chr(27).chr(70).chr(10).chr(10);
    $txt.= "SETOR: ".$set_st_desc.chr(10);
    $txt.= "DATA: ".$Rs_2[0]['at_dt_cad'].chr(10);
    $txt.= "CPF: ".$cpf.chr(10);
    $txt.= "AGUARDE SUA VEZ.";
    $txt.= chr(10).chr(10)."===================================";
    $txt.= chr(27)."m" ;
    
    fwrite($ticket, $txt);
    fclose($ticket);

    shell_exec("lp -o raw ticket.txt"); //Impressao 'raw' para acatar comandos em ASCII
    
    //shell_exec("print /D:\\\<HOST>\REP: etiqueta.txt"); //Impressao direta com impressora local - Windows
    
?>