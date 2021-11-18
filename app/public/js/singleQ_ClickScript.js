/*
      tinymce.init({
        selector: '#q_text',
        menubar: false,
        body_class: "mceBlackBody"
      });
*/
//POSTS --Kan generaliseras?
let active_post_id;
$("main").delegate(".bi-arrows-collapse", "click", function() {
    console.log(this.id);


    document.getElementById(this.id).style.display = "none";
    //$(this.id).show().hide();
    this.id

    document.getElementById("expand-" + this.id.split("-")[1] + "_span").style.display = "block";
    document.getElementById("expand-" + this.id.split("-")[1]).style.display = "block";
    Array.prototype.forEach.call(document.getElementsByClassName(this.id.split("-")[1]), function(child) {
        child.style.display = "none";
    });
});

$("main").delegate(".bi-arrows-expand", "click", function() {
    console.log("#" + this.id);

    document.getElementById(this.id).style.display = "none";
    //$("#" + this.id).hide();

    document.getElementById("expand-" + this.id.split("-")[1] + "_span").style.display = "none";
    document.getElementById("expand-" + this.id.split("-")[1]).style.display = "none";
    document.getElementById("collapse-" + this.id.split("-")[1]).style.display = "block";
    Array.prototype.forEach.call(document.getElementsByClassName(this.id.split("-")[1]), function(child) {
        child.style.display = "block";
    });
});

$("main").delegate(".bi-hand-thumbs-up", "click", function() {
    let id = this.id.substr(4);
    console.log(id);
    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `like/${id}`,
        success: function(data) {
            loadQuestions();
        }
    });
});


//SLIDER
//OPEN SLIDE ---- REPLY

var post_active;

$("main").delegate(".bi-reply", "click", function() {
    document.getElementById("slide").style.left = "40%";
    document.getElementById("slide_left").style.left = "0%";

    post_active = document.getElementById(this.id.split("-")[1]);
    active_post_id = this.id.split("-")[1];
    document.getElementById("slide_left").innerHTML = post_active.innerHTML;
    Array.prototype.forEach.call(document.getElementById("slide_left").childNodes, function(element) {
        if (element.tagName == "DIV") {
            element.style = "display: none";
        }
        if (element.tagName == "H3") {
            element.style = "display: none";
        }
        if (element.tagName == "BR") {
            element.style = "display: none";
        }
    });
});

//CLOSE SLIDE

$("#close_slide").on("click", function() {
    document.getElementById("slide").style.left = "100%";
    document.getElementById("slide_left").style.left = "-100%";
});
//UPLOAD

$("#upload_btn").on("click", function() {

    form_data = {
        post_fk: active_post_id.substr(4),
        user_fk: $('#user_fk').val(),
        post_text: tinyMCE.activeEditor.getContent({ format: 'raw' })
    };

    //console.log(form_data);
    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `${socket_pathname}/upload`,
        data: form_data,
        datatype: "json",
        success: function(data) {
            console.log(data);
            loadQuestions();
            socket.emit('update', socket_pathname);
        }
    });
    document.getElementById("slide").style.left = "100%";
    document.getElementById("slide_left").style.left = "-100%";
});

$("main").delegate(".bi-trash", "click", function() {
    var parent_id = {
        id: this.id.split("t")[2]
    }
    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `/questions/delete`,
        data: parent_id,
        datatype: "json",
        success: function(data) {
            if (data) {
                loadQuestions();
                socket.emit('update', socket_pathname);
            } else {
                alert("du får ej ta bort denna fråga!");
            }
        }
    });
});