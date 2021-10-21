const pathname = window.location.pathname;
function loadQuestions(){
    
    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `${pathname}/getAll/`,
        beforeSend: function () { 
            $('#loader').removeClass('hidden')
        },   
        success: function (data){
            renderQuestions(JSON.parse(data));
        },
        complete: function () {
            $('#loader').addClass('hidden')
        },
    })
}

$('#upload_form').submit(function(e){

    var course = $('#course').val();
    
    var form_data = {
        course : course,
        user_fk : $('#user_fk').val(),
        title : $('#title').val(),
        q_text : $('#q_text').val()
    };

    e.preventDefault();
    
    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `/${course}/upload`,
        data: form_data,
        success: function (data){
            loadQuestions();
        }
    })
    
});

function renderQuestions(data){
    if(data.length >0){
        $("#questions").html("");
        data.forEach(question => {
            var dateNow = new Date();
            var dateUpload =new Date(question.create_at);

            // Beräknar ut antal Sekunder/Minuter/timmar/dagar sedan frågar vad upplagd
            var difference= Math.abs(dateNow-dateUpload);
            seconds = difference/(1000)
            if(seconds > 60 && seconds < 3600){
                seconds =Math.floor(seconds/60);
                seconds += " Minuter Sedan"
            }else if(seconds > 3600 && seconds <(3600*24)){
                seconds =Math.floor((seconds/60)/60);
                seconds += " Timmar Sedan"
            }else if(seconds > (3600*24)){
                seconds =Math.floor(((seconds/60)/60)/24);
                seconds += " Dagar Sedan"
            }else{
                seconds=  Math.floor(seconds);
                seconds += " Sekunder Sedan"
            }

            $("main").append(`
                <div class="question">
                <br>
                <h3>${question.title}</h3><span>${seconds}, av <a href="#">@${question.name}</a></span>
                <p>${question.q_text}</p>
                <br>
                <br>
                </div>
            `)
            
            /*

            <div class="question">
            <br>
            <h3>Title</h3><span>69 timmar sedan, av <a href="#">@Angel Strömstedt</a></span>
            <p>Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim </p>
            <div>
                <a href="#">Svara</a>
            </div>
            <br>
            <br>
            </div>
            */
        });
    }else{
        $("#questions").html("<h5>Oooops Här fanns det inga frågor! Publicera den första!</h5>");
        
    }
}


$(document).ready(function(){
    loadQuestions();
});


//Upload-aside movement
tinymce.init({
    selector: '#q_text',
    menubar: false,
    body_class: "mceBlackBody"
  });

  //OPEN SLIDE
  document.getElementById("aside_btn").addEventListener("click", function(){
    document.getElementById("slide").style.left=0;
  });

  //CLOSE SLIDE
  document.getElementById("close_slide").addEventListener("click", function(){
    document.getElementById("slide").style.left="100%";
  });

  //UPLOAD
  document.getElementById("upload_btn").addEventListener("click", function(){

  });