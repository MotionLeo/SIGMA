<?php
    include_once("db_connection.php");
    $conn = OpenCon();

    if (!$conn) {
    die('Não foi possível conectar ao Banco de Dados');
    }
    $sql = "SELECT id_cliente, CNPJ_CPF, NOM_RAZAOSOCIAL, EMAIL, DD_CELULAR, DD_TELEFONE, ESTADO, cep, CIDADE, BAIRRO, RUA, NUMERO, flg_status, dt_cadastro, DT_ALTERACAO FROM sig_cliente";
    
    $dados = mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro");
    $linha = mysqli_fetch_assoc($dados);
    $id_cli = $linha["id_cliente"];
    $total = mysqli_num_rows($dados);

    //Consulta para preencher os dados no form
    $query_updcli = "SELECT id_cliente, CNPJ_CPF, NOM_RAZAOSOCIAL, EMAIL, DD_CELULAR, DD_TELEFONE, ";
    $query_updcli .= "ESTADO, cep, CIDADE, BAIRRO, RUA, NUMERO, ";
    $query_updcli .= "DT_ALTERACAO FROM sig_cliente WHERE sig_cliente.id_cliente  = $id_cli";
    $upd_cli = mysqli_query($conn,$query_updcli) or die("Erro ao tentar cadastrar registro");
    $linha_upd = mysqli_fetch_assoc($upd_cli);
    mysqli_close($conn);
?>