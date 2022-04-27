// password generation
const generateBtn = document.querySelector('#generate');
const generatedPass = document.querySelector('#password');

// validation 
const submitBtn = document.querySelector("#register");
const name = document.querySelector("#name");
const email = document.querySelector("#email");
const password = document.querySelector("#password");

const nameV = document.querySelector("#nameV");
const emailV = document.querySelector("#emailV");
const passwordV = document.querySelector("#passwordV");

// regex validation
const letters = /^[A-Za-z ]+$/;
const mail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

function validateForm (e){
	let valid = 0;

	if(letters.test(name.value) == false ){
		nameV.textContent = "Please enter a valid name";
		valid = 1;
	} else {
		nameV.textContent = "";
		valid = 0;
	}

	if(mail.test(email.value) == false ){
		emailV.textContent = "Please enter a valid email";
		valid = 1;
	} else {
		emailV.textContent = "";
		valid = 0;
	}

	if (password.value == ""){
		passwordV.textContent = "Please enter a valid password";
		valid = 1;
	} else {
		passwordV.textContent = "";
		valid = 0;
	}

	if(name.value == "" || email.value == ""){
		e.preventDefault();
	} 
	if(valid > 0){
		e.preventDefault();
	}
}


function generate (){
	let randomstring = Math.random().toString(36).slice(-1).toUpperCase() + Math.random().toString(36).substr(2, 10);
	generatedPass.value = randomstring;
}

generateBtn.addEventListener("click", generate);
submitBtn.addEventListener("click", validateForm);

