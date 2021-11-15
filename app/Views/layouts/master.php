<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- LOCAL CSS -->
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/style.css">
    <?=$this->renderSection('link');?>
    <?=$this->renderSection('style');?>
    <title><?= $title; ?></title>
</head>

<body class="">
    <?= $this->include('layouts/_sidebar'); ?>

    <section class="home-section">
        <?= $this->renderSection('content'); ?>
    </section>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- LOCAL JS -->
    <?= $this->renderSection('script'); ?>
    <script src="/js/sidebar.js"></script>
</body>

</html>