<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="reset.css"> 
        <link rel="stylesheet" href="navegacoes.css">
        <link rel="stylesheet" href="cad_cli.css"> 
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <meta charset="utf-8">
        <title>Cadastro de cliente</title>
        
    </head>
    <body>
        <header>
            <div class="cabecalho">
                <h1><a href="home_page.html"><img src="Imagens/Logo_SigmaNOVO.jpeg" class="img_logo"></a></h1>
                <nav>
                    <ul>
                        <li>Cadastrar novo cliente</li>
                        <li><a href = "consul_cli_web.php">Consultar clientes</a></li>
                        <li><a href = "home_page.html">Sobre a Sigma</a></li>

                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <?php include("consul_cli.php"); do{?>
                <form name="Cadastro_Cliente" action="upd_cli.php" method="POST">
                    <label for="cnpjcpf">CNPJ/CPF</label>
                    <input type="number" id="cnpjcpf" class="input_padrao" required name="cnpjcpf" value = <?php echo $linha['CNPJ_CPF']; ?>>
                    

                    <label for="razsocial">Razão social</label>
                    <input type="text" id="razsocial" class="input_padrao" required name="razsocial" value = <?php echo $linha['NOM_RAZAOSOCIAL']; ?>>

                    <label for="email">Email</label>
                    <input type="email" id="email" class="input_padrao" placeholder="seuemail@dominio.com" name="email" value = <?php echo $linha['EMAIL']; ?>>

                    <label for="cel">Celular</label>
                    <input type="tel" id="cel"  class="input_padrao"required placeholder="(XX) XXXX-XXXX" name="cel" value = <?php echo $linha['DD_CELULAR']; ?>>

                    <label for="tel">Telefone</label>
                    <input type="tel" id="tel" class="input_padrao" required placeholder="(XX) XXXX-XXXX" name="tel" value = <?php echo $linha['DD_TELEFONE']; ?>>
                    
                    <fieldset>
                        <legend>Estado</legend>
                        <select class="estado" required name="estado" value = <?php echo $linha['ESTADO']; ?>>
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
                        

                        <label for="cep">CEP</label>
                        <input type="text" id="cep" class="input_padrao" required name="cep" value = <?php echo $linha['cep']; ?>>
                        
                        <input type="button" id="btn_cep" name="btn_cep" value="Consultar CEP">
                        

                        <label for="cidade">Cidade</label>
                        <input type="text" id="cidade" class="input_padrao" required name="cidade" value = <?php echo $linha['CIDADE']; ?>>

                        <label for="bairro">Bairro</label>
                        <input type="text" id="bairro" class="input_padrao" required name="bairro" value = <?php echo $linha['BAIRRO']; ?>>

                        <label for="rua">Rua</label>
                        <input type="text" id="rua" class="input_padrao" required name="rua" value = <?php echo $linha['RUA']; ?>>

                        <label for="num">Número</label>
                        <input type="number" id="num" class="input_padrao" required name="num" value = <?php echo $linha['NUMERO']; ?>>
                    </fieldset>
                    <input type="submit" value="Atualizar Cliente" class="enviar">
                    
                    <script>
                        $(document).ready(function(){
                            $("#btn_cep").click(function(){
                                let cepValue = $("#cep").val();

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
                                    $("#cidade").val(addressCidade);
                                    $("#bairro").val(addressDistrict);
                                    $("#rua").val(address);
                                });
                            });
                        });
                        
                        var espaco = 0;
                        $('#cnpjcpf').focus();

                        $('#cnpjcpf').keyup(function(e) {

                        if (e.keyCode == 8 || e.keyCode == 46) {
                            espaco = 0;
                            $('#cnpjcpf').val("");
                        }

                        var text = $('#cnpjcpf').val();

                        if (text[text.length - 1] != ' ') {
                            $('.qtd').text((text.length - espaco));
                        } else {
                            espaco++;
                        }

                        });
                    </script>

                </form>
            <?php }while($linha_upd = mysqli_fetch_assoc($upd_cli)); ?>
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