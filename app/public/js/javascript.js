/*const upload_form = document.getElementById('upload_form');

upload_form.addEventListener('submit', function(e){
    var data = {test: 'yes'};
    var course = document.getElementById('course').value;
    console.log(course);
    e.preventDefault();
    fetch(`/${course}/upload`, {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers:{
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(respone => respone.json())
    .then(data => console.log(data));
});