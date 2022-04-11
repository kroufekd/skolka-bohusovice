<!DOCTYPE html>
<html style="font-family: 'Schoolbell' !important;">

<head>
    <?php
    session_start(); 
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
                    style="/*border-bottom: 2px solid black;*/">Distanční výuka</span></h1>
                   
            <div class="container">
            <?php 
                    
                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                        echo '<div style="row">
                        <div class="col-4" style="">
                            <div class="row">
                                <div class="col-6" style="padding:0">
                                    <h4 id="addVyuka">Přidat <i class="fas fa-plus" ></i></h4>
                                </div>
                            </div>
                        </div>
                    </div>';      
                    }
                ?>
                <div class="col-md-4" id="myFormVyuka">
                <form action="php/newVyuka.php" method="post" class="">
                    <div class="form-group">
                        <label for="vyukaName">Název (týden)</label><br>
                        <input type="text" name="vyukaName" id="vyukaName" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="vyukaText">Popis výuky</label><br>
                        <textarea name="vyukaText" id="vyukaText" cols="40" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="VyukaSoubor">Vyberte soubor s výukou</label><br>
                        <select name="vyukaSoubor" id="VyukaSoubor">
                        <?php 
                        include "php/db.php";

                        $sql = "SELECT * FROM files";
                        $result = $conn->query($sql);
                        while($rows = $result->fetch_assoc()){
                            echo "<option value='".$rows["id_file"]."'>".$rows["name"]."</option>";
                        }


                        ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Uložit</button>
                </form>
            </div>
                <?php 
                include "php/db.php";

                $sql = "SELECT *, dv.name AS \"dv.name\", f.name as \"f.name\"\n"
                . "FROM dist_vyuka dv\n"
                . "JOIN files f on f.id_file = dv.file";

                $result = $conn->query($sql);
                while($rows = $result->fetch_assoc()){
                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])){
                        echo "<div class='tyden'>";
                        echo "<h3>".$rows["dv.name"]." </h3>";
                        echo "<p>".$rows["text"];
                        echo "<br> Ke stažení <a href='php/".$rows["path"]."' target='_blank'>zde</a></p>";
                        echo '<a href="php/deleteVyuka.php?q='.$rows["id_vyuka"].'" style="color:inherit !important;font-size:110%"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                        echo "</div>";
                        echo "<hr>";
                    }else{
                        echo "<div class='tyden'>";
                        echo "<h3>".$rows["dv.name"]." </h3>";
                        echo "<p>".$rows["text"];
                        echo "<br> Ke stažení <a href='php/".$rows["path"]."' target='_blank'>zde</a></p>";
                        echo "</div>";
                        echo "<hr>";
                    }
                    
                }
                ?>
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
    <script>
                $("#myFormVyuka").hide();

                $("#addVyuka").on('click', function(){
                    $("#myFormVyuka").toggle();
                });


    </script>
</body>

</html>