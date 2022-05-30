<?php
// verificar com foreach os campos do formulário com empty
// se estiverem vazios, então exibir mensagem de erro

foreach ($_POST as $key => $value){
    if (empty($value)){
        echo '<script>alert("Preencha todos os campos!");</script>';
        echo '<script>location.href="../view/alterar-cliente.html";</script>';
    }
}

// verificar senha e confirmar senha
if ($_POST['novaSenha'] != $_POST['confirmarNovaSenha']){
    echo '<script>alert("Senhas não conferem!");</script>';
    echo '<script>location.href="../view/alterar-cliente.html";</script>';
}

include("../model/cliente.php");
// start a session
session_start();
$logado = unserialize($_SESSION['logado']);

$logado->setNome($_POST['nome']);
$logado->setSobrenome($_POST['sobrenome']);
$logado->setEmail($_POST['email']);
$logado->setTelefone($_POST['telefone']);
$logado->setCpf($_POST['cpf']);
$logado->setDataNascimento($_POST['dataNascimento']);
$logado->setCep($_POST['cep']);
$logado->setEndereco($_POST['endereco']);
$logado->setNumero($_POST['numero']);
$logado->setComplemento($_POST['complemento']);
$logado->setCidade($_POST['cidade']);
$logado->setEstado($_POST['estado']);
$logado->setSenha($_POST['novaSenha']);

$logado->alterarLogin();
$logado->alterarEndereco();
$logado->alterarCliente();
echo '<script>alert("Cliente alterado com sucesso!");</script>';
echo '<script>location.href="../view/home.php";</script>';
