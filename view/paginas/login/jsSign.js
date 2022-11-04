window.addEventListener('DOMContentLoaded', (event) => {
    burbujas (); 
});

const form = document.getElementById('formularioSign');
const username = document.getElementById('usernameRegister');
const email = document.getElementById('mailRegister');
const password = document.getElementById('passwordRegister');
const password2 = document.getElementById('password2Register');

form.addEventListener('submit', e => {
    e.preventDefault();
    document.getElementById("msg").style.display = 'none';

    validarInputs();
});

const setError = (element, message) => {
    const controlInput = element.parentElement;
    const mostrarError = controlInput.querySelector('.error');

    mostrarError.innerText = message;
    controlInput.classList.add('error');
    controlInput.classList.remove('success')
}

const setSuccess = element => {
    const controlInput = element.parentElement;
    const mostrarError = controlInput.querySelector('.error');

    mostrarError.innerText = '';
    controlInput.classList.add('success');
    controlInput.classList.remove('error');
};

const validarEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validarInputs = () => {
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    var userCheck = false; var emailCheck = false; var passCheck = false; var pass2Check = false;

    if(usernameValue === '') {
        setError(username, 'Erabiltzaile nahitaezkoa da.');
    } else if (usernameValue.length > 20 ){
        setError(username, 'Erabiltzaile luzeegia da. 20 karaktere Max.');
    } else {
        setSuccess(username);
        userCheck = true;
    }

    if(emailValue === '') {
        setError(email, 'Email nahitaezkoa da.');
    } else if (!validarEmail(emailValue)) {
        setError(email, 'Eman baliozko Email bat.');
    }else if (emailValue.length > 64 ){
        setError(email, 'Email luzeegia da. 64 karaktere Max.');
    } else {
        setSuccess(email);
        emailCheck = true;
    }

    if(passwordValue === '') {
        setError(password, 'Pasahitza nahitaezkoa da.');
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Pasahitza 8 karakterekoa izan behar du gutxienez.')
    }else if (passwordValue.length > 18 ){
        setError(password, 'Pasahitza luzeegia da. 18 karaktere Max.');
    } else {
        setSuccess(password);
        passCheck = true;
    }

    if(password2Value === '') {
        setError(password2, 'Mesedez, baieztatu pasahitza.');
    } else if (password2Value !== passwordValue) {
        setError(password2, "Pasahitzak ez datoz bat.");
    } else {
        setSuccess(password2);
        pass2Check = true;
    }

    if(userCheck && emailCheck && passCheck && pass2Check){
        var url = "../../../controller/controller_register.php";
        var data = { 'user':usernameValue, 'email':emailValue, 'pass':passwordValue};
    
        fetch(url, {
          method: 'POST', // or 'POST'
          body: JSON.stringify(data), // data can be `string` or {object}!
          headers:{'Content-Type': 'application/json'}  //input data
          })
        .then(res => res.json()).then(result => {

            document.getElementById("msg").style.width = '80%';
            document.getElementById("msg").style.margin = 'auto';
            document.getElementById("msg").style.textAlign = 'center';
            document.getElementById("msg").style.display = 'block';

    
            if (result.value == null){

                document.getElementById("msg").style.color = 'green'; 
                document.getElementById("msg").innerHTML = "Erabiltzaile erregistratua";

                username.value = ""; email.value = ""; password.value = ""; password2.value = "";
            } else {
                
                document.getElementById("msg").style.color = 'red'; 
                document.getElementById("msg").innerHTML = result.value;  
            }
            
                   
        })
        .catch(error => console.error('Error status:', error));	
    }

};

function burbujas () {

    for (let i = 0; i < 50; i++) {
        document.querySelector('.burbujas').innerHTML += `<span style=--i:${Math.floor(Math.random() * 100)}></span>`;
    }
}
