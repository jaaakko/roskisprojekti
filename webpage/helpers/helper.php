<?php
//salaa salasanan
function hashPassword($password)
{
    $password = trim($password);
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    return $hashedpassword;
}

/*//tarkistaa onko kirjautunut ja onko admin
function isLoggedIn()
{
    if (isset($_SESSION['email'], $_SESSION['userID']) && ($_SESSION['session_id'] == session_id())) {
        return true;//palautetaan true tai false
    } else {
        return false;
    }
}
?>*/