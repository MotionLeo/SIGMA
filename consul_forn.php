<?php
    include_once("db_connection.php");
    $conn = OpenCon();

    if (!$conn) {
    die('Não foi possível conectar ao Banco de Dados');
    }
    $sql = "SELECT id_fornecedor, cnpj_forn, nome_razaosocial_forn, ie_forn, EMAIL_forn, DD_TELEFONE_forn, ESTADO_forn, cep_forn, CIDADE_forn, BAIRRO_forn, RUA_forn, NUMERO_forn, flg_status_forn, dt_cadastro_forn, DT_ALTERACAO_forn FROM sig_fornecedor";
    
    $dados = mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro");
    $linha = mysqli_fetch_assoc($dados);
    $id_forn = $linha["id_fornecedor"];
    $total = mysqli_num_rows($dados);

    //Consulta para preencher os dados no form
    $query_updforn = "SELECT id_fornecedor, cnpj_forn, nome_razaosocial_forn, ie_forn, EMAIL_forn, DD_TELEFONE_forn, ";
    $query_updforn .= "ESTADO_forn, cep_forn, CIDADE_forn, BAIRRO_forn, RUA_forn, NUMERO_forn, flg_status_forn, ";
    $query_updforn .= "dt_cadastro_forn, DT_ALTERACAO_forn FROM sig_fornecedor WHERE sig_fornecedor.id_fornecedor  = $id_forn";
    $upd_forn = mysqli_query($conn,$query_updforn) or die("Erro ao tentar cadastrar registro");
    $linha_upd = mysqli_fetch_assoc($upd_forn);

    mysqli_close($conn);
?>