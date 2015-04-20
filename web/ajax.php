<?php
header("Access-Control-Allow-Origin: *");
?>
<html lang="fr">
<head>
<meta charset="utf-8" />
</head>

<body>
TEST AJAX
<div id="message"></div>


<script src="http://code.jquery.com/jquery.js"></script>
<script>
$(function(){
    $.ajax({
            type: "GET",
            cache: false,
            url: "http://sfrest.local/app_dev.php/notes",
          //  contentType: "text/plain",
            dataType: "json",
           // processData: true,
          data: { limit: 50 },
            //  data: { 'note[message]' : 'PI=3.1415926535897' },//il faut être en POST pour ecrire
            success: function(data, status, jqXHR){
                  console.log(data);

                $.each(data.notes, function (i,item){
                   //alert(item.message);
                   $('#message').append(i+" / Status:"+status+" / message:"+item.message+"<br>");
                   
               });
               
             },
            error: function(jqXHR, status){
                  console.log(status + JSON.stringify(jqXHR));
                  //error(jqXHR, status);
            }   
    });
 });


$(function error(j,s){
        console.log(s + JSON.stringify(j));
 });
 
 
</script>
</body>
</html>