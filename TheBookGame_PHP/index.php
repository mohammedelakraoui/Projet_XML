
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
		<div class="wrapper">
			<h1>Livre ou vous êtes le heros</h1>
			<h2>Bienvenu dans  vôtre livre,là ou vous êtes le heros <span> THEBOOKGAME </span> Go! </h2>
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
				
					<form action="index.php" class="login active" method="POST">
						<h3>Login</h3>
						<div>
							<label>Nom utilisateur:</label>
							<input type="text" name="user"   placeholder="Username"/>
							<span class="error">Eurreur de saisie</span>
						</div>
						<div>
							<label>Mot de passe : <a href="pages/mot_de_passe_oublie.php" rel="forgot_password" class="forgot linkform">Mot de passe oublié?</a></label>
							<input type="password" name="password" placeholder="Password"/>
							<span class="error">Erreur de mot de passe</span>
						</div>
						<div class="bottom">
							<div class="remember"><input type="checkbox" /><span>Garder ma session active</span></div>
							<input type="submit" name="submit1" value="Login"></input>
							<a href="pages/inscription.php" rel="register" class="linkform">Vous n'avez pas un compte ? Inscrivez-vous</a>
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


if(!Empty($_POST['user']) && !Empty($_POST['password'])  )
{

$user= $_POST["user"];
$password= $_POST["password"];

if (file_exists('src/authentification.xml')) {
 $xml = simplexml_load_file('src/authentification.xml');
 
//foreach ($xml as xml)
foreach ($xml->utilisateur as $Mombre)
	{
		if($Mombre-> user == $user && $Mombre -> password== $password)
		{	
			//print "Vous etes connecter";
			header('Location: pages/interface_jeu.php');
		}
		else {
			
			echo '<span style="color:red;font-size: 14pt"> <MARQUEE>Erreur de connexion</MARQUEE></span>';
		}
	}

} 
else 
{
exit('Echec lors de l\'ouverture du fichier authentification.xml.');
}

}
 


?>