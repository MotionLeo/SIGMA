<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="reset.css"> 
        <link rel="stylesheet" href="navegacoes.css">
        <link rel="stylesheet" href="consul_cli.css"> 
        <meta charset="utf-8">
        <title>Consulta de cliente</title>
        
    </head>
    <body>
        <header>
            <div class="cabecalho">
                <h1><a href="home_page.html"><img src="Imagens/Logo_SigmaNOVO.jpeg" class="img_logo"></a></h1>
                <nav>
                    <ul>
                        <li><a href = "cad_cli.html">Cadastrar novo cliente</a></li>
                        <li>Consultar novo cliente</li>
                        <li><a href = "home_page.html">Sobre a Sigma</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>CPF/CNPJ</th>
                        <th>Razão Social</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Telefone</th>
                        <th>Estado</th>
                        <th>CEP</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>Rua</th>
                        <th>Número</th>
                        <th>Status</th>
                        <th>Data de Cadastro</th>
                        <th>Última Alteração</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php include("consul_cli.php"); do{ ?>
                    <tr>
                        <td>
                            <?php
                                echo $linha['CNPJ_CPF'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['NOM_RAZAOSOCIAL'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['EMAIL'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['DD_CELULAR'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['DD_TELEFONE'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['ESTADO'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['cep'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['CIDADE'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['BAIRRO'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['RUA'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['NUMERO'];
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($linha['flg_status'] == 1){
                                    echo "Ativo";
                                }else{
                                    echo "Inativo";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                echo date('d/m/Y H:i:s', strtotime($linha['dt_cadastro']));
                            ?>
                        </td>
                        <td>
                            <?php
                                echo date('d/m/Y H:i:s', strtotime($linha['DT_ALTERACAO']));
                            ?>
                        </td>
                        <td>
                            <?php
                                echo "<a href=\"editar_cli.php?id=$id_cli\">Editar </a>";
                            ?>

                        </td>
                    </tr>
                    <?php }while($linha = mysqli_fetch_assoc($dados)); ?>
                </tbody>
            </table>
        </main>
        <footer>
            <ul class="foot_button">
                <li>
                    <p><a href = "consul_cli_web.php">Consulta de clientes</a></p>
                </li>
                <li>
                    <p><a href = "consul_func_web.php">Consulta de funcionários</a></p>
                </li>
                <li>
                    <p><a href = "consul_forn_web.php">Consulta de fornecedores</a></p>
                </li>
            </ul>
            <p class="copyright">&copy; Feito por Leonardo Daniel</p>
        </footer>
    </body>
</html>