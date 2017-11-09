<?php
if (isset($posts)) {
    foreach ($posts as $key => $value) {
        ?>
        <div class="post-item">
            <? if($value['img']!='') {?>
                <img src="/public/img/<?= $value['img'];?>" alt="" width="150">
            <? } ?>
            <h2><?=  $value['caption'] ?></h2>
            <div><?= $value['text'] ?></div>

            <div>likes:<b> <?= $value['like'];?></b></div>

            <? if($_COOKIE["login"]=="admin"){ ?>
<!--            <a href="/editpost/--><?//= $value['id'] ?><!--">edit</a>-->
            <a href="/remove/<?= $value['id'] ?>">remove</a>
            <? } ?>
        </div>
        <?php
        foreach ($com as $key_ => $value_) {
            echo "<p>".$value_["comment"]."</p>";
            echo '<i>author:</i>'.$value_["author"];
            echo "<hr>";
        }

        if(isset($_COOKIE["login"])&& $_COOKIE["login"]!='guest'){
            ?>
            <form action="/newComment" method="post">
                <input type="hidden" value="<?= $value['id'];?>" name="id" hidden>
                <input type="text" name="comment" required>
                <input type="submit">
            </form>
            <a href="/like/<?= $value['id'];?>">like it!</a>
            <?php

    }
}
    

}
?>


