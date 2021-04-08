<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Consulta Pacientes</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script type="text/javascript" src="js/jquery-2.1.0.js"></script>
      
      <script type="text/javascript">
      $(document).ready(function(){
    
        //Aqui a ativa a imagem de load
        function loading_show(){
        $('#loading').html("<img src='img/loading.gif'/>").fadeIn('fast');
        }
        
        //Aqui desativa a imagem de loading
        function loading_hide(){
            $('#loading').fadeOut('fast');
        }       
        
        // aqui a fun��o ajax que busca os dados em outra pagina do tipo html, n�o � json
        function load_dados(valores, page, div)
        {
            $.ajax
                ({
                    type: 'POST',
                    dataType: 'html',
                    url: page,
                    beforeSend: function(){//Chama o loading antes do carregamento
                      loading_show();
            },
                    data: valores,
                    success: function(msg)
                    {
                        loading_hide();
                        var data = msg;
                  $(div).html(data).fadeIn();				
                    }
                });
        }
        
        //Aqui eu chamo o metodo de load pela primeira vez sem parametros para pode exibir todos
        load_dados(null, 'pesquisa.php', '#');
        
        
        //Aqui uso o evento key up para come�ar a pesquisar, se valor for maior q 0 ele faz a pesquisa
        $('#cns').keyup(function(){
            
            var valores = $('#form_pesquisa').serialize()//o serialize retorna uma string pronta para ser enviada
            
            //pegando o valor do campo #pesquisaCliente
            var $parametro = $(this).val();
            
            if($parametro.length >= 13)
            {
                load_dados(valores, 'pesquisa.php', '#MostraPesq');
            }else
            {
                load_dados(null, 'pesquisa.php', '#');
            }
        });
    
      });
      </script>	
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"><img src="img/logo_menor.png">Cartão Nacional</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="http://www.coronavirus.sc.gov.br/">Site do Coronavirus</a></li>
        <li><a href="http://importacartao.eletivassc.com.br">Importa Cartão</a></li>
        <li><a class="white-text" href="https://www.saude.sc.gov.br/">SES</a></li>

      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="http://www.coronavirus.sc.gov.br/">Site do CoronaVirus</a></li>
        <li><a href="http://importacartao.eletivassc.com.br">Importa Cartão</a></li>
        <li><a href="https://www.saude.sc.gov.br/">SES</a></li>


      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Consulta Paciente</h1>
      <div class="row center">
        <h5 class="header col s12 light">Verifique o paciente digitando o cartão nacional abaixo</h5>
      </div>
      <div class="row center">
      
      
             
<?php include("contador.php"); ?>  

<center>
  <article>
         
          <form name="form_pesquisa" id="form_pesquisa" method="post" action="">
      <fieldset>
        <legend>Digite o Número do Cartao</legend>
          <div class="input-prepend">
            <span class="add-on"><i class="icon-search"></i></span>
            <input type="text" name="cns" id="cns" value="" tabindex="1" placeholder="Pesquisar Cartao Nacional..." />
          </div>
      </fieldset>
    </form>

          
        

        <?php 

        $today = date("20y");                         
      

       ?>
      
    
    
    
    
    
    
    
      <div id="contentLoading">
				<div id="loading"></div>
			</div>
			<section class="jumbotron">
				<div id="MostraPesq"></div>
			</section>
		</article>
	</center>
    </div>
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">

          <img class="responsive-img" src="img/c3.jfif">

          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">

            <img class="responsive-img" src="img/corona.jpg">
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">

            <img class="responsive-img" src="img/logo2.png">
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Secretaria de Estado da Saúde</h5>
          <p class="grey-text text-lighten-4"> @ <?php echo $today; ?>.</p>

        </div>
        <div class="col l3 s12">
          <h5 class="white-text"></h5>
          <img class="responsive-img" src="img/logo2.png">

        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Conecta</h5>
          <ul>
            <li><a class="white-text" href="https://www.saude.sc.gov.br/">SES</a></li>
            <li><a class="white-text" href="http://importacartao.eletivassc.com.br/">Importa Cartão</a></li>
            <li><a class="white-text" href="http://www.coronavirus.sc.gov.br/">Site do Coronavirus</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">Secretaria de Estado da Saúde 
    @ <?php echo $today; ?> <a class="orange-text text-lighten-3" href="http://materializecss.com"></a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>

