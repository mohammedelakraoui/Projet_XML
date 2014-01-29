
<html>
<head>

<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/style2.css" />
<?php

$suivant_=305;

if(!Empty($_GET['choix']) && !Empty($_GET['code']))
{
	$choix=$_GET['choix'];
	$code=$_GET['code'];
	include 'gestion_des_requetes.php';
	$suivant_=Get_code_suivant($choix,$code);
}

echo "<script type='text/javascript'>";

echo  "    function  get_index(combo){";
echo "	 document.location=\"interface_jeu.php?choix=\"+(combo.selectedIndex+1)+\"&code=".$suivant_."\";";

echo "}";

echo " </script>";





?>
</head>
<body>

	<div class="wrapper">
		<h1>Livre dont vous êtes le heros</h1>
		<h2>
			Bienvenue <span id='user'> <?php 

			session_start();
			//echo ''.$_GET['user'];

			echo $_SESSION['utilisateur'];




			?>

			</span> dans vôtre livre,live dont vous êtes le heros <span> Jouez...
			</span> !
		</h2>

		<table border="0">
			<tr>
				<td rowspan="7" style="width: 800px;">


					<div id="form_wrapper" class="">
						<form action="interface_jeu.php" name="form1" Method="POST">

							<?php
							//print $_POST['choix'];
							if(!Empty($_GET['choix']) && !Empty($_GET['code']))
							{

								$choix=$_GET['choix'];
			                    $code=$_GET['code'];
			     //     include 'gestion_des_requetes.php';
			                     Get_exposition($code);
			     // Get_code_suivant($choix,$code);
			                 	 remplir_combo($code);

			   	  
							}
							else{
									
								$choix=1;
								$code=1;
			                    include 'gestion_des_requetes.php';
			                    Get_exposition($code);
			                    remplir_combo($code);
							}

							?>

							<input type="button" class="go"
								onclick='get_index(document.getElementById("combo"));'
								value="GO"></a>
					
					</div>

				</td>

				<td><a href="home.php"> <img class="image" alt="Home" title="Home"
						src="../img/Home.png" style="width: 100px; height: 100px;">
				</a>
				</td>
			</tr>
			<tr>
				<td><a href="ajouter.php"> <img class="image" title="Ajouter un jeu"
						src="../img/ajouter.png" style="width: 100px; height: 100px;">
				</a>
				</td>
		
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
				<td><a href="meta_info.php"> <img class="image"
						alt="Meta-Informations" title="Meta-Informations"
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
				<span> </span>



			</h2>


		</div>

	</div>
	</div>

</body>
</html>
