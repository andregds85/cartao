<?php
	//recebemos nosso par�metro vindo do form
	$parametro = isset($_POST['cns']) ? $_POST['cns'] : null;
	$msg = "  ";
	//come�amos a concatenar nossa tabela
	$msg .="<table class='table table-hover'>";
	$msg .="	<thead>";
	$msg .="		<tr>";
	$msg .="			<th>CNS:</th>";

	$msg .="		</tr>";
	$msg .="	</thead>";
	$msg .="	<tbody>";


   
				
				//requerimos a classe de conex�o
				require_once('class/Conexao.class.php');
					try {
						$pdo = new Conexao(); 
						$resultado = $pdo->select("SELECT * FROM cns WHERE cns LIKE '$parametro%' ORDER BY cns ");
						$pdo->desconectar();
                        

             
						}catch (PDOException $e){
							echo $e->getMessage();
						}	
						//resgata os dados na tabela
						if(count($resultado)){
							foreach ($resultado as $res) {
						   $msg .="Cartão aguardando internação covid";
		                   $msg .="<tr>";
	                       $msg .="<td>".$res['cns']."</td>";
                           $msg .="</tr>";
							}	
						   }else{
							$msg = " ";
							$msg .="Nenhum resultado foi encontrado...";
						}
	               $msg .="	</tbody>";
                    $msg .="</table>";
	//retorna a msg concatenada
	echo $msg;
?>