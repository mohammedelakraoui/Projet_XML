<?php
 //call library  
 require_once ('lib/nusoap.php');  
 //using soap_server to create server object  
 $server = new soap_server;  
 
 //register a function that works on server  
 $server->register('authenticateUser'); 
 $server->register('Get_liste_jeux');

 // -----Authentification
 function authenticateUser($username,$password)
 {
    if (file_exists('../src/authentification.xml')) 
    {
 	$xml = simplexml_load_file('../src/authentification.xml');
 //   return $xml;
 	foreach ($xml->utilisateur as $Membre)
 	{
            
 		if(trim($Membre-> user) == $username && trim($Membre -> password)==$password)
 		{
 			return "true";
 			
 		}
 		else {
            return "false";
 			}
 	}
 
 }
 else
 {
 	return "flase";
 	//exit('Echec lors de l\'ouverture du fichier authentification.xml.');
 }
 
 }
 // fin

 // -------------- Meta information
 
 function Get_liste_jeux($username){
 
 	if (file_exists('../src/jeux_version_beta.xml'))
 	{
 		$xml = simplexml_load_file('../src/jeux_version_beta.xml');
 		//Affichage de la présentation
 		$req= "//jeu[@id='$username']/@title";
        $Title="";
 		foreach ($xml->xpath($req) as $title )
 		{
 			$Title=$Title."<li><h2> Liste de Jeux de ".$username.": <span> ".$title."</span></h2></li>";
 
 		}
 		$req2= "//jeu[@id='$username']";
        $Info="";
 		foreach ($xml->xpath($req2) as $jeu ) {
 
 			$Info=$Info."<li><h2>Jeu: ".$jeu['title']." : <span> ".$jeu->situation->count()."->situation(s)</span></h2></li>";
 		}
      return $Title.$Info;
 	}
 
 }
 
 //----------------------------

 
 
 
 // create HTTP listener  
 $server->service($HTTP_RAW_POST_DATA);  
 exit();  
?> 

