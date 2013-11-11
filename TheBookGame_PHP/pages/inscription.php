
<html>
    <head>
  
             <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>
    <body>
		<div class="wrapper">
			<h1>Livre ou vous êtes le heros</h1>
			<h2>Bienvenue dans  vôtre livre,là ou vous êtes le heros <span> Iscrivez-vous maintenant </span> ! </h2>
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
				
					<form class="register" Method="POST">
						<h3>Inscription</h3>
						<div class="column">
							<div>
								<label>Nom:</label>
								<input type="text" placeholder="First name" name="nom" />
								<span class="error">Erreur de saisie</span>
							</div>
							<div>
								<label>Prénom:</label>
								<input type="text" placeholder="Last Name" name="prenom"/>
								<span class="error">TErreur de saisie</span>
							</div>
							<div>
								<label>Site Web:</label>
								<input type="text" value="http://" placeholder="WebSite" name="website"/>
								<span class="error">Erreur de saisie</span>
							</div>
						</div>
						<div class="column">
							<div>
								<label>Nom utilisateur:</label>
								<input type="text" placeholder="UserName" name="user"/>
								<span class="error">Erreur de saisie</span>
							</div>
							<div>
								<label>E-mail:</label>
								<input type="text" placeholder="exemple@exemple.com" name="email"/>
								<span class="error">Erreur de saisie</span>
							</div>
							<div>
								<label>Mot de passe:</label>
								<input type="password" placeholder="PassWord" name="password"/>
								<span class="error">Erreur de saisie</span>
							</div>
						</div>
						<div class="bottom">
							<div class="remember">
								<input type="checkbox" name="confirmer"/>
								<span>Je confirme que  les terms de contrat "TheBookGame"</span>
							</div>
							<input type="submit" value="Register" />
							<a href="../index.php" rel="login" class="linkform">Avez-vous déja un compte? cliquez ici</a>
							<div class="clear"></div>
						</div>
					</form>
				
			
				</div>
				<div class="clear"></div>
			</div>
	     	</div>
		

    </body>
    
    
</html>


<?php




if(!Empty($_POST['nom']) && !Empty($_POST['prenom']) && !Empty($_POST['user']) && !Empty($_POST['password']) && !Empty($_POST['email'])  )
{
	if (isset($_POST['confirmer'])) 
	{
		
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$website=$_POST["website"];
$user=$_POST["user"];
$email=$_POST["email"];
$password=$_POST["password"];



//$file_= fopen("../src/authentification.xml", "w");
if (file_exists("../src/authentification.xml")) {

    $xml = simplexml_load_file("../src/authentification.xml");
    $root_utilisateurs = new SimpleXMLElement($xml->asXML());
	$utilisateur= $root_utilisateurs-> addChild('utilisateur');
 //   $xml->utilisateurs->addChild('utilisteur');
  
	$utilisateur ->addChild('nom',"\n".$nom."\n");
	$utilisateur->addChild('prenom',"\n".$prenom."\n");
	$utilisateur->addChild('website',"\n".$website."\n");
	$utilisateur->addChild('user',"\n".$user."\n");
	$utilisateur->addChild('email',"\n".$email."\n");
	$utilisateur->addChild('password',"\n".$password."\n");
	 $root_utilisateurs -> asXML("../src/authentification.xml");
	 header('Location: validation.php');
	
 }
 
 }
 
 else {
 	echo 'La checkbox n\'est pas cochée';
 }
 
}



?>