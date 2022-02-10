<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="reset.css"> 
        <link rel="stylesheet" href="navegacoes.css">
        <link rel="stylesheet" href="cad_cli.css"> 
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <meta charset="utf-8">
        <title>Edição de fornecedor</title>
        
    </head>
    <body>
        <header>
            <div class="cabecalho">
                <h1><a href="home_page.html"><img src="Imagens/Logo_SigmaNOVO.jpeg" class="img_logo"></a></h1>
                <nav>
                    <ul>
                        <li>Cadastrar novo fornecedor</li>
                        <li><a href = "consul_forn_web.php">Consultar fornecedores</a></li>
                        <li><a href = "home_page.html">Sobre a Sigma</a></li>

                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <?php include("consul_forn.php"); do{ ?>
                <form name="Editar_Fornecedor" action="upd_forn.php" method="POST">
                    <label for="cnpj_forn">CNPJ</label>
                    <input type="number" id="cnpj_forn" class="input_padrao" required name="cnpj_forn" value = <?php echo $linha['cnpj_forn'] ?>> 

                    <label for="raz_forn">Razão Social</label>
                    <input type="text" id="raz_forn" class="input_padrao" required name="raz_forn" value = <?php echo $linha['nome_razaosocial_forn']; ?>>
                    
                    <legend>IE</legend>
                    <select class="ie_forn" required name="ie_forn" value = <?php echo $linha['ie_forn'] ?>>
                        <?php
                            for($i = 1; $i <= 50; $i++){ 
                               echo "<option> $i </option>";
                            } ?>
                    </select>
                                

                    <label for="email_forn">Email</label>
                    <input type="email" id="email_forn" class="input_padrao" name="email_forn" value = <?php echo $linha['EMAIL_forn'] ?>>

                    <label for="tel_forn">Telefone</label>
                    <input type="tel" id="tel_forn" class="input_padrao" name="tel_forn" value = <?php echo $linha['DD_TELEFONE_forn'] ?>>
                    
                    <fieldset>
                        <legend>Estado</legend>
                        <select class="estado" required name="estado" value = <?php echo $linha['ESTADO_forn'] ?>>
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
                        

                        <label for="cep_forn">CEP</label>
                        <input type="text" id="cep_forn" class="input_padrao" required name="cep_forn" value = <?php echo $linha['cep_forn'] ?>>
                        
                        <input type="button" id="btn_cep" name="btn_cep" value="Consultar CEP">
                        

                        <label for="cidade_forn">Cidade</label>
                        <input type="text" id="cidade_forn" class="input_padrao" required name="cidade_forn" value = <?php echo $linha['CIDADE_forn'] ?>>

                        <label for="bairro_forn">Bairro</label>
                        <input type="text" id="bairro_forn" class="input_padrao" required name="bairro_forn" value = <?php echo $linha['BAIRRO_forn'] ?>>

                        <label for="rua_forn">Rua</label>
                        <input type="text" id="rua_forn" class="input_padrao" required name="rua_forn" value = <?php echo $linha['RUA_forn'] ?>>

                        <label for="num_forn">Número</label>
                        <input type="number" id="num_forn" class="input_padrao" required name="num_forn" value = <?php echo $linha['NUMERO_forn'] ?>>
                    </fieldset>

                    <input type="submit" value="Atualizar Fornecedor" class="enviar">
                    
                    <script>
                        $(document).ready(function(){
                            $("#btn_cep").click(function(){
                                let cepValue = $("#cep_forn").val();

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
                                    $("#cidade_forn").val(addressCidade);
                                    $("#bairro_forn").val(addressDistrict);
                                    $("#rua_forn").val(address);
                                });
                            });
                        });
                    </script>

                </form>
            <?php }while($linha_upd = mysqli_fetch_assoc($upd_forn)); ?>
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