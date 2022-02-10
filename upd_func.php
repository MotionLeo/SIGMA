<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Redirecionando</title>

        <meta http-equiv="refresh" content="2; URL='consul_func_web.php'">
    </head>
    <body>
        <?php
            include_once("db_connection.php");
            $conn = OpenCon();
            $query = "SELECT ID_FUNCIONARIO FROM sig_funcionario";
            $dados = mysqli_query($conn,$query) or die("Erro ao tentar cadastrar registro");
            $linha = mysqli_fetch_assoc($dados);
            $id_func = $linha['ID_FUNCIONARIO'];

            $nome_func = $_POST['nome_func'];
            $cpf_func = $_POST['cpf_func'];
            $email_func = $_POST['email_func'];
            $cel_func = $_POST['cel_func'];
            $tel_func = $_POST['tel_func'];
            $estado_func = $_POST['estado'];
            $cep_func = $_POST['cep_func'];
            $cidade_func = $_POST['cidade_func'];
            $bairro_func = $_POST['bairro_func'];
            $rua_func = $_POST['rua_func'];
            $num_func = $_POST['num_func'];
            $cargo_func = $_POST['cargo_func'];
            $salario_func = $_POST['salario_func'];

            if (!$conn) {
            die('Não foi possível conectar ao Banco de Dados');
            }
            $sql = "UPDATE sig_funcionario SET NOME_FUNC = '$nome_func', CPF_FUNC = '$cpf_func', EMAIL_FUNC = '$email_func', DD_CELULARFUNC = '$cel_func', DD_TELEFONEFUNC = '$tel_func', ";
            $sql .= "ESTADO_FUNC = '$estado_func', cep_FUNC = '$cep_func', CIDADE_FUNC = '$cidade_func', BAIRRO_FUNC = '$bairro_func', RUA_FUNC = '$rua_func', NUMERO_FUNC = '$num_func', ";
            $sql .= "DT_ALTERACAO = now(), CARGO  = '$cargo_func', SALARIO = '$salario_func' WHERE sig_funcionario.ID_FUNCIONARIO  = $id_func";
            mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro");
            mysqli_close($conn);
            echo "Redirecionando para página de consulta de funcionário...";
        ?>

    </body>
</html>