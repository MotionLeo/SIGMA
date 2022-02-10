<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Redirecionando</title>

        <meta http-equiv="refresh" content="2; URL='cad_func.html'">
    </head>
    <body>
        <?php
            include_once("db_connection.php");
            $conn = OpenCon();
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
            $sql = "INSERT INTO sig_funcionario(NOME_FUNC, CPF_FUNC, EMAIL_FUNC, DD_CELULARFUNC, DD_TELEFONEFUNC, ESTADO_FUNC, cep_FUNC, CIDADE_FUNC, BAIRRO_FUNC, RUA_FUNC, NUMERO_FUNC, dt_cadastro, DT_ALTERACAO, STATUS_FUNC, CARGO, SALARIO) VALUES ";
            $sql .= "('$nome_func', '$cpf_func', '$email_func', '$cel_func', '$tel_func', '$estado_func', '$cep_func', '$cidade_func', '$bairro_func', '$rua_func', '$num_func', now(), now(), true, '$cargo_func', '$salario_func')";
            mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro");
            mysqli_close($conn);
            echo "Redirecionando para página de funcionário...";
        ?>

    </body>
</html>