<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <title><?php echo $__env->yieldContent('title'); ?></title>
    </head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/img/logo.png" alt="" width="40" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Головна сторінка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Гарячі пропозиції</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Категорії
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Телефони</a></li>
                        <li><a class="dropdown-item" href="#">Ноутбуки</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Навушники</a></li>
                    </ul>
                </li>
            </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Пошук</button>
        </form>
        </div>
    </div>
    </nav>



        <?php echo $__env->yieldContent('main_content'); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/layouts/defaultLayout.blade.php ENDPATH**/ ?>