<?php
    if (isset($_GET['sLogout']) AND $_GET['sLogout'] == 1) {
        unset($_SESSION['iAdm']);
        header('location:Home');
        die();
    }

    if (!empty($_SESSION['iAdm']))
    {
        header('location:Home');
        die();
    }

    if (!empty($_POST['sNome']) AND !empty($_POST['sSenha']))
    {
        $sNome = $_POST['sNome'];
        $sSenha = md5($_POST['sSenha']);
        
        $sSql = "SELECT * FROM usuario WHERE usuario_email = '" . $sNome . "' AND usuario_senha = '" . $sSenha . "'";
        $oCon = new Database();
        $aReturn = $oCon->select($sSql);

        if (count($aReturn) > 0) 
        {
            $_SESSION['iAdm'] = 1;
            header('location:RegisterCard');
            die();
        }
    }
?>
<div class="album py-5 bg-light">
    <div class="container">
        <!-- <button style="height:50px;width:500px" onclick="earthPower()">Poder de terra</button> -->
        <form action="Login" method="post">
            <label style="color:black" for="text">user</label>
            <input type="text" name="sNome">
            <label style="color:black" for="text">password</label>
            <input type="password" name="sSenha">
            <input type="submit" value="Registrar">
        </form>
    </div>
</div>