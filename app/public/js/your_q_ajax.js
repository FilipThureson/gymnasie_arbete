let pathname = window.location.pathname;

let new_pathname = pathname.substring(16);

console.log(new_pathname);

function loadQuestions(){
    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `/getyour/${new_pathname}`,
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

function renderQuestions(data){
    if(data.length >0){
        $("main").html(`<h1>Dina Frågor</h1>`);
        data.forEach(question => {
            var dateNow = new Date();
            var dateUpload =new Date(question.create_at);

            // Beräknar ut antal Sekunder/Minuter/timmar/dagar sedan frågar vad upplagd
            var difference= Math.abs(dateNow-dateUpload);
            seconds = difference/(1000)
            if(seconds > 60 && seconds < 3600){
                seconds =Math.floor(seconds/60);
                if(seconds == 1){
                    seconds += " Minut Sedan"
                }else{
                    seconds += " Minuter Sedan"
                }
            }else if(seconds > 3600 && seconds <(3600*24)){
                seconds =Math.floor((seconds/60)/60);
                if(seconds == 1){
                    seconds += " Timme Sedan"
                }else{
                    seconds += " Timmar Sedan"
                }
            }else if(seconds > (3600*24)){
                seconds =Math.floor(((seconds/60)/60)/24);
                if(seconds == 1){
                    seconds += " Dag Sedan"
                }else{
                    seconds += " Dagar Sedan"
                }
            }else{
                seconds=  Math.floor(seconds);
                seconds += " Sekunder Sedan"
            }

            $("main").append(`
                <div class="question">
                    <br>
                    <h3>${question.post_rubrik}</h3><span>${seconds}, av <a href="#">@${question.name}</a></span>
                    <p>${question.post_text}</p>
                    <a class="link_to_question" href="/questions/${question.post_pk}">Öppna Frågan</a>
                    <br>
                    <br>
                </div>
            `)
            MathJax.typeset();
        });
    }else{
        $("main").html(`<h1>Dina Frågor</h1><p>Oooops Här fanns det inga frågor! Publicera den första!</p>`);
    }
}


$(document).ready(function(){
    loadQuestions();
});