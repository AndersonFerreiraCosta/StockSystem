<?php
session_start("logado");
include("bd.php");
$nuser = $_POST['nuser'];
$npass = $_POST['npass'];
$bd = fopen("bd.php","a+");
$varval = "valida[";
$new = "<?php
$$varval$nuser] = \"$npass\";
?>";
fputs($bd, $new);
fclose($bd);
echo "<script>location.href='sucesso.php'</script>";
?>