<?php
if (isset($posts)) {
    foreach ($posts as $key => $value) {
        ?>
        <div class="post-item">
            <h2><?= $value['caption'] ?></h2>
            <p><?= $value['text'] ?></p>

            <a href="/editpost/<?= $value['id'] ?>">edit</a>
            <a href="/remove/<?= $value['id'] ?>">remove</a>

        </div>
        <?php
    }
}


?>


