<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post</title>
</head>
<body>
    
<header>
    <?php

        wp_nav_menu(
            array(
                'theme_location' => 'top-menu',
            )
        )
    ?>
</header>