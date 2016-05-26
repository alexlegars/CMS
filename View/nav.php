<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">CMSG2</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php
                foreach($data as $une_page):
                    $active = '';
                    if($une_page->slug==$_GET['p']):
                        $active = " class=\"active\"";
                    endif;
                ?>
                <li <?=$active?>><a href="index.php?p=<?=$une_page->slug?>"><?=$une_page->title?></a></li>
                <?php
                endforeach;
                ?>
            </ul>
        </div>
    </div>
</nav>