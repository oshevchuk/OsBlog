<div class="sidebar">
    <?php
    if($_COOKIE["login"]=="admin"){
        ?>
        <a href="/addPost">Add new Post</a>
    <?php
    }
    ?>
    <hr>
    <h3>Categories</h3>
    <p><a href="/categories/0"> General</a></p>
    <p><a href="/categories/1"> Tech</a></p>
    <p><a href="/categories/2"> Work</a></p>
    
</div>