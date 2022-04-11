<!DOCTYPE html>
<html style="font-family: 'Schoolbell' !important;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Schoolbell">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<style>


</style>

<body>

<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <form action="php/login.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                
            </div>
            <div class="form-group">
                <label for="password">Heslo</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Přihlásit</button>
            </form>
            <br>

            <?php 
                if(isset($_GET["error"])){
                    if($_GET["error"] == "badpassword"){
                        echo '<div class="alert alert-danger">
                        Špatné heslo
                    </div>';
                    }
                    if($_GET["error"] == "bademail"){
                        echo '<div class="alert alert-danger">
                        Účet s touto emailovou adresou neexistuje
                    </div>';
                    }
                }


            ?>
            

        </div>
        <div class="col-md-3"></div>
    </div>
</div>


<script>

/*    $('#myForm').on("submit", function(){
        console.log("submit");
        $.post('php/login.php', {email: $("#email").val(), password: $("#password").val()}, function(result){
            console.log(result);
        });
    });
*/

</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>