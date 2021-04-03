<!DOCTYPE html>
<html style="font-family: 'Schoolbell' !important;">

<head>
    <?php
        include "head.php";
    ?>
</head>

<body>
    <?php
        include "header.php";
    ?>


    <div class="container-fluid" style="padding: 0px;">
        <div class="container-fluid bounce animated"
            style="/*color: white;*/background-color: rgba(253,218,130,0.91);padding: 0px;padding-bottom: 0px;min-height: 400px;margin-top: 0px;z-index: 9999;height: 100%;">
            <h1 class="text-center" style="/*padding-left: 60px;*/padding-top: 50px;"><span class="text-center"
                    style="/*border-bottom: 2px solid black;*/">SKŘÍTKOVO PUTOVÁNÍ</span></h1>
            <p style="padding: 50px;padding-top: 10px;padding-bottom: 10px;font-size: 18px;font-weight: 400;">
                <br>Mateřská škola tvoří právní subjekt s místní Základní školou. Využívá slunný a prostorný pavilónový
                komplex budov, který je obklopen rozsáhlým pozemkem s altánem a herními prvky. Ve školním roce 2011/2012
                prošla celá budova kompletní rekonstrukcí
                (zateplení, barevná fasáda). Mateřská škola má v současné době čtyři oddělení.<br><br>
            </p>
            <div class="text-center"><img class="img-fluid"
                    src="assets/img/47243984_380383226034490_6516894035888570368_n.png"></div>
            <p style="padding: 50px;padding-top: 10px;padding-bottom: 0px;font-size: 18px; margin-bottom: 0px;">
                <br><br>Školní vzdělávací program předškolního vzdělávání&nbsp;„SKŘÍTKOVO PUTOVÁNÍ“ je založen na
                metodách přímých zážitků, dětské zvídavosti a touze objevovat. Probouzí v dítěti aktivní zájem a chuť
                dívat se kolem sebe, naslouchat, objevovat,
                ale i odvahu ukázat, co všechno už samo umí, zvládne, dokáže.<br><br><br><br>
            </p>
        </div>
    </div>
    <?php 
        include "php/db.php";

        $sql = 'UPDATE visitors SET counter=counter+1 WHERE id_visitor ="'. 1 . '"';
        $conn->query($sql); 
    ?>
    <?php 
        include "footer.php";
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>