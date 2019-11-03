<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link  rel="stylesheet" type="text/css" href="./css/style1.css" />
    </head>
    <body>
        <ul>
            <?php foreach ($users as $users): ?>
            <div class="users">
                <table>
                    <tr>
                        <td><span class="users" style="color:blue">Auteur :</span></td> 
                        <td><?php echo($users['username'])?></td>
                    </tr>

            <?php endforeach; ?>
            </a>
        </ul>
    </body>
</html>
