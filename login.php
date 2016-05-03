<style type="text/css">
body {
	background-color: #CCC;
}
</style>
<?php


$user = $_POST['user'];
$pass = $_POST['pass'];
 include("bd.php");
if($valida[$user]==$pass){
setcookie("logado", "1");
 echo "<script>location.href='main.php'</script>";
 }
 else{
 echo "<font face=verdana size=2>";
 echo "Usuário ou senha incorretos!";
 echo "<br>";
 echo "<a href=index.html>";
 echo "Clique aqui</a> para tentar novamente.";
 echo "</a></font>";
 }
?>