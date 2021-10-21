const pathname = window.location.pathname;
function loadQuestions(){
    
    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `${pathname}/getOne/`,  
        success: function (data){
            renderQuestion(JSON.parse(data)[0]);
        }
    })
}

function renderQuestion(data){
    $('main').html(`
    <div class="question">
    <br>
    <div class="row"><h3>${data.title}</h3><span>${data.create_at}, av <a href="#">@${data.name}</a></span></div>
    <p>        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quod vero accusantium facere cumque, nobis ut quas nesciunt. Placeat maxime dolore dignissimos qui sint beatae ipsam possimus aliquid! Natus officiis animi eveniet, rerum aut nemo voluptatem, unde voluptatum ea distinctio suscipit. Rerum perspiciatis enim, dicta nam reprehenderit ducimus ex voluptas, placeat repellat cupiditate molestias rem incidunt fuga officia laudantium quas explicabo deserunt. Aliquam deleniti sint tempore corrupti tempora assumenda blanditiis cumque ipsa, quidem quo mollitia corporis aut necessitatibus nisi quisquam aperiam recusandae adipisci natus consequuntur, voluptatem iusto illum commodi est. Sed repellendus recusandae non dolor dignissimos sunt voluptatibus accusamus modi.
    </p>
    <div>
        <p>Kurs: <a href="/${data.course_fk}">@${data.course_fk}</a></p>
    </div>
    <br>
    <br>
    </div>
    `);
}

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
$(document).ready(function(){
    loadQuestions();
});

console.log(pathname);