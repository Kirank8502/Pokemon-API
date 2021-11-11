<?php

function page($m)
{
    $b = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon?offset=' . $m . '&limit=10'), true);
    echo "<br>";
    echo "<br>";
    for ($x = 0; $x <= 9; $x++) {
        $b1 = $b["results"][$x]['name'];
        $b2 = json_decode(file_get_contents($b["results"][$x]['url']), true);
        $b3 = $b2["sprites"]["other"]["official-artwork"]["front_default"];
        echo "<br>";
        echo "Name : ";
        print_r($b1);
        echo "<br>";
        for ($y = 0; $y <= 5; $y++) {
            if ($y <= count($b2["abilities"]) - 1) {
                $b4 = $b2['abilities'][$y]['ability']['name'];
                echo "abilities : ";
                print_r($b4);
                echo "<br>";
            }
        }
        echo "<br>";
        echo "<img src='$b3' width='300' height='300'>";
        echo "<br>";
        echo "<br>";
        $b5 = $b2["stats"][0]['base_stat'];
        print_r("stat : " . $b5);
        echo "<br>";
        echo "<br>";
    }
}
if (isset($_POST['callFunc1'])) {
    //echo (page($_POST['callFunc1'] += 10));
    // if ($_POST['callFunc1'] == 10) {
    //     echo "now try to call";
    // }
    page($_POST['callFunc1']);
}
