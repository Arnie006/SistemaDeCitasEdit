<?php
session_start();

echo $_SESSION['error'];

?>
<form>
 <input type="button" value="Regresar" onclick="history.back()">
</form>

