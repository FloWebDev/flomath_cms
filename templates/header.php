<?php
    $description = !empty($description) ? $description : META_DESCRIPTION;
    $keywords    = !empty($keywords) ? $keywords : META_KEYWORDS;
    $author      = !empty($author) ? $author : META_AUTHOR;
?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?= $description ?>">
  <meta name="keywords" content="<?= $keywords ?>">
  <meta name="author" content="<?= $author ?>">

  <title><?= SITE_TITLE; ?></title>

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <!-- Bootstrap core CSS -->
  <link href="/assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="/assets/css/fontawesome/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="/assets/css/clean-blog/clean-blog.min.css" rel="stylesheet">

  <!-- Custom style for FloMath template -->
<link href="/assets/css/style.css?v=<?= ASSETS_VERSION; ?>" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="/"><?= SITE_TITLE; ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="post.html">Sample Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('/assets/media/core/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <?php if (getUri() === '/'): ?>
              <h1><?= SITE_TITLE; ?></h1>
            <?php else: ?>
              <p id="site-title"><?= SITE_TITLE; ?></p>
            <?php endif; ?>
            <span class="subheading"><?= SLOGAN; ?></span>
          </div>
        </div>
      </div>
    </div>
  </header>