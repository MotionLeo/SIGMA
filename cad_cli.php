<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Redirecionando</title>

        <meta http-equiv="refresh" content="2; URL='cad_cli.html'">
    </head>
    <body>
        <?php
            include_once("db_connection.php");
            $conn = OpenCon();
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
            $sql = "INSERT INTO sig_cliente(CNPJ_CPF, NOM_RAZAOSOCIAL, EMAIL, DD_CELULAR, DD_TELEFONE, ESTADO, cep, CIDADE, BAIRRO, RUA, NUMERO, flg_status, dt_cadastro, DT_ALTERACAO) VALUES ";
            $sql .= "('$cnpj_cpf', '$razao', '$email', '$cel', '$tel', '$estado', '$cep', '$cidade', '$bairro', '$rua', '$num', true, now(), now())";
            mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro");
            mysqli_close($conn);
            echo "Redirecionando para página de cliente...";
        ?>

    </body>
</html>