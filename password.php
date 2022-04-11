<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<?php 
    if($_POST["password"] == "mkroufkova"){
        echo '
        <form action="add-novinky.php" method="post">
    <select name="month" id="month" style="margin-bottom:15px">                
        <option value="1">leden</option>
        <option value="2">únor</option>
        <option value="3">březen</option>
        <option value="4">duben</option>
        <option value="5">květen</option>
        <option value="6">červen</option>
        <option value="7">červenec</option>
        <option value="8">srpen</option>
        <option value="9">září</option>
        <option value="10">říjen</option>
        <option value="11">listopad</option>
        <option value="12">prosinec</option>
    </select><br>
    <div id="news">
        <textarea required rows="2" cols="50" name="text1"></textarea><br>
    </div>
    
    <button id="plus">+</button><br>
    <button id="minus">-</button><br>
    <input type="submit" value="Uložit">
</form>
<script>
    var counter = 2;
    $("#plus").on("click", function(){
        $("#news").append(`<textarea required rows="2" cols="50" name="text`+counter+`"></textarea><br>`);
        counter++;
    });
    $("#minus").on("click", function(){
        if(counter >= 3){
            $("#news").children().last().remove();
            $("#news").children().last().remove();
            counter--;
        }
    })            
</script>

        ';

    } else{
        echo "špatné heslo";
    }


?>


