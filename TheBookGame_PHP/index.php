
<html>
<head>
<?php 

?>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>

	<div class="wrapper">
		<h1>Livre ou vous êtes le heros</h1>
		<h2>
			Bienvenue dans vôtre livre,là ou vous êtes le heros <span>
				THEBOOKGAME </span> Go!
		</h2>

		<div class="content">



			<table border="0">
				<tr>
					<td rowspan="4">



						<div id="form_wrapper" class="form_wrapper">

							<form  class="login active" method="POST">
								<h3>Login</h3>
								<div>

									<label>Nom utilisateur:</label> <input type="text" name="user"
										placeholder="Username" /> <span class="error">Eurreur de
										saisie</span>
								</div>
								<div>
									<label>Mot de passe : <a href="pages/mot_de_passe_oublie.php"
										rel="forgot_password" class="forgot linkform">Mot de passe
											oublié?</a>
									</label> <input type="password" name="password"
										placeholder="Password" /> <span class="error">Erreur de mot de
										passe</span>
								</div>
								<div class="bottom">
									<div class="remember">
										<input type="checkbox" /><span>Garder ma session active</span>
									</div>
									<input type="submit" name="submit1" value="Login"></input> 
									<a href="pages/inscription.php" rel="register" class="linkform">Vous
										n'avez pas un compte ? Inscrivez-vous</a>
									<div class="clear"></div>
								</div>
							</form>



						</div>

					</td>

					<td><a href="pages/a_propos.php"> <img class="image" alt="Home"
							src="img/Home.png" style="width: 100px; height: 100px;">
					</a>
					</td>


				</tr>
				<tr>
					<td><a href="pages/a_propos.php"> <img class="image"
							alt="A Propos TheBookGame" src="img/propos.png"
							style="width: 100px; height: 100px;">
					</a>
					</td>

				</tr>

				<tr>

					<td><a href="index.php"> <img class="image" alt="Deconnecter"
							src="img/Power.png" style="width: 100px; height: 100px;">
					</a>
					</td>
				</tr>
			</table>

			<div class="clear">
				<p></p>
				<p></p>
				<p></p>
				<h2>
					<span> ESGI Copyright - Tous droits réservés © 2012-2013 </span>



				</h2>


			</div>

		</div>
	</div>

	<?php

	require_once ('WS/lib/nusoap.php');
	//Give it value at parameter
	$param = array( 'username' => 'esgi',
					'$password'=>'esgi'
				  );
	
	//Create object that referer a web services
	$client = new soapclient('http://localhost/ProjetXML/TheBookGame_PHP/WS/server.php');
	//Call a function at server and send parameters too
	$response = $client->call('get_message',$param);
	//Process result
	if($client->fault)
	{
		echo "FAULT: <p>Code: (".$client->faultcode."</p>";
	
		echo "String: ".$client->faultstring;
	}
	else
	{
		echo $response;
	}
	
	
//	if(!Empty($_POST['user']) && !Empty($_POST['password'])  )
//	{
//		$username=$_POST['user'];
//	    $pass=	$_POST['password'];
	    
	/*	require_once ('WS/lib/nusoap.php');
		//Give it value at parameter
		$param = array( 'username' => 'esgi','password'=>'esgi');
		//Create object that referer a web services
		$client = new soapclient('http://localhost/ProjetXML/WS/server.php');
		//Call a function at server and send parameters too
		$response =	$client->call('authenticateUser',$param);
		
		print_r($response);
		//echo $response;
		
		//Process result
		if($client->fault)
		{
			//echo "FAULT: <p>Code: (".$client->faultcode."</p>";
		
		//	echo "String: ".$client->faultstring;
		}
		else
		{
			//echo $response;
		}
		
/*		if($response==false)
		{
	    	echo '<span style="color:red;font-size: 14pt"> <MARQUEE>Erreur de connexion</MARQUEE></span>';
 	
		//	echo "String: ".$client->faultstring;
		}
		if($response==true)
		{
			//echo "ok";
			//session_start();
 			//$_SESSION['utilisateur']="".$Membre->user;
 	//	header('Location: pages/home.php');
		}*/
 
	//}

	


	?>

</body>

</html>
