<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>Space Defense</title>

    <link href="./css/main.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="spacedefense">
    <?php

    /* Generate 50 vessels */
    for ($i = 1; $i <= 50; $i++) {

        /* Generate random coord */
        $x = rand(0, 100);
        $y = rand(0, 100);

        /* Generate html */
        echo '<div class="vessel" style="top: ' . $x . 'px; left:' . $y . 'px;"></div>';
    }

    ?>
</div>
</body>
</html>
