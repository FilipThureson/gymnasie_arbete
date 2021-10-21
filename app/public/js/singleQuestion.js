const pathname = window.location.pathname;
function loadQuestions(){
    
    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `${pathname}/getOne/`,  
        success: function (data){
            console.log(data);
        }
    })
}

$(document).ready(function(){
    loadQuestions();
});

console.log(pathname);