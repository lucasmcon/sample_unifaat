<?php 
    include('glo_tb_atendimento.php');
    $glo_tb_atendimento = new glo_tb_atendimento();
    
    $cpf = $_POST['cpf'];
    $Rs = $glo_tb_atendimento->consultaVisitante($cpf);


    
    //PROGRAMAR BUSCAR POR VISITAMNTE

    if($Rs != ''){    
        
        //$explode = explode(' ', $decoded->aluno_nome);
        //$aluno_nome = $explode[0].' '.$explode[1];

        $form = '<div class="form-group">';
        $form.= '<label>Nome:</label>';
        $form.= '<input class="form-control text-center" value="'.strtoupper($Rs[0]['vis_st_nome']).'" readonly="yes" id="nome_visitante" name="nome_visitante">';

        $form.= '<label>CPF:</label>';
        $form.= '<input class="form-control text-center" value="'.$Rs[0]['vis_st_cpf'].'" id="cpf_visitante" name="cpf_visitante">';
        $form.= '</div>';

        echo $form;
        
    }else{
        $form = '<div class="form-group">';
        $form.= '<label>CPF:</label>';
        $form.= '<input class="form-control text-center" value="CPF não encontrado" readonly="yes" id="cpf_visitante" name="cpf_visitante">';

        $form.= '<label>Nome:</label>';
        $form.= '<input class="form-control text-center" maxlength="20" placeholder="Informe seu primeiro nome" id="nome_visitante" name="nome_visitante">';
        $form.= '</div>';
        echo $form;
    }
?>
