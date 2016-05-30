<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$page->title?></title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body role="document">
<?=$nav?>
<div class="container theme-showcase" role="main">
    <div class="jumbotron">
        <h1><?=$page->h1?></h1>
        <?=$page->body?>
        <span class="<?=$page->span_class?>" ><?=$page->span_text?></span>
        <iframe src="<?=$page->iframe?>" frameborder="0" allowfullscreen></iframe>
    </div>
        <img class="img-thumbnail" alt="<?=$page->title?>" src="<?=$page->image?>" data-holder-rendered="true">
</body>
</html>