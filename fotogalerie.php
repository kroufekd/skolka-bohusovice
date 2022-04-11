<!DOCTYPE html>
<html>

<head>
    <?php
        session_start(); 
            include "head.php";
            include "php/db.php";
        ?>
</head>

<body>
    <?php 
            include "header.php";
        ?>
    <div class="bounce animated photo-gallery" style="background-color: inherit;">
        <div class="container">
            <div class="intro">
                <p class="text-center"><br></p>
            </div>
            <?php 
                    
                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                        echo '<div style="row">
                        <div class="col-4" style="">
                            <div class="row">
                                <div class="col-6" style="padding:0">
                                    <h4 id="addAlbum">Přidat album <i class="fas fa-image" ></i></h4>
                                </div>
                                <div class="col-6" style="padding:0">
                                    <h4 id="addNew">Přidat fotky <i class="fas fa-compact-disc"></i></h4>
                                </div>
                            </div>
                        </div>
                    </div>';      
                    }
                ?>
            


            <div class="col-md-3 " id="myFormAlbum">
                <form action="php/newAlbum.php" method="post" class="">
                    <div class="form-group">
                        <label for="albumName">Název alba</label><br>
                        <input type="text" name="albumName" id="albumName" required class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Uložit</button>
                </form>
            </div>

            <div class="col-md-3" id="myForm">
                <form action="php/newPhotos.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="album">Vyber album</label><br>
                        <select class="form-control" name="album" id="album">
                            <?php
                                
                                $sql = "SELECT * FROM album order by date_of_creation DESC";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value=".$row['id_album'].">".$row["name"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo"></label>
                        <input type="file" name="fileToUpload" class="" value="Vyber" id="photo">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Uložit</button>
                </form>
            </div>

            <div class="gallery">
                <?php 
                $sql = 'SELECT * FROM `album` ORDER BY `album`.`date_of_creation` DESC';
                $result = $conn->query($sql);
                while($albums = $result->fetch_assoc()){
                    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                        echo '<h2 class="headerbar-sm"><span class="headerAlbum">'.$albums["name"].'</span> <i style="cursor:pointer" onclick="changeAlbum('.$albums["id_album"].')" class="fa fa-pen" value="'.$albums["id_album"].'" aria-hidden="true"></i> <a href="php/deleteAlbum.php?q='.$albums["id_album"].'" style="color:inherit"><i class="fa fa-trash" aria-hidden="true"></i></a></h2>';
                    }else{
                        echo "<h2 class='headerbar-sm'>".$albums["name"]."</h2>";
                    }
                
                    
                    echo "<div class='row photos'>";
                    $sql2 = 'SELECT * FROM photos WHERE album = "'.$albums["id_album"].'"';
                    $result2 = $conn->query($sql2);
                    while($photos = $result2->fetch_assoc()){
                        echo '<div class="col-sm-6 col-md-4 col-lg-3 item"><a href="'.$photos["path"].'" data-lightbox="photos"><img class="img-fluid" src="'.$photos["path"].'"></a></div>';
                        if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                            echo '<a href="php/deletePhoto.php?q='.$photos["id_photo"].'" style="color:inherit"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                        }
                    }
                    echo "</div>";
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
    $("#myForm").hide();
    $("#myFormAlbum").hide();
    $("#addNew").on("click", function() {
        $("#myForm").toggle();
    });
    $("#addAlbum").on("click", function() {
        $("#myFormAlbum").toggle();
    });

    function changeAlbum(id) {
        var i = event.target;
        var header = $(i).prev();
        header.html("<input type='text' id='newHeader' placeholder='nový název'><button onclick='postUpdate(this, " +
            id + ")' id='headerBtn'>uložit</button>");
    }

    function postUpdate(x, id) {
        var new_name = $(x).prev().val();
        $.post("php/changeAlbum.php", {
            id: id,
            new_name: new_name
        }, function(result) {
            location.reload();
        });
    }
    </script>
</body>

</html>