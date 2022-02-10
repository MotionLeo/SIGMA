<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="reset.css"> 
        <link rel="stylesheet" href="navegacoes.css">
        <link rel="stylesheet" href="consul_cli.css"> 
        <meta charset="utf-8">
        <title>Consulta de forncedor</title>
        
    </head>
    <body>
        <header>
            <div class="cabecalho">
                <h1><a href="home_page.html"><img src="Imagens/Logo_SigmaNOVO.jpeg" class="img_logo"></a></h1>
                <nav>
                    <ul>
                        <li><a href = "cad_forn_web.php">Cadastrar novo fornecedor</a></li>
                        <li>Consultar fornecedores</li>
                        <li><a href = "home_page.html">Sobre a Sigma</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>CNPJ</th>
                        <th>Razão Social</th>
                        <th>IE</th>
                        <th>Email</th>
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
                    <?php include("consul_forn.php"); do{ ?>
                    <tr>
                        <td>
                            <?php
                                echo $linha['cnpj_forn'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['nome_razaosocial_forn'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['ie_forn'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['EMAIL_forn'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['DD_TELEFONE_forn'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['ESTADO_forn'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['cep_forn'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['CIDADE_forn'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['BAIRRO_forn'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['RUA_forn'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $linha['NUMERO_forn'];
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($linha['flg_status_forn'] == 1){
                                    echo "Ativo";
                                }else{
                                    echo "Inativo";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                echo date('d/m/Y H:i:s', strtotime($linha['dt_cadastro_forn']));
                            ?>
                        </td>
                        <td>
                            <?php
                                echo date('d/m/Y H:i:s', strtotime($linha['DT_ALTERACAO_forn']));
                            ?>
                        </td>
                        <td>
                            <?php
                                echo "<a href=\"editar_forn.php?id=$id_forn\">Editar </a>";
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