<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link  rel="stylesheet" type="text/css" href="./css/style1.css" />
        <title>posts</title>
    </head>
    <body>
        <ul>
         
        <?php foreach ($articleContent as $posts): ?>
            <div class="content">
                <table>
                    <tr>
                        <td><span class="cat" style="color:blue">contenu : </span><?php echo($posts['content'])?>
</td> 
                    </tr>

            <?php endforeach; ?>
            </a>
        </ul>
    </body>
</html>
