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

    /* Array to push coord */
    $coordArray = array();

    /* Generate 25 pairs of vessels */
    for ($i = 1; $i <= 25; $i++) {

        /* Generate random coord */
        $x = rand(0, 100);
        $y = rand(0, 100);
        $dataCoord = array($x => $y);

        /* While coord exist, generate new coord */
        while (in_array($dataCoord, $coordArray)) {
            $x = rand(0, 100);
            $y = rand(0, 100);
            $dataCoord = array($x => $y);
        }

        /* Save coord */
        array_push($coordArray, $dataCoord);

        /* Adjacent positions */
        $yy = $y + 1;

        /* Generate html */
        echo '<div class="vessel" style="top: ' . $x . 'px; left:' . $y . 'px;"></div>';
        echo '<div class="vessel" style="top: ' . $x . 'px; left:' . $yy . 'px;"></div>';
    }
    ?>
</div>
</body>
</html>
