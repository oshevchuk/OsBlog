<html>
<head>
    <title><?=$pageTitle ?></title>

    <script src="/public/plugins/ckeditor/ckeditor.js"></script>
    <script src="/public/plugins/ckeditor/samples/js/sample.js"></script>

    <link rel="stylesheet" href="../public/css/style.css">
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