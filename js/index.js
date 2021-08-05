


// A function which calls the api to get the random word

function generateRandomWord() {

    var randomWordURL = "http://api.wordnik.com:80/v4/words.json/randomWords?hasDictionaryDef=true&minCorpusCount=0&minLength=5&maxLength=15&limit=2&api_key=5a81407b6bfb9ace9050c0f38f20015624af4ff24ad8bf521";

   

    // ajax request using GET method which calls the displayRandomWord() function to display the random word as callback

    $.ajax({

    	type: "GET",

        url: randomWordURL,

        dataType: "jsonp",

        jsonpCallback: 'displayRandomWord'

    });

}

            // A function to display the random word

function displayRandomWord(data) {

    document.getElementById("randomword0").innerHTML=data[0].word;
    document.getElementById("randomword1").innerHTML=data[1].word;

    animate();

}


//Animate text 

function animate(){

    $('.tlt').textillate({ 
    	in: { effect: 'swing', shuffle: true,},
    });

 }