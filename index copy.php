<?php
require_once("./class/form.class.php");
$formConfig = array(
    'Title' => 'Generowanie XML',
    'Fields' => array(
        // array(
        //     'name' => 'options',
        //     'label' => 'Jesteś zainteresowany',
        //     'type' => 'checkbox',
        //     'value' => array(
        //         'Instalacją do wykrywania i sygnalizacji pożaru (PPOŻ)?',
        //         'Instalacją domofonu/wideodomofonu?',
        //         'Instalacją systemu kontroli dostępu?',
        //         'Instalacją systemu rejestrującego i rozliczającego czas pracy?',
        //         'Wykonaniem instalacji sieciowej i okalowania strukturalnego?',
        //         'Instalacją i konfiguracją internetu?',
        //         'Wykonaniem instalacji elektrycznej?',
        //         'Oświetleniem LED?',
        //         'Być może interesuje Cię doradztwo techniczne?'
        //     ),
        //     'required' => true
        // ),
        array(
            'name' => 'id',
            'label' => 'Identyfikator projektu',
            'type' => 'text',
            'value' => '',
            'required' => true
        ),
        array(
            'name' => 'category',
            'label' => 'Kategoria projektu',
            'type' => 'select',
            'value' => array(
                array('label' => 'garaże', 'value' => 3),
                array('label' => 'parterowe', 'value' => 5),
                array('label' => 'pietrowe', 'value' => 6),
                array('label' => 'bliźniaki', 'value' => 7),
                array('label' => 'z poddaszem', 'value' => 8),
                array('label' => 'letniskowe', 'value' => 11),
                array('label' => 'pozostałe ', 'value' => 12)
            ),
            'required' => false
        ),
        array(
            'name' => 'title',
            'label' => 'Tytuł projektu',
            'type' => 'text',
            'value' => '',
            'required' => true
        ),
        array(
            'name' => 'desc',
            'label' => 'Opis projektu',
            'type' => 'textarea',
            'value' => '',
            'required' => true
        ),
        array(
            'name' => 'price_tax',
            'label' => 'Cena brutto',
            'type' => 'text',
            'value' => '',
            'required' => true
        ),
        array(
            'name' => 'price',
            'label' => 'Cena netto',
            'type' => 'text',
            'value' => '',
            'required' => true
        ),
        // array(
        //     'name' => 'tax_value',
        //     'label' => 'Wartość podatku',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'ibsn',
        //     'label' => 'ISBN dla projektu',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'ibsn_mirror',
        //     'label' => 'ISBN dla projektu (lustro)',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'ibsn_mirror',
        //     'label' => 'ISBN dla projektu (lustro)',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'type',
        //     'label' => 'Typ zabudowy',
        //     'type' => 'select',
        //     'value' => array(
        //         array('label' => 'parterowy', 'value' => 1),
        //         array('label' => 'piętrowy', 'value' => 2),
        //         array('label' => 'z poddaszem', 'value' => 3),
        //         array('label' => 'bliźniak', 'value' => 4),
        //         array('label' => 'garaż', 'value' => 5)
        //     ),
        //     'required' => true
        // ),
        // array(
        //     'name' => 'categories_id',
        //     'label' => 'ID kategorii, podane po przecinku ze słownika',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'area_usable',
        //     'label' => 'Powierzchnia użytkowa w m2',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'area_usable_contains',
        //     'label' => 'Powierzchnia użytkowa zawiera (podane po przecinkach wartośći) 1-pokoje, 2-kuchnia, 3-poddasze do wysykosci 1.80, 4-poddasze do wysykosci 1.90, 4-poddasze do wysykosci 2.20, 5-kotlownia, 6-pomieszczenie gospodarcze',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'area_netto',
        //     'label' => 'Powierzchnia netto w m2',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'area_living',
        //     'label' => 'Powierzchnia mieszkalna w m2',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'area_garage',
        //     'label' => 'Powierzchnia garażu w m2',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'area_netto_2',
        //     'label' => 'Powierzchnia netto w m2',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'area_total',
        //     'label' => 'Powierzchnia całkowita w m2',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'area_total_netto',
        //     'label' => 'Powierzchnia netto w m2',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'area_building',
        //     'label' => 'Powierzchnia zabudowy w m2',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'area_building_contains',
        //     'label' => 'Powierzchnia zabudowy zawiera (podane po przecinkach wartośći) 1-pokoje, 2-kuchnia, 3-poddasze do wysykosci 1.80, 4-poddasze do wysykosci 1.90, 4-poddasze do wysykosci 2.20, 5-kotlownia, 6-pomieszczenie gospodarcze',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'area_terrace',
        //     'label' => 'Powierzchnia tarasów/podjazdów',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'area_terrace',
        //     'label' => 'Powierzchnia tarasów/podjazdów',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'area_roof',
        //     'label' => 'Powierzchnia dachu w m2',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'roof_type',
        //     'label' => 'Powierzchnia dachu w m2',
        //     'type' => 'select',
        //     'value' => array(
        //         array('label' => 'dachówka ceramiczna', 'value' => 1),
        //         array('label' => 'blachodachówka', 'value' => 2),
        //         array('label' => 'dachówka cementowa', 'value' => 3),
        //         array('label' => 'panele dachowe', 'value' => 4),
        //         array('label' => 'lub wpisanne inne (jako tekst)', 'value' => 5)
        //     ),
        //     'required' => true
        // ),
        // array(
        //     'name' => 'roof_slope_angle',
        //     'label' => 'Kąt nachylenia dachu w stopniach (wartość liczbowa)',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'cubature',
        //     'label' => 'Kubatura w m3',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'cubature',
        //     'label' => 'Kubatura w m3',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),













        // array(
        //     'name' => 'body',
        //     'label' => 'Treść wiadomości',
        //     'type' => 'textarea',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'name_lastname',
        //     'label' => 'Imię i nazwisko',
        //     'type' => 'text',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'email',
        //     'label' => 'Email',
        //     'type' => 'email',
        //     'value' => '',
        //     'required' => true
        // ),
        // array(
        //     'name' => 'phone',
        //     'label' => 'Telefon',
        //     'type' => 'phone',
        //     'value' => '',
        //     'required' => true
        // ),
        // // array(
        // //     'label' => 'Dodaj załącznik',
        // //     'type' => 'file',
        // //     'value' => ''
        // // ),
        // array(
        //     'name' => 'rodo',
        //     'label' => false,
        //     'type' => 'checkbox',
        //     'required' => true,
        //     'value' => 'Wyrażam zgodę na przetwarzanie podanych powyżej danych osobowych w celu otrzymywania informacji handlowej. Pamiętaj, że zawsze możesz cofnąć swoją zgodę. Jeżeli chciałbyś dowiedzieć się więcej jak chronimy Twoją prywatność, zobacz Politykę Prywatności lub napisz maila bok@monteo.pl. Administratorem Twoich danych jest MP Technology sp. z o.o., z siedzibą w Łomży.'
        // ),
        // array(
        //     'name' => 'mail-to-me',
        //     'label' => false,
        //     'type' => 'checkbox',
        //     'value' => 'Wyślij kopię do mnie'
        // ),
        array(
            'name' => 'submit',
            'label' => false,
            'type' => 'submit',
            'value' => 'Generuj XML dla - dom.pl'
        )
    )
);
?>
<html>

<head>
    <!-- <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet"> -->

</head>
<body>
    <a href="/add" title="Utwórz projekt">Utwórz projekt</a>
    <a href="/add" title="Utwórz projekt">Utwórz projekt</a>
    <?php

    // function trim_value(&$value)
    // {
    //     $value = trim($value);
    // }
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