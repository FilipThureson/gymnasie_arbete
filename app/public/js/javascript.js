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
    var user_fk = $('#user_fk').val();
    var title = $('#title').val();
    var q_text = $('#q_text').val();
    
    var form_data = {
        course : $('#course').val(),
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


$(document).ready(function(){
    loadQuestions();
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

            $("#questions").append(`
                <a style="text-decoration: none; color: #1a202c" href="/${question.course_fk}/${question.q_pk}">
                <div style="border-bottom: 1px solid #4a5568">
                    <h4>${question.title}</h4>
                    <p> ${question.name}</p>
                    <p>${question.q_text}</p>
                    <p>${seconds}</p>
                </div>
                </a>
            `)
            
            
        });
    }else{
        $("#questions").html("<h5>Oooops Här fanns det inga frågor! Publicera den första!</h5>");
        
    }
}