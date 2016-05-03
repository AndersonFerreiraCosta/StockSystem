<?
setcookie("logado", "", "time()-1");
?>
<HTML>
<HEAD>
<title>CONTROLE DE ESTOQUE</title>
<style type="text/css">
@import url("styles/index.css");
@import url("styles/menu.css");
</style>
<script type="text/javascript" src="application/js/jquery.min.js"></script>
<script type="text/javascript" src="application/js/menu.js"></script>
<script type="text/javascript" src="application/js/functions.js"></script>
<meta http-equiv="refresh" content="3;url=index.html">
<script language="JavaScript">
  function deleteCookie(nome){
    var exdate = new Date();
    exdate.setTime(exdate.getTime() + (-1 * 24 * 3600 
       * 1000));
    document.cookie = nome + "=" + escape("")+ ((-1 
       == null) ? "" : "; expires=" + exdate);
  } 
</script>

</HEAD>
<BODY>
<div id="Full">
<div id="Logo">CONTROLE DE ESTOQUE</div>
	<div id="Menu">
	</div>
	<ul id="jsddm">
	<br>
	<br>
	<br>
	<br>
	<center>
	<b> Obrigado por utilizar o Almoxarifado 4.0</b>
    <script language="JavaScript">
  deleteCookie("logado");
</script>

</BODY>
</HTML>
