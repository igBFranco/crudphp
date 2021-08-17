<?php
	// testando se está sendo passado algum código de erro para a 'index'
	// utilizando 'if ternário
	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0 ;
	// echo $erro;
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <!-- Font Awesome - Icons & Fonts -->
    <script src="https://kit.fontawesome.com/35898f413d.js" crossorigin="anonymous"></script>

    <!-- Codificação CSS para a página de Login-->
    <!-- Para este exemplo, utilizei uma template padrão disponível na Internet -->
    <style type="text/css">
        body {
            font-family: "Lato", sans-serif;
        }
        .main-head{
            height: 150px;
            background: #FFF;
        
        }
        .sidenav {
            height: 100%;
            overflow-x: hidden;
            padding-top: 20px;
        }
        .main {
            padding: 0px 10px;
        }
        label {
            display: block;
        }
        .window {
            display: none;
            width: 600px;
            height: 540px;
            position: absolute;
            left: 0;
            top: 0;
            background: #FFF;
            z-index: 9900;
            padding: 10px;
            border-radius: 10px;
        }
        #mascara {
            display: none;
            position: absolute;
            left: 0;
            top: 0;
            z-index: 9000;
            background-color: #000;
        }
        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
        }
        @media screen and (max-width: 450px) {
            .login-form{
                margin-top: 10%;
            }

            .register-form{
                margin-top: 10%;
            }
        }
        @media screen and (min-width: 768px){
            .main{
                margin-left: 40%; 
            }

            .sidenav{
                width: 40%;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
            }

            .login-form{
                margin-top: 80%;
            }

            .register-form{
                margin-top: 20%;
            }
        }
        .login-main-text{
            margin-top: 20%;
            padding: 60px;
            color: #fff;
        }
        .login-main-text h2{
            font-weight: 300;
        }
        .btn-blue{
            background-color: #084B8A !important;
            color: #fff;
        }
    </style>

    <script>
			// código javascript
			// verificando via JQuery se o documento foi carregado
			$(document).ready(function () {
				// verificando se os campos de usuário e senha foram preenchidos
				$('#btnLogin').click(function () {
					var campo_vazio = false;
					// testando o campo 'usuario'
					if ($('#campoUsuario').val() == '') {
						// modificando os atributos visuais do campo 'usuario'
						$('#campoUsuario').css({'border-color': '#A94442'});
						campo_vazio = true;
					}
					else {
						// caso o campo 'usuario' não esteja vazio forçamos a cor da borda
						$('#campoUsuario').css({'border-color': '#CCC'});						
					}
					// testando o campo 'senha'
					if ($('#campoSenha').val() == '') {
						// modificando os atributos visuais do campo 'usuario'
						$('#campoSenha').css({'border-color': '#A94442'});
						campo_vazio = true;
					}
					else {
						// caso o campo 'senha' não esteja vazio forçamos a cor da borda
						$('#campoSenha').css({'border-color': '#CCC'});						
					}
					if (campo_vazio) return false;
				});
			});	
		</script>

    <title>Biblioteca Virtual - UnC 202/1 - Versão do Professor</title>
  </head>
  <body>
    <div class="sidenav bg-primary">
        <div class="login-main-text">
            <h2>Biblioteca Virtual<br> Seja bem vindo!</h2>
            <p>Realize o login ou registre para acessar o sistema</p>
        </div>
    </div>
    <div class="main">
        <form method="post" action="./usuarios/realizarLogin.php" id="formLogin">
            <div class="col-md-6 col-sm-12">
                <div class="login-form">
                    <form>
                        <div class="form-group">
                            <label>Usuário</label>
                            <input type="text" class="form-control" id="campoUsuario" name="usuario" placeholder="Usuário">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control red" id="campoSenha" name="senha" placeholder="Senha">
                        </div>
                        <button type="submit" class="btn btn-blue" id="btnLogin">Entrar</button>
                        <a href="#janela1" class="btn btn-secondary" id="btnRegistrar" rel="modal">Registrar</a>
                    </form>
                    <!-- 
						-- exibindo a mensagem de erro para o usuário
						-- caso ocorra problema na autenticação
					-->
					<?php
						if ($erro == 1) {
							echo '<font color="#FF0000">Ocorreu um erro na autenticação!</font>';
						}								
					?>
                </div>
            </div>
        </form>       
    </div>

    <!--- criando o modal para o registro do usuário --->
    <div class="window" id="janela1">
        <h4>Novo Usuário</h4>
        <hr />
        <form id="cadUsuario" action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-6">
                    <label for="inputNome">Nome</label>
                    <input type="text" class="form-control" id="inputNome" name="nome">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCPF">CPF</label>
                    <input type="text" class="form-control" id="inputCPF" name="cpf">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-4">
                    <label for="inputNasc">Nascimento</label>
                    <input type="text" placeholder="DD/MM/YYYY" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" id="inputNasc" name="nascimento">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCidade">Cidade</label>
                    <input type="text" class="form-control" id="inputCidade" name="cidade">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEstado">Estado</label>
                    <select type="text" class="form-control" id="inputEstado" name="estado">
                        <option value="PR">Paraná</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="SC">Santa Catarina</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-7">
                    <label for="inputEmail">E-Mail</label>
                    <input type="email" class="form-control" id="inputEmail" name="email">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCelular">Celular</label>
                    <input type="text" class="form-control" id="inputCelular" name="celular">
                </div>
            </div>
			<hr/>
            <div class="form-row">
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-5">
                    <label for="inputUsuario">Nome de usuário</label>
                    <input type="text" class="form-control" id="inputUsuario" name="usuario">
                </div>
                <div class="form-group col-md-5">
                    <label for="inputSenha">Senha</label>
                    <input type="password" class="form-control" id="inputSenha" name="senha">
                </div>
            </div>
            <hr />
            <button type="submit" class="btn btn-primary" value="Salvar" id="btnSalvar">Salvar</button>
        </form>
    </div>
    <!-- POG (PROGRAMAÇÃO ORIENTADA A GAMBIARRA -->
    <div id="mascara"></div>
    <!--- finalizando o modal para o registro do usuário --->

     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

<!-- codificação js -->
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        // script para abrir o modal do formulário de registro
        $("a[rel=modal]").click(function(ev) {
                ev.preventDefault();
    
                var id = $(this).attr("href");
    
                var alturaTela = $(document).height();
                var larguraTela = $(window).width();
    
                //colocando o fundo preto
                $('#mascara').css({'width': larguraTela, 'height': alturaTela});
                $('#mascara').fadeIn(1000);
                $('#mascara').fadeTo("slow", 0.8);
    
                var left = ($(window).width() / 2) - ($(id).width() / 2);
                var top = ($(window).height() / 2) - ($(id).height() / 2);
    
                $(id).css({'top': top, 'left': left});
                $(id).show();
            });
    
            $("#mascara").click(function() {
                $(this).hide();
                $(".window").hide();
            });
    });

    // script para realizar o 'insert' dos dados no banco
    $('#cadUsuario').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"registraUsuario.php",
            method:"POST",
            data:form_data,
            success:function(data){  
                window.location.href = "./home.php";
            }
        })
    });
</script>
