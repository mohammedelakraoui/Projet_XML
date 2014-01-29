<?php 
//Remplir la combobox
error_reporting(0);

function remplir_combo($code)
{

	if (file_exists('../src/jeux_version_beta.xml'))
	{
		$xml = simplexml_load_file('../src/jeux_version_beta.xml');
		//Affichage de la présentation
		foreach ($xml->jeu->situation as $Situation_)
		{
			if($code==trim($Situation_->code))
			{
				$req1="//situation[code='$code']/question/label[@type='text']";
				$req2="//situation[code='$code']/question/label[@type='combobox']";
				if($xml->xpath($req1))
				{
					echo "<div><input type='text' id='combo' class='go'  onchange='' style='width: 342;'>";

				}
				if($xml->xpath($req2))
				{
					echo "<div><select id='combo' class='go'  onchange='' style='width: 342;'>";
					foreach ($Situation_->question->choix->rep as $rep_)
					{
						$new=htmlentities($rep_ ,ENT_QUOTES);
						echo "<option>$new</option>";
							
					}
				 echo "</select>";

				}

			}
		}

	}

}

function get_presentation(){

	//$select= $_POST["combo"];
	//   $presentation=$_POST["presentation"];

	if (file_exists('../src/jeux_version_beta.xml'))
	{
		$xml = simplexml_load_file('../src/jeux_version_beta.xml');
		//Affichage de la présentation

		foreach ($xml->jeu as $jeu)
		{
			$new=htmlentities($jeu->presentation,ENT_QUOTES);
			//   print $new;
			return $new;
		}
	}

}

function Get_exposition($code){

	if (file_exists('../src/jeux_version_beta.xml'))
	{
		$xml = simplexml_load_file('../src/jeux_version_beta.xml');
		//Affichage de la présentation

		foreach ($xml->jeu->situation as $Situation_)
		{
			if($code==trim($Situation_->code))
			{

				$new=htmlentities($Situation_->exposition ,ENT_QUOTES);
				echo "<p><h2>$new</h2></p>";

					
			}
		}

	}
}

function Get_code_suivant($number_select,$code_situation)
{

	if (file_exists('../src/jeux_version_beta.xml'))
	{
		$xml = simplexml_load_file('../src/jeux_version_beta.xml');
		//Affichage de la présentation
		$req= "//situation[code='$code_situation']/question/suivant/si/test[@val='$number_select']/code";

		foreach ($xml->xpath($req) as $code )
		{
			return $code;
		}

	}




}

function Get_liste_jeu($code_user){

	if (file_exists('../src/jeux_version_beta.xml'))
	{
		$xml = simplexml_load_file('../src/jeux_version_beta.xml');
		//Affichage de la présentation
		$req= "//jeu[@id='$code_user']/@title";

		foreach ($xml->xpath($req) as $title )
		{
			echo "<li><h2> Liste de Jeux de ".$code_user.": <span> ".$title."</span></h2></li>";

		}
		$req2= "//jeu[@id='$code_user']";

		foreach ($xml->xpath($req2) as $jeu ) {

			echo "<li><h2>Jeu: ".$jeu['title']." : <span> ".$jeu->situation->count()."->situation(s)</span></h2></li>";
		}

	}

}

//Gestion des jeux
function Get_last_code()
{
	if (file_exists('../src/jeux_version_beta.xml'))
	{

		$xml = simplexml_load_file('../src/jeux_version_beta.xml');

		//$req="//jeu[@id='$id_utilisateur']/situation/code[not(. < //jeu[@id='$id_utilisateur']/situation/code)][1]";
		$req="//situation/code[not(.<//situation/code)][1]/text()";
		$val= $xml->xpath($req);
		return ($val[0]+1);


	}else{

		$file_= fopen("../src/jeux_version_beta.xml", "w+");
		fwrite($file_,'<?xml version="1.0" encoding="UTF-8"?>
				<p:livres xmlns:p="http://www.esgi.fr/2013/ProjetXML" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.esgi.fr/2013/ProjetXML ProjetXML_Schema.xsd">
				<livre></livre></p:livres>');
		fclose($file_);
		return 1;

	}
}

function Put_value_in_Session($value){
	session_start();
	$_SESSION['compteur']="".$value;
}
// suppression
function charger_Combo_supp($id_utilisateur){


	if (file_exists("../src/jeux_version_beta.xml"))
	{
		$xml = simplexml_load_file("../src/jeux_version_beta.xml");

		$situation=$xml->xpath('//jeu[@id=\''.$id_utilisateur.'\']/situation');

		echo "<div><select id='supp' name='supp' class='go'  onchange=\"\" style='width: 342;'>";
		foreach($situation as $situation_ ){

			echo "<option>$situation_->code</option>";

		}
	}
	echo "</select>";
}
function supprimer($id)
{
	if (file_exists("../src/jeux_version_beta.xml"))
	{

		$xml = simplexml_load_file("../src/jeux_version_beta.xml");

		$jeu=$xml->xpath('//jeu[@id=\''.$id.'\']');
		//print_r($jeu);
		unset($jeu);
		$xml->asXML("../src/jeux_version_beta.xml");
		//	header('Location: validation.php');
		//  charger_Combo_supp($id);

	}
}
function charger_situation($id_combo,$i){


	if (file_exists("../src/jeux_version_beta.xml"))
	{
		$xml = simplexml_load_file("../src/jeux_version_beta.xml");

		$code1=$xml->xpath('//test/code[not(.<//test/code)][1]/text()');

		echo "<select  name='code$i' class='go'  onchange='' style='width: 150px;'>";

		for($j=1;$j<=$id_combo;$j++){

			echo "<option>".($code1[0]+$j+1)."</option>";

		}

		echo "</select>";

	}

}
?>