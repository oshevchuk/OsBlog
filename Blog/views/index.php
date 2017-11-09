<!--index-->

<?php
if (isset($posts)) {
    foreach ($posts as $key => $value) {
        ?>
        <div class="post-item">
            <h2><?= strip_tags($value['caption']) ?></h2>
            <div>
                <? if($value['img']!='') {?>
                <img src="/public/img/<?= $value['img'];?>" alt="" width="150">
            <? } ?>
                <?= substr(strip_tags($value['text']), 0, 75) ?>...</div>
            <a href="/post/<?= $value['id'] ?>">view details</a>

        </div>
        <?php
    }

    echo '<div class="nav">'. \Core\DatabaseProvider::$navLink.'</div>';
}
?>