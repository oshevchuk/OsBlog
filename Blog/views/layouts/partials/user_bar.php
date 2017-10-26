<div class="fixed-top">
    <div>*Hello <b><?= \Core\Models\User::$login; ?>
            <?php
            if(\Core\Models\User::$login!="guest"){
                ?>
                <a href="/Logout">logout</a>
            <?php
            }else{
                ?>
                <a href="/register">register</a>
            <?php
            }
            ?>
        </b></div>
</div>