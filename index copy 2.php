<?php
require_once("./class/db.class.php");
$db = new Db();
$db->dbConnect();
$dir_templates = '/xml_templates';
$templates_files = array_diff(scandir($dir_templates), array('..', '.'));

$templates = $db->dbQuery("SELECT * FROM `templates`");
array_filter($templates, function ($item) {
    $filename = './xml_templates/' . $item['filename'];
    return file_exists($filename);
});
// var_dump($templates);
?>
<html>

<head>
    <!-- <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet"> -->

</head>

<body>
    <header>
        <nav>
            <?php
                foreach ($templates as &$item) {
                    ?>
                        <a href="/add">Utwórz projekt dla <?php echo $item['name'];?></a>
                    <?php
                }
            ?>
        </nav>
    </header>

    <!-- <a href="/add" title="Utwórz projekt">Utwórz projekt</a> -->
    <?php

  c
    // $xml = simplexml_load_file("./xml_templates/dom_pl.xml") or die("Error: Cannot create object");
    // // $json = ;
    // $array = array_unique(json_decode(json_encode($xml),TRUE));

    // array_walk_recursive($array, 'trim_value');
    // // var_dump($array);
    // $form = new calcForm();
    // $form->generateCalcForm($array['projekt']);



    // $array = array_map('trim', $array);
    // echo "<pre>";
    // var_dump($array);
    // echo "</pre>";
    // var_dump($xml->projekt);
    // echo $xml->projekty->projekt->obce_id . "<br>";
    // echo $xml->from . "<br>";
    // echo $xml->heading . "<br>";
    // echo $xml->body;
    ?>

    <script src="./javascript/app.js" async></script>
</body>

</html>