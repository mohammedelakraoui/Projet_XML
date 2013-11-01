
<html>
    <head>
  
             <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>
    <body>
		<div class="wrapper">
			<h1>Livre ou vous êtes le heros</h1>
			<h2>Bienvenu dans  vôtre livre,là ou vous êtes le heros <span> Recuperez vos parametres de connexion </span> ! </h2>
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
				
				<form class="forgot_password" method="POST">
						<h3>Mot de passe oublié</h3>
						<div>
							<label>E-mail:</label>
							<input type="text" placeholder="exemple@exemple.com" name="email" />
							<span class="error">Format incorrect</span>
						</div>
						<div class="bottom">
							<input type="submit" value="Envoyer"></input>
							<a href="../index.php" rel="login" class="linkform">Page de connexion? Ici</a>
							<a href="inscription.php" rel="register" class="linkform">Vous n'avez pas un compte? Inscrivez-vous ici</a>
							
						</div>
					</form>
			
				</div>
				<div class="clear"></div>
			</div>
	     	</div>
		

    </body>
    
    
</html>


<?php
if(!Empty($_POST['email'])) 
{

	$email= $_POST["email"];
	if (file_exists('../src/authentification.xml')) {
		$xml = simplexml_load_file('../src/authentification.xml');
	    $existe=0;
		//foreach ($xml as xml)
		foreach ($xml->utilisateur as $Mombre)
		{
			
			if(strtoupper(trim($Mombre-> email))==strtoupper(trim($email)))
			{
				$existe=1;
				$to= $email;	
				$message = '
				<html>
				<head>
				<title>Parametres de connexion</title>
				</head>
				<body>
				<p> Veuillez trouvez ci-dessous, vos paramètres de connexion</p>
				<table border="1">
				<tr bgcolor="green">
				<th>Nom utilisateur </th><th>Mot de passe</th>
				</tr>
				<tr>
				<td>'.$Mombre->user.'</td><td>'.$Mombre->password.'</td>
				</tr>
				</table>
				</body>
				</html>
				';
				// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				
				mail($email, 'Votre identifiant',$message,$headers);
				
				echo '<span style="color:green;font-size: 14pt"> Email envoyé.</span>';
				
			
				
			}
			
			
		}
		if($existe==0)
		{
			
	   echo '<span style="color:red;font-size: 14pt"> <MARQUEE>E-mail n existe pas ! nous vous invite à créer un compte.</MARQUEE></span>';
		
		}
	
	}
	else
	{
		exit('Echec lors de l\'ouverture du fichier authentification.xml.');
	}
}
?>
