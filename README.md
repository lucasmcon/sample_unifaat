# Sistema de atendimento - UNIFAAT
 
 Projeto desenvolvido com base no meu [Projeto de conclusão de curso](https://github.com/lucasmcon/App_PCC).
 
 Após reunicão com diretoria, diversas modificações foram feitas no projeto inicial, com alguns requisitos:
 
- Implementação de geração de senha através de um *TOTEM* interativo.
- Integração com API RestFUL para consumo de dados acadêmicos dos alunos nas solicitações de atendimento.
- Possibildiade de gerar senhas para *Visitantes*.
- Possibilidade de gerar senhas *preferenciais*.
- Cadastro de prefixo de setor para senhas independentes (Ex: Academico, senha AC_01 e Financeiro senha FN_01).
- Reinicio do ciclo das senhas ao final do dia
- Possibilidade de cadastrar horário ativo dos setores (impedindo solicitação de atendimento fora do horário).


## Desenvolvimento

As tecnologias utilizadas para desenvolvimento desse sistema firam:
- PHP
- JavaScript (jQuery)
- Banco de dados MySQL Server
- Bootstrap
- HTML

## Infraestrutura

Para rodar o sistema, foi necessário utilizar um servidor Linux (Ubuntu 18.04 LTS) com os seguintes serviços rodando:
- Apache2
- MySQL Server
- CUPs (para integração com impressora termica do Totem


Em breve mais informações sobre o sistema.
