<?php
    require_once("fpdf/fpdf.php");
    include('api/unifaat.php');
    include('phpqrcode/qrlib.php');
    include('glo_tb_atendimento.php');
    
    //$matricula = $_POST['ra'];
    //$setor = explode(' - ', $_POST['setor']);
    //$aluno = $_POST['aluno'];
    $set_in_id = 1;

    $nome_aluno = 'LUCAS';
    
    $unifaat = new unifaat();
    $glo_tb_atendimento = new glo_tb_atendimento();

    $Rs = $unifaat->consultaAluno('6315046');
    $decoded = json_decode($Rs);

    $explode = explode(' ', $decoded->aluno_nome);
    $aluno_nome = 'Lucas Menezes';

    $Rs_2 = $glo_tb_atendimento->gerarSenhaAtendimento($decoded->aluno_matricula, $set_in_id, $aluno_nome, 'e');

    $Rs_3 = $glo_tb_atendimento->buscaSenhaPrinter();

    //$ticket = fopen("ticket.txt", "w");
    $txt = "==================================".chr(10).chr(10);
    $txt.=chr(32).chr(32).chr(32).chr(27).chr(69)."CENTRO UNIVERSITARIO UNIFAAT".chr(27).chr(70).chr(10).chr(10);
    $txt.= "SENHA: ".chr(27).chr(86).' '.chr(27).chr(14).''.chr(27).chr(69).$Rs_3[0]['at_st_senha'].chr(27).chr(70).chr(10).chr(10);
    $txt.= "DATA: ".$Rs_3[0]['at_dt_cad'].chr(10);
    $txt.= $nome_aluno. ", AGUARDE SUA VEZ.";
    $txt.= chr(10).chr(10)."==================================";
    $txt.= chr(27)."m" ;
    
    //fwrite($ticket, $txt);
    //fclose($ticket);

    $qrcode = "SENHA: ".$Rs_3[0]['at_st_senha']."\n";
    $qrcode.= "DATA: ".$Rs_3[0]['at_dt_cad'];

    QRcode::png($qrcode, 'qr_code.png');

    $pdf= new FPDF("P","pt","A4");
 
    $pdf->AddPage();
   
    
    //CABEÇALHO
    $pdf->SetFont('arial','B',12);
    $pdf->Cell(0,5,"CENTRO UNIVERSITARIO UNIFAAT",0,1,'C');
    $pdf->Cell(0,5,"","B",1,'C');
    $pdf->Ln(8);
    
    //SENHA
    $pdf->setFont('arial','',12);
    $pdf->Cell(0,20,"SENHA: ".$Rs_3[0]['at_st_senha'],0,1,'L');
    //DATA
    $pdf->setFont('arial','',12);
    $pdf->Cell(70,20,"DATA: ".$Rs_3[0]['at_dt_cad'],0,1,'L');
    //MENSAGEM
    $pdf->setFont('arial','',12);
    $pdf->Cell(70,20,$nome_aluno. ", AGUARDE SUA VEZ.",0,1,'L');

    $pdf->Image('qr_code.png');

    //GERA PDF
    $pdf->Output('ticket.pdf', 'F');

    
    //shell_exec("lp -o raw ticket.txt");
    
    //shell_exec("print /D:\\\DESK17\REP: etiqueta.txt");
    


?>