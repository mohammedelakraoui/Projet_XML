
<html>
<head>
<?php 
session_start();
//include 'gestion_des_requetes.php';
?>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/style2.css" />
<link rel="stylesheet" type="text/css" href="../css/style3.css" />
</head>
<body>
	<div class="wrapper">
		<h1>Livre dont vous êtes le heros</h1>
		<h2>
			Bienvenue dans vôtre livre,là ou vous êtes le heros <span>
				THEBOOKGAME </span> Go!
		</h2>
		<div class="content">


			<table border="0">
				<tr>
					<td rowspan="8" style="width: 800px;">



						<div id="form_wrapper" class="form_wrapper"
							style="border: 0px solid #ddd;">

							<ul type="circle">
							

								<?php 
								require_once ('../WS/lib/nusoap.php');
								//Give it value at parameter
								$param = array( 'username' => $_SESSION['utilisateur']);
								//Create object that referer a web services
								$client = new soapclient('http://localhost/ProjetXML/TheBookGame_PHP/WS/server.php');
								//Call a function at server and send parameters too
								$response = $client->call('Get_liste_jeux',$param);
								
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
								//Get_liste_jeu(trim($_SESSION['utilisateur']));

								?>



							</ul>



						</div>

					</td>

					<td><a href="home.php"> <img class="image" alt="Home" title="Home"
							src="../img/Home.png" style="width: 100px; height: 100px;">
					</a>
					</td>
				</tr>
				<tr>
					<td><a href="ajouter.php"> <img class="image"
							title="Ajouter un jeu" src="../img/ajouter.png"
							style="width: 100px; height: 100px;">
					</a>
					</td>
				</tr>
				
				<tr>
					<td><a href="supprimer.php"> <img class="image"
							title="Supprimer un/plusieurs jeux" alt="A Propos TheBookGame"
							src="../img/Xion.png" style="width: 100px; height: 100px;">
					</a>
					</td>

				</tr>
				<tr>
					<td><a href="a_propos.php"> <img class="image" title="A propos"
							alt="A Propos TheBookGame" src="../img/propos.png"
							style="width: 100px; height: 100px;">
					</a>
					</td>

				</tr>
				<tr>
				<tr>
				<td><a href="meta_info.php"> <img class="image" alt="Meta-Informations" title="Meta-Informations" 
							src="../img/info.png" style="width: 100px; height: 100px;">
					</a>
				</td>
			</tr>
			<tr>
				
					<td><a href="../index.php"> <img class="image" alt="Deconnecter"
							title="Deconnexion" src="../img/Power.png"
							style="width: 100px; height: 100px;">
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



</body>



</html>


<?php
?>
