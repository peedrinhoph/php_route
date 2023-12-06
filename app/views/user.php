<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>

<body>
    <main>
        <?php
        foreach ($data as $key => $value) { ?>
            <h1><?php echo $value['nome']; ?></h1>
        <?php  } ?>
    </main>
</body>

</html>