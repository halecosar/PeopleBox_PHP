<!-- 1- Film açıklamasındaki baş harf hariç tüm harfleri küçük harfe çeviriniz.
2- Film açıklaması içindeki ilk 50 karakteri alarak sonuna "..." ekleyiniz. (substr) 
3- Her bir film için url bilgisini film başlığına göre oluşturunuz.    
4- "baslik" isminde bir sabit oluşturarak sayfanın h1 etiketinde kullanınız. -->

<?php

//1-

$film_aciklamasi1 = "Kagıt toplayarak geçinen ve saglığı giderek kötüleşen Mehmet terk edilmiş bir çocuk bulur. Birden hayatına giren küçük Ali, onu kendi çocukluğuyla yüzleştirecektir. (18 yaş ve üzeri için uygundur).";

$film_aciklamasi2 = "Zombi kıyametinin ardından hayatta kalanlar, birlikte verdikleri ölüm kalım mücadelesinde insanlığa karşı duydukları umuda tutunur.";

echo ucfirst(strtolower($film_aciklamasi1)) . "<br>";
echo ucfirst(strtolower($film_aciklamasi2)) . "<br> <br> <br>";


//2-

echo substr($film_aciklamasi1, 0, 50) . "..." . "<br>";
echo substr($film_aciklamasi2, 0, 50) . "..." . "<br> <br> <br>";

//3-

$film1 = "Paper Lives";
$film2 = "Walking Dead";

$film1 = str_replace(" ", "", $film1); //replace metoduyla boşluk yerine boşluk gelmemeli denildi.
$url1 = "www." . "{$film1}" . ".com";
echo strtolower($url1) . "<br>";
$film2 = str_replace(" ", "", $film2); //replace metoduyla boşluk yerine boşluk gelmemeli denildi.
$url2 = "www." . "{$film2}" . ".com";


echo strtolower($url2) . "<br> <br> <br>";


//4-
define("baslik", "Başlık")

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odev1</title>
</head>

<body>
    <h1> <?php echo baslik
        ?></h1>
</body>

</html>