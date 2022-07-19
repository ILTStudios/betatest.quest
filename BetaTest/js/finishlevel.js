const fill_input = document.querySelector('#answer');
const question = document.querySelector('.question');
const validation = document.querySelector('.validation');
const submitbtn = document.querySelector('.play-submit');

if(question.innerText == "Good Job, You Completed the Hunt. You're Done. For Now..."){
    fill_input.remove();
    validation.innerText = "Congratulation! You Completed the Hunt.";
}

//Close Play Btn
var count_down_date = new Date("August 8, 2022 23:59:59").getTime();
var x = setInterval(() => {
    var now = new Date().getTime();
    var difference = count_down_date - now;

    if (difference > 0){
        clearInterval(x);
        document.getElementById('countdown'.innerText = 'THE HUNT BEGINS');
    }else{
        fill_input.remove();
        document.querySelector('.answer').remove();
        validation.innerText = "The Hunt is Yet to Begin!";
        question.innerText = "Have Patience Hunters!";
        submitbtn.remove();
    }
}, 1000);