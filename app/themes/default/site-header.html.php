<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$view->title?></title>
  <base href="/<?=$app->baseUri?>/">
  <link rel="stylesheet" type="text/css" href="<?=$app->cssUri . '/main.css'?>">
  <script>window.F1 = { DEBUG: false, deferred: [] };</script>
  <style><?php include $view->getStylesFile(); ?></style>
</head>

<body>

<header class="row">
<h1 id="logo">[F1 Demo Site Header]</h1>
<?php include $view->getThemeFile( 'main-nav' ); ?>
</header>

