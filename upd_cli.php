<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Redirecionando</title>

        <meta http-equiv="refresh" content=" URL='consul_cli_web.php'">
    </head>
    <body>
        <?php
            include_once("db_connection.php");
            $conn = OpenCon();
            $query = "SELECT id_cliente FROM sig_cliente";
            $dados = mysqli_query($conn,$query) or die("Erro ao tentar cadastrar registro");
            $linha = mysqli_fetch_assoc($dados);
            $id_cli = $linha['id_cliente'];

            $cnpj_cpf = $_POST['cnpjcpf'];
            $razao = $_POST['razsocial'];
            $email = $_POST['email'];
            $cel = $_POST['cel'];
            $tel = $_POST['tel'];
            $estado = $_POST['estado'];
            $cep = $_POST['cep'];
            $cidade = $_POST['cidade'];
            $bairro = $_POST['bairro'];
            $rua = $_POST['rua'];
            $num = $_POST['num'];

            if (!$conn) {
            die('Não foi possível conectar ao Banco de Dados');
            }
            $sql = "UPDATE sig_cliente SET CNPJ_CPF = '$cnpj_cpf', NOM_RAZAOSOCIAL = '$razao', EMAIL = '$email', DD_CELULAR = '$cel', DD_TELEFONE = '$tel', ESTADO = '$estado', ";
            $sql .= "cep = '$cep', CIDADE = '$cidade', BAIRRO = '$bairro', RUA = '$rua', NUMERO = '$num', DT_ALTERACAO = now()";
            $sql .= "WHERE sig_cliente.id_cliente = $id_cli";
            mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro");
            mysqli_close($conn);
            echo "Redirecionando para página de consulta de cliente...";
        ?>

    </body>
</html>