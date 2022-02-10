<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Redirecionando</title>

        <meta http-equiv="refresh" content="2; URL='consul_forn_web.php'">
    </head>
    <body>
        <?php
            include_once("db_connection.php");
            $conn = OpenCon();
            $query = "SELECT id_fornecedor FROM sig_fornecedor";
            $dados = mysqli_query($conn,$query) or die("Erro ao tentar cadastrar registro");
            $linha = mysqli_fetch_assoc($dados);
            $id_forn = $linha['id_fornecedor'];

            $razforn = $_POST['raz_forn'];
            $cnpj_forn = $_POST['cnpj_forn'];
            $ie_forn = $_POST['ie_forn'];
            $email_forn = $_POST['email_forn'];
            $tel_forn = $_POST['tel_forn'];
            $estado_forn = $_POST['estado'];
            $cep_forn = $_POST['cep_forn'];
            $cidade_forn = $_POST['cidade_forn'];
            $bairro_forn = $_POST['bairro_forn'];
            $rua_forn = $_POST['rua_forn'];
            $num_forn = $_POST['num_forn'];

            if (!$conn) {
            die('Não foi possível conectar ao Banco de Dados');
            }
            $sql = "UPDATE sig_fornecedor SET nome_razaosocial_forn = '$razforn', cnpj_forn = '$cnpj_forn', ie_forn = '$ie_forn', EMAIL_forn = '$email_forn', DD_TELEFONE_forn = '$tel_forn', ";
            $sql .= "ESTADO_forn = '$estado_forn', cep_forn = '$cep_forn', CIDADE_forn = '$cidade_forn', BAIRRO_forn = '$bairro_forn', RUA_forn = '$rua_forn', NUMERO_forn = '$num_forn', ";
            $sql .= "DT_ALTERACAO_forn = now() WHERE sig_fornecedor.id_fornecedor  = $id_forn";
            mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro");
            mysqli_close($conn);
            echo "Redirecionando para página de consulta de fornecedor...";
        ?>

    </body>
</html>