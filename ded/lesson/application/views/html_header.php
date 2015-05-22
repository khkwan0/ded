<!DOCTYPE html>
<html>
    <head>
    <?php if (isset($css)):?>
        <?php foreach ($css as $style):?>
            <link rel="stylesheet" type="text/css" href="/lesson/assets/css/<?php echo $style?>" />
        <?php endforeach;?>
    <?php endif;?>
    </head>
    <body>
