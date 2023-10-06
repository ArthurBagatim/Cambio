<?php

session_start();

unset($_SESSION['Usuario']);
unset($_SESSION['Senha']);
unset($_SESSION['UserName']);
unset($_SESSION['NivelDeAcesso']);
unset($_SESSION['Error']);
header('Location: .');

?>