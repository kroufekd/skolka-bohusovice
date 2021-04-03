<!DOCTYPE html>
<html>
<?php 
 session_start();
 include "php/db.php";
?>

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
            style="padding: 0px;padding-bottom: 0px;margin-top: 0px;z-index: 9999;height: 100%;">
            <div>
            
                <div class="container"
                    style="padding: 0px;white-space: ">
                    <div class="row pp">
                        <div class="col-md-8" style="border-right: 3px solid black;">
                        <h2 class="text-center headerbar" style="/*padding-left: 60px;*/padding-top: 30px; padding-bottom:20px">
                        <span class="text-center" style="/*border-bottom: 2px solid black;*/">
                        <?php 
                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                        echo 'Aktuální informace <i class="fas fa-edit" id="editText"></i>';
                     }else{
                        echo 'Aktuální informace';
                     }
                ?>
                    
                    
                    </span></h2>
                        <div class="contentText">
                            <?php 
                
                include 'php/db.php';

                $sql = 'SELECT body FROM text WHERE id_text = "1";';
                $result = $conn -> query($sql);
                $row = $result -> fetch_assoc();
                echo $row["body"];
                ?>
                        </div>

                        <div class="mainText">
                            <div class="editorr">

                            </div>
                            <button class="btn btn-success" id="ulozText">Upravit</button>
                        </div><br>

                        
    <!--
 
        
    -->
    <p>
                            Informace k organizaci školního roku 2020/2021, <a
                                href="assets/dokumenty/zs-bohusovice-2020-2021-opatreni-covid-664.pdf"
                                target="_blank">zde</a>
                        </p>
                        <p>
                        <h5>Distanční vzdělávání</h5>
                        V případě absence 50% dětí ve třídě s povinným předškolním vzděláváním, budou děti vzdělávány
                        distančním způsobem <br>
                        formy vzdělávání:
                        <ul>
                            <li>zasílání dokumentů na email zákonným zástupcům</li>
                            <li>předávání dokumentů na sjednaném místě po telefonické domluvě na tel. <a
                                    href="tel:602761942">602 761 942</a> (vedoucí MŠ, Bc. Monika Kroufková)</li>
                        </ul>
                        </p>


                        Stravování - změna cen pro strávníky, nový cenník <a href="assets/oznameni.pdf"
                            target="_blank">zde</a><br>
                        Smlouva o stravování <a href="assets/NOVÁ_smlouva_od_1.9.2019.pdf" target="_blank">zde</a>


                        <br>
                        <br>
                        <h5>Sběrové akce </h5> V měsících září až červnu sbíráme sušenou pomerančovou kůru, plastová
                        víčka,
                        použitý olej a v podzimním období kaštany. <br> <br>
                        <strong>ÚPLATA ZA PŘEDŠKOLNÍ VZDĚLÁVÁNÍ</strong><br>
                        Od 1.9 2020 je stanovena úplata za předškolní vzdělávání v základní výši 400,- Kč za dítě na
                        jeden
                        měsíc se splatností vždy do 15
                        dne v měsíci.<br>Bezplatné vzdělávání se poskytuje bezúplatně od počátku školního roku, který
                        následuje po dni, kdy dítě dosáhne věku 5 let.&nbsp;<br>Od nového školního roku
                        2020/2021&nbsp;budou
                        veškeré platby probíhat pouze bezhotovostně.<br>
                        Vyjímku tvoří platba v MŠ za divadelní představení či hudební pořady.&nbsp;<br><strong>účet
                            školy
                            1004451399/0800</strong><br>
                        do zprávy pro příjemce vždy uvádějte:<br>
                        <p class="MARGIN:0">- příjmení dítěte, o jakou platbu se jedná a případně i za jaké období
                            např.:
                            Novák úplata MŠ 9/2019 neboNovák – turistický kroužek 9-12/2019 <br> nebo kroužek keramika
                            apod.nebo Novák – ozdravný pobyt nebo plavecký výcvik apod. </p>

                        <br>


                        </div>
                        <div class="col-md-4">
                        <h2 class="text-center headerbar" style="/*padding-left: 60px;*/padding-top: 30px; padding-bottom:20px"><span
                                class="text-center" style="/*border-bottom: 2px solid black;*/">
                                <?php 
                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                        echo 'Kalendář <i class="fas fa-plus" id="addNew"></i>';
                     }else{
                        echo 'Kalendář';
                     }
                ?>
                            
                            </span></h2>
                        
                        
                        <div id="newsForm" class="col-md-12">
                            <form action="php/addNew.php" method="POST">
                                <div class="form-group">
                                    <label for="datum">Datum</label>
                                    <input type="date" name="datum" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="text">Text</label>
                                    <textarea class="form-control" name="body" id="body" cols="47" rows="5"></textarea>
                                </div>
                                <button class="btn btn-sm btn-primary" type="submit">přidat</button>
                            </form>
                        </div>
                        
                        
                        <?php
                            $sql = '
                            SELECT body, DATE_FORMAT(datum, "%e.%c.") as "datum", datum_pridani, m.name, n.id_new as "id_new" FROM news n
                            left JOIN months m ON m.id_month = n.month
                            WHERE m.id_month = 6
                            order by n.datum desc
                            ';  
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                echo "<strong><i>ČERVEN</i></strong><br>";
                                echo "<div class='month'>";
                                while($row = $result->fetch_assoc()) {
                                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                                        echo '<li style="word-wrap: break-word; white-space: normal;"><a href="php/deletenew.php?q='.$row["id_new"].'" style="color:inherit !important;font-size:110%"><i class="fa fa-trash" aria-hidden="true"></i></a> '. $row["datum"] . ' - ' . $row["body"] . "</li>";
                                     }else{
                                        echo '<div class="new" style="word-wrap: break-word; white-space: normal;"><b>'.$row["datum"] . '</b> - ' . $row["body"].'</div>';
                                     }
                                }
                                echo "</div>";
                            }      
                                                                
                        ?>
                        <?php
                            $sql = '
                            SELECT body, DATE_FORMAT(datum, "%e.%c.") as "datum", datum_pridani, m.name, n.id_new as "id_new" FROM news n
                            left JOIN months m ON m.id_month = n.month
                            WHERE m.id_month = 5
                            order by datum desc

                            ';  
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                echo "<strong><i>KVĚTEN</i></strong><br>";
                                echo "<div class='month'>";
                                while($row = $result->fetch_assoc()) {
                                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                                        echo '<li style="word-wrap: break-word; white-space: normal;"><a href="php/deletenew.php?q='.$row["id_new"].'" style="color:inherit !important;font-size:110%"><i class="fa fa-trash" aria-hidden="true"></i></a> '. $row["datum"] . ' - ' . $row["body"] . "</li>";
                                     }else{
                                        echo '<div class="new" style="word-wrap: break-word; white-space: normal;"><b>'.$row["datum"] . '</b> - ' . $row["body"].'</div>';
                                     }
                                }
                                echo "</div>";
                            }                                                    
                        ?>
                        <?php
                            $sql = '
                            SELECT body, DATE_FORMAT(datum, "%e.%c.") as "datum", datum_pridani, m.name, n.id_new as "id_new" FROM news n
                            left JOIN months m ON m.id_month = n.month
                            WHERE m.id_month = 4
                            order by n.datum desc
                            ';  
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                echo "<strong><i>DUBEN</i></strong><br>";
                                echo "<div class='month'>";
                                while($row = $result->fetch_assoc()) {
                                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                                        echo '<li style="word-wrap: break-word; white-space: normal;"><a href="php/deletenew.php?q='.$row["id_new"].'" style="color:inherit !important;font-size:110%"><i class="fa fa-trash" aria-hidden="true"></i></a> '. $row["datum"] . ' - ' . $row["body"] . "</li>";
                                     }else{
                                        echo '<div class="new" style="word-wrap: break-word; white-space: normal;"><b>'.$row["datum"] . '</b> - ' . $row["body"].'</div>';
                                     }
                                }
                                echo "</div>";
                            }                                                    
                        ?>
                        <?php
                            $sql = '
                            SELECT body, DATE_FORMAT(datum, "%e.%c.") as "datum", datum_pridani, m.name, n.id_new as "id_new" FROM news n
                            left JOIN months m ON m.id_month = n.month
                            WHERE m.id_month = 3
                            order by n.datum desc
                            ';  
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                echo "<strong><i>BŘEZEN</i></strong><br>";
                                echo "<div class='month'>";
                                while($row = $result->fetch_assoc()) {
                                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                                        echo '<li style="word-wrap: break-word; white-space: normal;"><a href="php/deletenew.php?q='.$row["id_new"].'" style="color:inherit !important;font-size:110%"><i class="fa fa-trash" aria-hidden="true"></i></a> '. $row["datum"] . ' - ' . $row["body"] . "</li>";
                                     }else{
                                        echo '<div class="new" style="word-wrap: break-word; white-space: normal;"><b>'.$row["datum"] . '</b> - ' . $row["body"].'</div>';
                                     }
                                }
                                echo "</div>";
                            }                                                    
                        ?>
                        <?php
                            $sql = '
                            SELECT body, DATE_FORMAT(datum, "%e.%c.") as "datum", datum_pridani, m.name, n.id_new as "id_new" FROM news n
                            left JOIN months m ON m.id_month = n.month
                            WHERE m.id_month = 2
                            order by n.datum desc
                            ';  
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                echo "<strong><i>ÚNOR</i></strong><br>";
                                echo "<div class='month'>";
                                while($row = $result->fetch_assoc()) {
                                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                                        echo '<li style="word-wrap: break-word; white-space: normal;"><a href="php/deletenew.php?q='.$row["id_new"].'" style="color:inherit !important;font-size:110%"><i class="fa fa-trash" aria-hidden="true"></i></a> '. $row["datum"] . ' - ' . $row["body"] . "</li>";
                                     }else{
                                        echo '<div class="new" style="word-wrap: break-word; white-space: normal;"><b>'.$row["datum"] . '</b> - ' . $row["body"].'</div>';
                                     }
                                }
                                echo "</div>";
                            }                                                    
                        ?>
                        <?php
                            $sql = '
                            SELECT body, DATE_FORMAT(datum, "%e.%c.") as "datum", datum_pridani, m.name, n.id_new as "id_new" FROM news n
                            left JOIN months m ON m.id_month = n.month
                            WHERE m.id_month = 1
                            order by n.datum desc
                            ';  
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                echo "<strong><i>LEDEN</i></strong><br>";
                                echo "<div class='month'>";
                                while($row = $result->fetch_assoc()) {
                                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                                        echo '<li style="word-wrap: break-word; white-space: normal;"><a href="php/deletenew.php?q='.$row["id_new"].'" style="color:inherit !important;font-size:110%"><i class="fa fa-trash" aria-hidden="true"></i></a> '. $row["datum"] . ' - ' . $row["body"] . "</li>";
                                     }else{
                                        echo '<div class="new" style="word-wrap: break-word; white-space: normal;"><b>'.$row["datum"] . '</b> - ' . $row["body"].'</div>';
                                     }
                                }
                                echo "</div>";
                            }                                                    
                        ?>
                        <?php
                            $sql = '
                            SELECT body, DATE_FORMAT(datum, "%e.%c.") as "datum", datum_pridani, m.name, n.id_new as "id_new" FROM news n
                            left JOIN months m ON m.id_month = n.month
                            WHERE m.id_month = 12
                            order by n.datum desc
                            ';  
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                echo "<strong><i>PROSINEC</i></strong><br>";
                                echo "<div class='month'>";
                                while($row = $result->fetch_assoc()) {
                                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                                        echo '<li style="word-wrap: break-word; white-space: normal;"><a href="php/deletenew.php?q='.$row["id_new"].'" style="color:inherit !important;font-size:110%"><i class="fa fa-trash" aria-hidden="true"></i></a> '. $row["datum"] . ' - ' . $row["body"] . "</li>";
                                     }else{
                                        echo '<div class="new" style="word-wrap: break-word; white-space: normal;"><b>'.$row["datum"] . '</b> - ' . $row["body"].'</div>';
                                     }
                                }
                                echo "</div>";
                            }                                                    
                        ?>
                        <?php
                            $sql = '
                            SELECT body, DATE_FORMAT(datum, "%e.%c.") as "datum", datum_pridani, m.name, n.id_new as "id_new" FROM news n
                            left JOIN months m ON m.id_month = n.month
                            WHERE m.id_month = 11
                            order by n.datum desc
                            ';  
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                echo "<strong><i>LISTOPAD</i></strong><br>";
                                echo "<div class='month'>";
                                while($row = $result->fetch_assoc()) {
                                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                                        echo '<li style="word-wrap: break-word; white-space: normal;"><a href="php/deletenew.php?q='.$row["id_new"].'" style="color:inherit !important;font-size:110%"><i class="fa fa-trash" aria-hidden="true"></i></a> '. $row["datum"] . ' - ' . $row["body"] . "</li>";
                                     }else{
                                        echo '<div class="new" style="word-wrap: break-word; white-space: normal;"><b>'.$row["datum"] . '</b> - ' . $row["body"].'</div>';
                                     }
                                }
                                echo "</div>";
                            }                                                    
                        ?>
                        <?php
                        $sql = '
                        SELECT body, DATE_FORMAT(datum, "%e.%c.") as "datum", datum_pridani, m.name, n.id_new as "id_new" FROM news n
                        left JOIN months m ON m.id_month = n.month
                        WHERE m.id_month = 10
                        order by n.datum desc
                        ';  
                        $result = $conn->query($sql);

                        if($result->num_rows > 0){
                            echo "<strong><i>ŘÍJEN</i></strong><br>";
                            echo "<div class='month'>";
                                while($row = $result->fetch_assoc()) {
                                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                                        echo '<li style="word-wrap: break-word; white-space: normal;"><a href="php/deletenew.php?q='.$row["id_new"].'" style="color:inherit !important;font-size:110%"><i class="fa fa-trash" aria-hidden="true"></i></a> '. $row["datum"] . ' - ' . $row["body"] . "</li>";
                                     }else{
                                        echo '<div class="new" style="word-wrap: break-word; white-space: normal;"><b>'.$row["datum"] . '</b> - ' . $row["body"].'</div>';
                                     }
                                }
                                echo "</div>";
                        }                                                    
                    ?>
                        <?php
                        
                        $sql = '
                        SELECT body, DATE_FORMAT(datum, "%e.%c.") as "datum", datum_pridani, m.name, n.id_new as "id_new" FROM news n
                        left JOIN months m ON m.id_month = n.month
                        WHERE m.id_month = 9
                        order by n.datum desc
                        ';  
                        $result = $conn->query($sql);

                        if($result->num_rows > 0){
                            echo "<strong><i>ZÁŘÍ</i></strong><br>";
                            echo "<div class='month'>";
                            while($row = $result->fetch_assoc()) {
                                if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                                    echo '<li style="word-wrap: break-word; white-space: normal;"><a href="php/deletenew.php?q='.$row["id_new"].'" style="color:inherit !important;font-size:110%"><i class="fa fa-trash" aria-hidden="true"></i></a> '. $row["datum"] . ' - ' . $row["body"] . "</li>";
                                 }else{
                                    echo '<div class="new" style="word-wrap: break-word; white-space: normal;"><b>'.$row["datum"] . '</b> - ' . $row["body"].'</div>';
                                 }
                            }
                            echo "</div>";
                        }                                                    
                    ?>
                        </div>
                    </div>
                    <div class="pp">
                        
                        

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        include "footer.php";
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

    <script src="assets/js/Trumbowyg-master/dist/trumbowyg.min.js"></script>
    <script>
    $('#newsForm').hide();
    $('#addNew').on('click', function() {
        console.log('click');
        $('#newsForm').toggle();
    });
    </script>
</body>
<script src="assets/js/Trumbowyg-master/dist/plugins/colors/trumbowyg.colors.min.js"></script>
<script>
$('.mainText').hide();
$('.editorr').trumbowyg({
    autogrow: true,
    btns: [
        ['viewHTML'],
        ['undo', 'redo'], // Only supported in Blink browsers
        ['formatting'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['link'],
        ['insertImage'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['foreColor', 'backColor'],
        ['fullscreen']
    ]
});
$('#editText').on('click', function() {
    $.get("php/getText.php", function(result) {
        $('.editorr').append(result);
        $('.mainText').toggle();
    })
});
$("#ulozText").on('click', function() {
    console.log($('.editorr').html());
    $.post("php/setText.php", {
        text: $('.editorr').html()
    }, function(result) {
        console.log(result);
        location.reload();
    });
});
</script>

</html>