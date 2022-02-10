<?php
    include_once("db_connection.php");
    $conn = OpenCon();

    if (!$conn) {
    die('Não foi possível conectar ao Banco de Dados');
    }
    $sql = "SELECT ID_FUNCIONARIO, NOME_FUNC, CPF_FUNC, EMAIL_FUNC, DD_CELULARFUNC, DD_TELEFONEFUNC, ESTADO_FUNC, cep_FUNC, CIDADE_FUNC, BAIRRO_FUNC, RUA_FUNC, NUMERO_FUNC, dt_cadastro, DT_ALTERACAO, STATUS_FUNC, CARGO, SALARIO FROM sig_funcionario";
    
    $dados = mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro");
    $linha = mysqli_fetch_assoc($dados);
    $id_func = $linha["ID_FUNCIONARIO"];
    $total = mysqli_num_rows($dados);

    //Consulta para preencher os dados no form
    $query_updfunc = "SELECT ID_FUNCIONARIO, NOME_FUNC, CPF_FUNC, EMAIL_FUNC, DD_CELULARFUNC, DD_TELEFONEFUNC, ";
    $query_updfunc .= "ESTADO_FUNC, cep_FUNC, CIDADE_FUNC, BAIRRO_FUNC, RUA_FUNC, NUMERO_FUNC, ";
    $query_updfunc .= "dt_cadastro, DT_ALTERACAO, CARGO, SALARIO FROM sig_funcionario WHERE sig_funcionario.ID_FUNCIONARIO  = $id_func";
    $upd_func = mysqli_query($conn,$query_updfunc) or die("Erro ao tentar cadastrar registro");
    $linha_upd = mysqli_fetch_assoc($upd_func);

    mysqli_close($conn);
?>