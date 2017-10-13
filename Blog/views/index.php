<!--index-->

<?php
if (isset($posts)) {
    foreach ($posts as $key => $value) {
        ?>
        <div class="post-item">
            <h2><?= $value['caption'] ?></h2>
            <p><?= substr($value['text'], 0, 15) ?>...</p>
            <a href="post/<?= $value['id'] ?>">view details</a>
            <?php
//            echo $key;
//            print_r($value['caption']);
            ?>
        </div>
        <?php
    }

    echo '****';
    print_r($posts[0]);
}
?>