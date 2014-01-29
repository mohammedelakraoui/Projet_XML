
<html>
<head>
<?php 
include 'gestion_des_requetes.php';
session_start();
?>
<script type="text/javascript">
function check1(){
 
	var radio2=document.getElementById("radio2");
    radio2.checked=false;

 
}
function check2(){
	var radio1=document.getElementById("radio1");
	radio1.checked=false;
}
function  write_(){

document.location='ajouter.php?compteur='+(combo.value);

}
</script>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/style3.css" />
</head>
<body>
	<div class="wrapper">
		<h1>Livre dont vous êtes le heros</h1>
		<h2>
			Bienvenue<span></span> dans vôtre livre,là ou vous êtes le heros <span>
				Iscrivez-vous maintenant </span> !
		</h2>
		<div class="content">


			<table border="0">
				<tr>
					<td rowspan="7" style="width: 800px;">



						<div id="form1" class="form1">


							<form class="form" METHOD="POST">
								<p class="code">

									<label for="code">Code</label>

									<?php 

									//Get_last_code($_SESSION('utilisateur'));
									echo Get_last_code();
									?>


								</p>

								<p class="titre">

									<input type="text" name="titre"
										placeholder="Saisissez un titre" autocomplete="off"> </input>
									<label for="web">Titre du jeu</label>
								</p>


								<p>
									<label for="text">Exposition</label>
								</p>

								<p class="text">
									<textarea name="exposition"
										placeholder="citez votre exposition"></textarea>

								</p>

								<p></p>
								<p class="reponse">

									<input type="text" value="" name="question" id=""
										placeholder="Saisissez votre question?"> </input> <label
										for="web">Question?</label>
								</p>
								<p class="reponse">
									<input type="radio" value="" name="combobox" id="radio1"
										onclick="check1();" checked><label for="web">Liste de choix?</label>
									</input> <a style="padding-right: 307px;"></a>

								</p>



								<p class="reponse">
									<input type="radio" value="" name="textbox" id="radio2"
										onclick="check2();"><label for="web">Zone de saisir?</label> </input>

								</p>
								<p class="">

									<?php   

									//   Put_value_in_Session($value)


									if(!Empty($_GET['compteur']))
									{
										echo "<p id='ici'>";
										$cmpt=$_GET['compteur'];
										$_SESSION['nb_rep']="".$cmpt;
										for($i=1;$i<=$cmpt;$i++){
											echo " <input type='text'  name='rep$i' placeholder='saisissez votre reponse'>";
											charger_situation($cmpt,$i);
										}
										echo "</p>";
									}
									else{
										echo	"<label for=''>Nombre des reponses</label>";
										echo "<div><select id='combo' class='go'  onchange='write_();' style='width: 342;'>";
											
										for($i=1;$i<=10;$i++){

											echo "<option>$i</option>";

										}
										echo "</select>";
									}


									?>

								</p>

								</p>

								<p class="submit">
									<input type="submit" value="Enregester" />
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


if(!Empty($_POST['question']) && !Empty($_POST['exposition']) ){

	$type;
	$rep=array();
	$code_rep=array();
	$code=htmlspecialchars(Get_last_code());
	$question=htmlspecialchars ($_POST["question"]);
	$exposition=htmlspecialchars ($_POST["exposition"]);
	$titre=trim($_POST["titre"]);
	$compteur=htmlspecialchars ($_SESSION['nb_rep']);
	$id=htmlspecialchars($_SESSION['utilisateur']);
	for($i=1;$i<=$compteur;$i++)
	{
		$rep[$i]=$_POST["rep$i"];
		$code_rep[$i]=$_POST["code$i"];
	}

	if (isset($_POST['combobox']))
	{
		$type="combobox";
	}
	else{
		$type="text";
			
	}


	if (!file_exists("../src/jeux_version_beta.xml"))
	{
		$file_= fopen("../src/jeux_version_beta.xml", "w+");
		fwrite($file_,'<?xml version="1.0" encoding="UTF-8"?>
<p:livres xmlns:p="http://www.esgi.fr/2013/ProjetXML" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.esgi.fr/2013/ProjetXML ProjetXML_Schema.xsd">
<livre></livre></p:livres>');
		fclose($file_);

	}
	if (file_exists("../src/jeux_version_beta.xml"))
	{
      
		$xml = simplexml_load_file("../src/jeux_version_beta.xml");
		
		$root_jeu = new SimpleXMLElement($xml->asXML());
		print_r($root_jeu);
		$jeu= $root_jeu->livre-> addChild('jeu');
		$jeu->addAttribute('id',"\n".$id."\n");
		$jeu->addAttribute('title',"\n".$titre."\n");
		$jeu-> addChild('situation');
		//   $xml->utilisateurs->addChild('utilisteur');

		$jeu->situation->addChild('code',"\n".$code."\n");
		$jeu->situation->addChild('exposition',"\n".$exposition."\n");
		$jeu->situation->exposition->addAttribute('code', 'value');
		$jeu->situation->addChild('question',"\n");
		$jeu->situation->question->addChild('label',"\n".$question."\n");
		$jeu->situation->question->label->addAttribute('type', $type);
		$jeu->situation->question->addChild('choix',"\n");

		for($i=1;$i<=$compteur;$i++)
		{
			$child=$jeu->situation->question->choix->addChild('rep',"\n".$rep[$i]."\n");
			$child->addAttribute('val',$i);

		}

		$jeu->situation->question->addChild('suivant',"\n");
		$jeu->situation->question->suivant->addChild('si',"\n");

		for($i=1;$i<=$compteur;$i++)
		{
			$test__=$jeu->situation->question->suivant->si->addChild('test',"\n");
			$test__->addAttribute('val',$i);
			$test__->addChild('code',"\n".$code_rep[$i]."\n");
		}

		$root_jeu -> asXML("../src/jeux_version_beta.xml");
		header('Location: validation.php');

	}



	else {
		echo 'La checkbox n\'est pas cochée';
	}

}



?>