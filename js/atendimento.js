var obs = document.getElementById('obs');
var tentativas = document.getElementById('at_in_tentativas');
	
$( document ).ready(function() {   
    obs.readOnly = tentativas.value >= 1 ? false : true;

    if(tentativas.value >= 1){
        obs.readyOnly = false;
        //obs.required = true;
    }
});

