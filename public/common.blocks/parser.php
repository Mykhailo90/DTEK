<?php

include('simple_html_dom.php');

function getAuthPhoto($name)
{
    $photos = array(
        "Анастасия Тюменцева" => "https://dtekacademy.com/img/treners/12745798_1143874338986172_1644381877737021267_n.jpg",
        "Анна Гончарук" => "https://dtekacademy.com/img/treners/goncharuk.jpg",
        "Валентина Губанова" => "https://dtekacademy.com/img/treners/gubanova.jpg",
        "Евгений Бондаренко" => "https://dtekacademy.com/img/treners/bondarenko.jpg",
        "Евгения Кузьминская" => "https://dtekacademy.com/img/treners/kuzminskaya.jpg");
    return $photos[$name];
}

function getAuthName()
{
    $names = array("Анастасия Тюменцева", "Анна Гончарук", "Валентина Губанова", "Евгений Бондаренко", "Евгения Кузьминская");
    return $names[rand(0, 4)];
}



    $url = "https://dtek.com/media-center/press/";
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $str = curl_exec($ch);
    curl_close($ch);


    $html= str_get_html($str);

    echo "<div class='blog-card first'>";
    echo "<div class='img'>";

    $element = $html->find('div.newsLst-img img', 0);
    echo $element;
    echo "</div>";

    $auth = getAuthName();
    $authphoto = getAuthPhoto($auth);
    echo "<div class='blog-card-info'>";
    echo "<div class='blog-author'>";
    echo "<div class='author-img'>";
    echo    "<img class='author-photo' src='$authphoto'>";
    echo "</div>";

    echo "<span class='author-name'>";
    echo    $auth;
    echo "</span>";
    echo "</div>";

    $element = $html->find('div.newsLst-text');
    $date = $element[0]->children[0]->children[0]->outertext;
    echo "<span class='date'>";
    echo  "<i class='far fa-calendar-alt'></i>";
    echo    $date;
    echo "</span>";
    $element[0]->children[0]->outertext = '';
    $element[0]->children[1]->outertext = '';

    echo "</div>";
    echo "<div class='blog-card-title'>";
    echo $element[0];

    echo "</div>";
    echo "</div>";
    $i = 0;


    echo "<div class='blog-other-cards'>";
    foreach($html->find('div.newsLst-text') as $element)
    {
        if ($i == 0)
        {
            $i++;
            continue ;
        }
        if ($i==4)
            break ;
        echo "<div class='blog-card other'>";
        echo "<div class='author-img'>";
        $auth = getAuthName();
        $authphoto = getAuthPhoto($auth);
        echo "<img class='author-photo' src='$authphoto'>";
        echo "</div>";

        echo "<div class='blog-other-card-info'>";
        echo "<span class='author-name'>";
        echo    $auth;
        echo "</span>";
        $date = $element->children[0]->children[0]->outertext;
        echo "<span class='date'>";
        echo  "<i class='far fa-calendar-alt'></i>";
        echo    $date;
        echo "</span>";
        $element->children[0]->children[0]->outertext = '';

        $element->children[1]->outertext = '';
        echo "<div class='blog-card-title'>";
        echo $element;

        echo "</div>";


        echo "</div>";

        echo "<a class='event-card-link'><i class=\"fas fa-angle-right\"></i></a>";
//        echo "</a>";

        echo "</div>";


        $i++;
    }
    echo "</div>";

?>