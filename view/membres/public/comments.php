<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link  rel="stylesheet" type="text/css" href="./css/style1.css" />
    </head>
    <body>
        <ul>
            <?php foreach ($comments as $comments): ?>
            <div class="comments">
                <table>
                    <tr>
                        <td><span class="comments" style="color:red">commentaire : </span> <?php echo($comments['content'])?></td> 
                    </tr>
            <?php endforeach; ?>
            </a>
        </ul>
    </body>
</html>
