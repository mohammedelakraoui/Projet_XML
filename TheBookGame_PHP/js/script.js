
function Actualiser() {
 
   this.form.submit(); 
   if($_POST['etape5_question1'] != "check"){
       $_SESSION['etape5_question1'] = $_POST['etape5_question1'];
       javascript:location.reload();
   }else{
       $erreur_etape5_question1 = "Nombre de personnes : Veuillez s�lectionner une r�ponse.";
   }
}
function alert_()
{
  alert('ok');	
}