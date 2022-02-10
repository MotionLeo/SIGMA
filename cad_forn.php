<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Redirecionando</title>

        <meta http-equiv="refresh" content="2; URL='cad_forn_web.php'">
    </head>
    <body>
        <?php
            include_once("db_connection.php");
            $conn = OpenCon();
            $cnpj_forn = $_POST['cnpj_forn'];
            $razforn = $_POST['raz_forn'];
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
            $sql = "INSERT INTO sig_fornecedor(nome_razaosocial_forn, cnpj_forn, EMAIL_forn, DD_TELEFONE_forn, ESTADO_forn, cep_forn, CIDADE_forn, BAIRRO_forn, RUA_forn, NUMERO_forn, flg_status_forn, dt_cadastro_forn, DT_ALTERACAO_forn) VALUES ";
            $sql .= "('$razforn', '$cnpj_forn', '$email_forn', '$tel_forn', '$estado_forn', '$cep_forn', '$cidade_forn', '$bairro_forn', '$rua_forn', '$num_forn', true, now(), now())";
            mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro");
            mysqli_close($conn);
            echo "Redirecionando para página de fornecedor...";
        ?>

    </body>
</html>