<?php
include_once("dbcon.php");
include_once("posts.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">

  <title>Auxilium</title>

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="newStyle.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link rel="icon" href="bilder/AUXILIUM_LOGO.png" type="image/icon type">

  <script src="https://cdn.tiny.cloud/1/fsua0ssfdpv74dcehnti9bto8m8q0u2ddzpc5c71y2cihi5k/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>
  <body>
    <header>
      <a href="#"><img src="bilder/AUXILIUM_SIDE.png" alt="AUXILIUM LOGO"></a>
      <ul>
        <li><a href="#">Dina frågor</a></li>
        <li><a href="#">Schema</a></li>
        <li><a href="#">Logga Ut</a></li>
        <a href="#"><img src="https://lh3.googleusercontent.com/a/AATXAJzNfTQLbt-MP90Iy2Tg-N48mZuAHeI_EU4xdF7z=s96-c" alt="Profile img" id="icon"></a>
      </ul>
    </header>

    <div class="wrapper" id="fixedWrapper">
      <main>
      <h1>Frågor</h1>
        <?php
            start_post(1);
        ?>

      </main>

    <div id="slide">
      <div>
        <h3>Svara</h3>

        <div>
          <svg id="upload_btn" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload svg_icon" viewBox="0 0 16 16">
            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
          </svg>

          <svg id="close_slide" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg svg_icon" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
          </svg>
        </div>
      </div>

      <form id="upload_form">
        <input id="answer" type="hidden" value="Matte">
        <input id="user_fk" type="hidden" value="angstr1@kfvelev.se">
        <textarea rows="18  " cols="30" id="q_text" placeholder="Beskrivning"></textarea><br>
      </form>
    </div>

    <div id="slide_left">
      <h1>Frågan:</h1>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>

      tinymce.init({
        selector: '#q_text',
        menubar: false,
        body_class: "mceBlackBody"
      });

                  //POSTS --Kan generaliseras?

      $("main").delegate(".bi-arrows-collapse", "click", function() {
        console.log(this.id);


        document.getElementById(this.id).style.visibility = "none";
        //$(this.id).show().hide();
        this.id
        
        document.getElementById("expand-"+this.id.split("-")[1]+"_span").style.display = "block";
        document.getElementById("expand-"+this.id.split("-")[1]).style.display = "block";
        Array.prototype.forEach.call(document.getElementsByClassName(this.id.split("-")[1]), function(child) {
          child.style.display = "none";
        });
      });

      $("main").delegate(".bi-arrows-expand", "click", function() {
        console.log("#"+this.id);

        document.getElementById(this.id).style.visibility = "none";
        $("#"+this.id).hide();
        document.getElementById("expand-"+this.id.split("-")[1]+"_span").style.display = "none";
        document.getElementById("expand-"+this.id.split("-")[1]).style.display = "block";
        Array.prototype.forEach.call(document.getElementsByClassName(this.id.split("-")[1]), function(child) {
          child.style.display = "block";
        });
      });


                          //SLIDER
      //OPEN SLIDE ---- REPLY

      var post_active;

      $("main").delegate(".bi-reply", "click", function(){
            document.getElementById("slide").style.left="40%";
            document.getElementById("slide_left").style.left="0%";

            post_active = document.getElementById(this.id.split("-")[1]);
            document.getElementById("slide_left").innerHTML = post_active.innerHTML;
            Array.prototype.forEach.call(document.getElementById("slide_left").childNodes, function(element){
              if(element.tagName == "DIV"){
                element.style="display: none";
              }
              if(element.tagName == "H3"){
                element.style="display: none";
              }
              if(element.tagName == "BR"){
                element.style="display: none";
              }
            });
        });

      //CLOSE SLIDE

      $("#close_slide").on("click", function(){
        document.getElementById("slide").style.left="100%";
        document.getElementById("slide_left").style.left="-100%";
      });
      //UPLOAD

    $( "#upload_btn" ).on("click", function() {
      
      var values = {
          parent_id: post_active.id.split("t")[1],
          text_value: tinyMCE.activeEditor.getContent({format : 'raw'})
        }


        $.ajax({
          type: 'post',
          url: '/svar_rek/dbaddpost.php',
          data: values,
          datatype: "json",
          success: function(data){
            console.log(data);
            $("main").html("<h1>Frågor</h1>"+data);
          }
        });
        document.getElementById("slide").style.left="100%";
        document.getElementById("slide_left").style.left="-100%";
    });

        $( "main" ).delegate(".bi-trash", "click", function() {
        var parent_id = {
          parent_id: this.id.split("t")[2]
        }

        $.ajax({
          type: 'post',
          url: '/svar_rek/dbdelete.php',
          data: parent_id,
          datatype: "json",
          success: function(data){
            $("main").html("<h1>Frågor</h1>"+data);
          }
        });
      });
    </script>
  </body>
</html>
