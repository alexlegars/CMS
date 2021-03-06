<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des pages</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body role="document">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="">Back Office</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="">Pages</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container theme-showcase" role="main">
    <h1>Pages</h1>
    <a href="./index.php?a=ajouter" style="font-size: 40px" class="btn btn-success btn-xs">+</a>
    <table class="table-bordered table-responsive table">
        <tr>
            <th>ID</th>
            <th>Slug</th>
            <th>Titre</th>
            <th>Action</th>
        </tr>
        <?php foreach($data as $page):?>
            <tr>
                <td><?=$page->id?></td>
                <td><?=$page->slug?></td>
                <td><?=$page->title?></td>
                <td>
                    <a href="./index.php?a=details&id=<?=$page->id?>" class="btn btn-primary">details</a>
                    <a href="./index.php?a=modifier&id=<?=$page->id?>" class="btn btn-warning">modifier</a>
                    <a href="./index.php?a=supprimer&id=<?=$page->id?>" class="btn btn-danger">delete</a>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
    <a href="./index.php?a=ajouter" style="font-size: 40px" class="btn btn-success btn-xs">+</a>
</div>
</body>
</html>