<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="reset.css"> 
        <link rel="stylesheet" href="navegacoes.css">
        <link rel="stylesheet" href="cad_cli.css"> 
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <meta charset="utf-8">
        <title>Edição de funcionário</title>
        
    </head>
    <body>
        <header>
            <div class="cabecalho">
            <h1><a href="home_page.html"><img src="Imagens/Logo_SigmaNOVO.jpeg" class="img_logo"></a></h1>
                <nav>
                    <ul>
                        <li>Cadastrar novo funcionário</li>
                        <li><a href = "consul_func_web.php">Consultar funcionários</a></li>
                        <li><a href = "home_page.html">Sobre a Sigma</a></li>

                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <?php include("consul_func.php"); do{ ?>
                <form name="Editar_Funcionario" action="upd_func.php" method="POST">
                    <label for="nome_func">Nome</label>
                    <input type="text" id="nome_func" class="input_padrao" required name="nome_func" value = <?php echo $linha['NOME_FUNC']; ?>>
                    
                    <label for="cpf_func">CPF</label>
                    <input type="number" id="cpf_func" class="input_padrao" required name="cpf_func" value = <?php echo $linha['CPF_FUNC'] ?>>             

                    <label for="email_func">Email</label>
                    <input type="email" id="email_func" class="input_padrao" name="email_func" value = <?php echo $linha['EMAIL_FUNC'] ?>>

                    <label for="cel">Celular</label>
                    <input type="tel" id="cel_func"  class="input_padrao" required name="cel_func" value = <?php echo $linha['DD_CELULARFUNC'] ?>>

                    <label for="tel">Telefone</label>
                    <input type="tel" id="tel_func" class="input_padrao" name="tel_func" value = <?php echo $linha['DD_TELEFONEFUNC'] ?>>
                    
                    <fieldset>
                        <legend>Estado</legend>
                        <select class="estado" required name="estado" value = <?php echo $linha['ESTADO_FUNC'] ?>>
                            <option>SP</option>
                            <option>AC</option>
                            <option>AL</option>
                            <option>AP</option>
                            <option>AM</option>
                            <option>BA</option>
                            <option>CE</option>
                            <option>ES</option>
                            <option>GO</option>
                            <option>MA</option>
                            <option>MT</option>
                            <option>MS</option>
                            <option>MG</option>
                            <option>PA</option>
                            <option>PB</option>
                            <option>PR</option>
                            <option>PE</option>
                            <option>PI</option>
                            <option>RJ</option>
                            <option>RN</option>
                            <option>RS</option>
                            <option>RO</option>
                            <option>RR</option>
                            <option>SC</option>    
                            <option>SE</option>
                            <option>TO</option>
                            <option>DF</option>
                        </select>
                        

                        <label for="cep_func">CEP</label>
                        <input type="text" id="cep_func" class="input_padrao" required name="cep_func" value = <?php echo $linha['cep_FUNC'] ?>>
                        
                        <input type="button" id="btn_cep" name="btn_cep" value="Consultar CEP">
                        

                        <label for="cidade_func">Cidade</label>
                        <input type="text" id="cidade_func" class="input_padrao" required name="cidade_func" value = <?php echo $linha['CIDADE_FUNC'] ?>>

                        <label for="bairro_func">Bairro</label>
                        <input type="text" id="bairro_func" class="input_padrao" required name="bairro_func" value = <?php echo $linha['BAIRRO_FUNC'] ?>>

                        <label for="rua_func">Rua</label>
                        <input type="text" id="rua_func" class="input_padrao" required name="rua_func" value = <?php echo $linha['RUA_FUNC'] ?>>

                        <label for="num_func">Número</label>
                        <input type="number" id="num_func" class="input_padrao" required name="num_func" value = <?php echo $linha['NUMERO_FUNC'] ?>>
                    </fieldset>
                    
                    <label for="cargo_func">Cargo</label>
                    <input type="text" id="cargo_func" class="input_padrao" required name="cargo_func" value = <?php echo $linha['CARGO'] ?>>
                    
                    <label for="salario_func">Salário</label>
                    <input type="number" id="salario_func" class="input_padrao" required name="salario_func" value = <?php echo $linha['SALARIO'] ?>> 

                    <input type="submit" value="Atualizar Funcionário" class="enviar">
                    
                    <script>
                        $(document).ready(function(){
                            $("#btn_cep").click(function(){
                                let cepValue = $("#cep_func").val();

                                cepValue = cepValue.replace(/-/g,"");

                                $.ajax({
                                    method: "GET",
                                    url: "https://cep.awesomeapi.com.br/json/" +cepValue,
                                }).done(function(data){
                                    const addressRua = data.address_name;
                                    const address = data.address;
                                    const addressState = data.state;
                                    const addressDistrict = data.district;
                                    const addressLatitude = data.lat;
                                    const addressLongitude = data.lng;
                                    const addressCidade = data.city;

                                    console.log(addressCidade);
                                    $("#cidade_func").val(addressCidade);
                                    $("#bairro_func").val(addressDistrict);
                                    $("#rua_func").val(address);
                                });
                            });
                        });
                    </script>

                </form>
            <?php }while($linha_upd = mysqli_fetch_assoc($upd_func)); ?>
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