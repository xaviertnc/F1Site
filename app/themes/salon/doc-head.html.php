<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$app->title?> - Salon</title>
  <base href="<?=$app->baseUri?>">
  <?php foreach( $view->styles as $styleFile ): ?>
  <link rel="stylesheet" type="text/css" href="css/<?=$styleFile?>">
  <?php endforeach; ?>
  <link rel="stylesheet" type="text/css" href="css/salon.css">
  <style><?php include $view->getStylesFile(); ?></style>
  <script>window.F1 = { DEBUG: <?=__DEBUG_ON__?>, deferred: [], page: '<?=$view->name?>' };</script>
</head>

<body>