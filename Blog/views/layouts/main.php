<html>
<head>
    <title><?=$pageTitle ?></title>
    <link rel="stylesheet" href="fabric/public/css/style.css">
</head>

<body>

<? require 'partials/user_bar.php'; ?>

<div class="container">
    <? require 'partials/header.php' ?>
    <div class="row">
        <? require 'partials/content.php'; ?>
        <? require 'partials/sidebar.php'; ?>
    </div>
    <? require 'partials/footer.php'; ?>
</div>


<?//= $pageContent ?>

</body>
</html>