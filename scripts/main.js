const noSuggestion = document.getElementById("noSuggestion");
const invalidScore = document.getElementById("invalidScore");
const noScore = document.getElementById("noScore");
const loggedOut = document.getElementById("loggedOut");

let validScore = true;
let validLog = true;


noSuggestion.addEventListener("click", function (){
	validScore = !validScore;
	if(!validScore){
		invalidScore.textContent = "minimum score of 10 required";
	} else {
		invalidScore.textContent = "";
	}
})

noScore.addEventListener("click", function (){
	validLog = !validLog;
	if(!validLog){
		loggedOut.textContent = "Please login to see the score";
	} else {
		loggedOut.textContent = "";
	}
})
