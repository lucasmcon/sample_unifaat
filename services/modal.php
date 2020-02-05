<!DOCTYPE html>
<html lang="en">
<head>
    <title>Secretaria Unifaat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="icon" href="../img/favi.png" type="image/x-icon"/>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
</head>
    <body> 
        <!-- Modal: Validação com erro (Tela de login) -->
        <div class="container">
            <div class="modal fade" id="modalValidacao" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Erro de validação.</h4>
                        </div>
                        <div class="modal-body">
                            <p>Login ou senha inválida.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../index.html"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->   
        <!-- Modal: Acesso negado (aviso ao tentar acesso direto a arquivos ou fora de sessão) -->
        <div class="container">
            <div class="modal fade" id="modalNegado" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Erro.</h4>
                        </div>
                        <div class="modal-body">
                            <p>Acesso negado.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../index.html"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Modal: Validação bem sucedida (Tela de login) -->
        <div class="container">
            <div class="modal fade" id="modalLoginSucesso" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Validação de Login.</h4>
                        </div>
                        <div class="modal-body">
                            <p>Login efetuado com sucesso.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/main.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Modal: Cadastro de usuário bem sucedido -->
        <div class="container">
            <div class="modal fade" id="modalCadastroUsuarioSucesso" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cadastro de usuários</h4>
                        </div>
                        <div class="modal-body">
                            <p>Cadastro efetuado com sucesso.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/usuarios.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Modal: Cadastro de usuário bem sucedido -->
        <div class="container">
            <div class="modal fade" id="modalCadastroEmailSucesso" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cadastro de E-mail</h4>
                        </div>
                        <div class="modal-body">
                            <p>Conta de e-mail cadastrada com sucesso.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/emails.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Modal: Cadastro de setor bem sucedido -->
        <div class="container">
            <div class="modal fade" id="modalCadastroSetorSucesso" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cadastro de setor</h4>
                        </div>
                        <div class="modal-body">
                            <p>Cadastro efetuado com sucesso.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/setores.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
                <!-- Modal: Cadastro de guichê bem sucedido -->
                <div class="container">
            <div class="modal fade" id="modalCadastroGuicheSucesso" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cadastro de guichê</h4>
                        </div>
                        <div class="modal-body">
                            <p>Cadastro efetuado com sucesso.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/guiches.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Atualização de Usuario bem sucedida -->
        <div class="container">
            <div class="modal fade" id="modalEditaUsuario" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Atualização de usuário</h4>
                        </div>
                        <div class="modal-body">
                            <p>Usuário atualizado com sucesso.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/usuarios.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Atualização de Conta de e-mail bem sucedida -->
        <div class="container">
            <div class="modal fade" id="modalEditaEmail" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Atualização de E-mail</h4>
                        </div>
                        <div class="modal-body">
                            <p>E-mail atualizado com sucesso.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/emails.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Atualização de Usuario bem sucedida -->
        <div class="container">
            <div class="modal fade" id="modalEditaMeusDados" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Atualização de usuário</h4>
                        </div>
                        <div class="modal-body">
                            <p>Usuário atualizado com sucesso.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/dados.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Atualização de Setor bem sucedida -->
        <div class="container">
            <div class="modal fade" id="modalEditaSetor" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Atualização de setor</h4>
                        </div>
                        <div class="modal-body">
                            <p>Setor atualizado com sucesso. IMPORTANTE: Alterações de prefixo serão assumidas a partir das próximas senhas.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/setores.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
                <!-- Atualização de Guich~e bem sucedida -->
                <div class="container">
            <div class="modal fade" id="modalEditaGuiche" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Atualização de guichê</h4>
                        </div>
                        <div class="modal-body">
                            <p>Guichê atualizado com sucesso.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/guiches.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Modal: Exclusão de usuário -->
        <div class="container">
            <div class="modal fade" id="modalDeletaUsuario" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Exclusão de usuário</h4>
                        </div>
                        <div class="modal-body">
                            <p>Usuário excluído com sucesso</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/usuarios.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Modal: Exclusão de setor -->
        <div class="container">
            <div class="modal fade" id="modalDeletaSetor" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Exclusão de setor</h4>
                        </div>
                        <div class="modal-body">
                            <p>Setor excluído com sucesso</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/setores.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Modal: Exclusão de guiche -->
        <div class="container">
            <div class="modal fade" id="modalDeletaGuiche" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Exclusão de guichê</h4>
                        </div>
                        <div class="modal-body">
                            <p>Guichê excluído com sucesso</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/guiches.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Modal: Exclusão de guiche -->
        <div class="container">
            <div class="modal fade" id="modalDeletaGuicheFalha" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Falha na exclusão de guichê</h4>
                        </div>
                        <div class="modal-body">
                            <p>Esse guichê não pode ser exluído pois está associado à um atendente/usuário.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/guiches.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Modal: Exclusão de guiche -->
        <div class="container">
            <div class="modal fade" id="modalDeletaSetorFalha" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Falha na exclusão de setor</h4>
                        </div>
                        <div class="modal-body">
                            <p>Esse setor não pode ser exluído pois está associado à um atendente/usuário.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/setores.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Modal: Chamada de atendimento -->
        <div class="container">
            <div class="modal fade" id="chamaAtendimento" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Atendimentos</h4>
                        </div>
                        <div class="modal-body">
                            <p>A senha foi chamada...</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/atendimento_detalhado.php?at_in_id=<?php echo $at_in_id ?>"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Modal: Recupera senha -->
        <div class="container">
            <div class="modal fade" id="recuperaSenha" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Recuperação de senha</h4>
                        </div>
                        <div class="modal-body">
                            <p>Uma senha temporária foi enviada em seu e-mail. Atualize assim que efetuar login.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/index.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
                <!-- Modal: Recupera senha -->
                <div class="container">
            <div class="modal fade" id="usuarioInexistente" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Recuperação de senha</h4>
                        </div>
                        <div class="modal-body">
                            <p>Cadastro não encontrado.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/index.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Modal: Atualização de configuração -->
        <div class="container">
            <div class="modal fade" id="modalUpdateConfig" data-keyboard="false" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Configurações</h4>
                        </div>
                        <div class="modal-body">
                            <p>Configurações atualizadas com sucesso.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="../pages/configuracoes.php"><b>Ok</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
        <!-- Modal: Comparação de senhas no cadastro de usuário -->
        <div class="container">
            <div class="modal fade" id="modalConfirmaSenha" data-keyboard="false" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cadastro de usuários</h4>
                        </div>
                        <div class="modal-body">
                            <p>ERRO: As senhas não coincidem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal -->
    </body>
</html>