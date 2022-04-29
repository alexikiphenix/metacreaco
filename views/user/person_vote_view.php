<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person vote view</title>
</head>
<body>
        <?php
            if(isset($_POST['vote']))
            {
                echo '<pre>';
                print_r($_POST["vote"]);
                echo '</pre>';
            }
        ?>
    
</body>
</html>