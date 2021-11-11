const pathname = window.location.pathname;
function loadQuestions(){
    
    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `/questions/1/ajax`,  
        success: function (data){
            var data_obj = JSON.parse(data);
            console.log(data_obj);
        }
    }, "json")
    
}

$(document).ready(function(){
    loadQuestions();
});

console.log(pathname);