const form = document.getElementById('form');
const title = document.getElementById('title');
const picture = document.getElementById('picture');
const fil = document.getElementById('fil');
const description = document.getElementById('description');

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};


const validateInputs = () => {
    const titlev = title.value.trim();
    const picturev = picture.value.trim();
    const filev = fil.value.trim();
    const desv = description.value.trim();

    var pdot=picture.value.lastIndexOf('.')+1;
    var ext=picture.value.substring(pdot);
    var validatepic=["jpeg","jpg","png"];

    var pdotf=fil.value.lastIndexOf('.')+1;
    var extt=fil.value.substring(pdotf);
    var validatefil=["pdf"];
    if(titlev === '') {
        setError(title, 'Title is required');
    } else {
        setSuccess(title);
    }

    if(picturev === '') {
        setError(picture, 'Picture is required');
    }else{
        var resultp=validatepic.includes(ext);
        //console.log(resultp);
        if(resultp==false)
        {
            setError(picture, 'Picture needs to be jpeg or jpg or png');
        }
        else
        {
            setSuccess(picture);
        }
        
    }

    if(filev === '') {
        setError(fil, 'Pdf File is required');
    } else{
        var resultf=validatefil.includes(extt);
        //console.log(resultp);
        if(resultf==false)
        {
            setError(fil, 'File needs to be in Pdf Formate');
        }
        else
        {
            setSuccess(fil);
        }
        
    }
    if(desv === '') {
        setError(description, 'Description is required');
    }else {
        setSuccess(description);
    }

};
