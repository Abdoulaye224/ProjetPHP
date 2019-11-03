<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link  rel="stylesheet" type="text/css" href="./css/style1.css" />
    </head>
    <body>
        <!-- <h1>Liste des articles</h1> -->
        <ul>
            <?php foreach ($categories as $categories): ?>
            <div class="categories">
                <table>
                    <tr>
                        <td><span class="cat" style="color:blue">categorie :</span></td> 
                        <td><?php echo($categories['name'])?></td>
                    </tr>

            <?php endforeach; ?>
            </a>
        </ul>
    </body>
</html>
