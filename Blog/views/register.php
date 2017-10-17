<?php

if($reginfo=="registered"){
    echo '<b>'.\Core\Models\User::$login.'</b> register succesful!';
}else{
?>
<p>Hello <?=\Core\Models\User::$login; ?> </p>
<form action="/register" method="post" class="register-form">
    <label for="">Login</label>
    <input type="text" name="login" required>
    <label for="">password</label>
    <input type="password" name="password" required>
    <input type="password" required>
    <input type="submit" value="register">
</form>

<?
}
?>