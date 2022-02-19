/*
document.getElementById('pfpImg').addEventListener('click', ()=>{
    document.getElementById('pfpInp').click();
});

pfpInp.onchange = evt => {
    const [file] = pfpInp.files
    if (file) {
        let pfpConfirm = document.getElementById('pfpConfirm');
        newPfp.src = URL.createObjectURL(file)
        pfpConfirm.style.display = 'flex';
        c = null;
        c = new Croppie(newPfp,{
            viewport: {width: 400, height: 400, type: 'square'}
        });
    }
}


document.getElementById('confirmNewPfp').addEventListener('click', ()=>{
    c.result({type: 'blob', size: 'original'}).then(function(blob){
        pfpImg.src = URL.createObjectURL(blob);
        console.log(URL.createObjectURL(blob));
        pfpConfirm.style.display = 'none';

    });
});
*/
