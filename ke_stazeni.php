<!DOCTYPE html>
<html style="font-family: 'Schoolbell' !important;">
<?php 
    session_start();
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
            style="/*color: white;*/background-color: #fdda82;padding: 0px;padding-bottom: 0px;min-height: 400px;margin-top: 0px;z-index: 9999;height: 100%;">
            <h1 class="text-center headerbar" style="/*padding-left: 60px;*/padding-top: 50px;"><span
                    class="text-center" style="/*border-bottom: 2px solid black;*/">Dokumenty</span></h1>
                    <div class="container">

            <?php 
                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                        echo '<h4 id="addNew">Přidat dokument <i class="fas fa-file-alt" id=""></i></h4>';
                     }else{      

                     }
                ?>
            <div id="newsForm" class="col-md-4">
                <form action="php/newfile.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="jmeno">Název</label>
                        <input type="text" name="jmeno" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fileToUpload">Nahrát soubor</label>
                        <input type="file" name="fileToUpload" id="soubor" class="form-control">
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit">přidat</button>
                </form>
                <br>
            </div>
            <ul style="">
                <?php 
                        include "php/db.php";

                        $result = $conn->query('
                            SELECT * FROM files
                        ');
                        while($row = $result->fetch_assoc()){                           
                            if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])){
                                echo '
                                <li><a href="php/deletefile.php?q='.$row["id_file"].'" style="color:inherit !important;font-size:110%"><i class="fa fa-trash" aria-hidden="true"></i></a> <a href="php/'.$row["path"].'">'.$row["name"].'</a></li>
                                ';
                            }else{
                                echo '<li><a href="php/'.$row["path"].'">'.$row["name"].'</a></li>';
                            }
                        }
                    ?>

            </ul>
                    </div>
        </div>

    </div>
    </div>
    <div class="footer-clean" style="background-color: #ffd705;padding: 30px;padding-bottom: 0px;">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Kde nás najdete?</h3><iframe allowfullscreen="" frameborder="0" width="100%" height="200"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCq9iZwFp3ELbYnCMOrE7i8A76lW1xuxac&amp;q=Husovo+n%C3%A1m.+112%2C+411+56+Bohu%C5%A1ovice+nad+Oh%C5%99%C3%AD&amp;zoom=11"></iframe>
                    </div>
                    <div class="col-sm-4 col-md-3 offset-xl-1 item">
                        <h3>O nás</h3>
                        <ul>
                            <li><a href="kontakty.html">Kontaky</a></li>
                            <li><a href="pravidla.html">Pravidla</a></li>
                            <li><a href="logopedie.html">Logopedie</a></li>
                            <li><a href="stravovani.html">Stravova</a>ní</li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Fotogalerie</h3>
                        <ul>
                            <li><a href="fotogalerie.html">U nás</a></li>
                            <li><a href="fotogalerie.html">Program ekologicého střediska SEVER<br></a></li>
                            <li><a href="fotogalerie.html">Společné chvíle ve třídě "C"</a></li>
                            <li><a href="fotogalerie.html">Máme rádi přírodu</a></li>
                            <li><a href="fotogalerie.html">Jak jsme putovali za jablíčkem - třída "A"</a></li>
                            <li><a href="fotogalerie.html">Ranní hraní to nás baví - třída "B"</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <div class="text-center" style="width: 100%;height: 30px;"><span style="font-weight: 100;color: grey;">Copyright
                © Dominik Kroufek 2018<br></span></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script>
    $('#newsForm').hide();
    $('#addNew').on('click', function() {
        console.log('click');
        $('#newsForm').toggle();
    });
    </script>
</body>

</html>