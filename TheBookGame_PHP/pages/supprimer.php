
<html>
<head>
<?php 
include 'gestion_des_requetes.php';
session_start();
?>
<script type="text/javascript">
function  put_value(){
    var combo=document.getElementById("supp");
	document.location='supprimer.php?supp='+(combo.value);

	}
</script>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/style3.css" />
</head>
<body>

	<div class="wrapper">
		<h1>Livre dont vous êtes le heros</h1>
		<h2>
			Bienvenue dans vôtre livre,là ou vous êtes le heros <span>
				Suppression </span> !
		</h2>
		<div class="content">


			<table border="0">
				<tr>
					<td rowspan="7" style="width: 800px;">



						<div id="form1" class="form1">


							<form class="form" METHOD="POST">

								<p class="code">

									<label for="code">Code du jeu a supprimer</label>
									<code>
										<?php 
										
										charger_Combo_supp('admin');
										?>
									</code>

								</p>


								<p class="submit">
									<input type="button" value="supprimer" onclick="put_value();" />
									<?php 
									
									
									?>
								</p>

							</form>


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
if(isset($_GET['supp'])){
supprimer('admin');
}



?>