<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=isset($app->view->title)?$app->view->title:$app->ctrl->name?></title>
<link rel="stylesheet" type="text/css" href="<?=$app->env->styles . '/site.css'?>">
<style><?php include $app->ctrl->path . '/style.css'; ?></style>
</head>
<body>
