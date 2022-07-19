var count_down_date = new Date("August 8, 2022 23:59:59").getTime();
var x = setInterval(() => {
    var now = new Date().getTime();
    var difference = count_down_date - now;

    var days = Math.floor(difference / (1000 * 60 * 60 * 24));
    var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((difference % (1000 * 60)) / 1000);

    document.getElementById('countdown').innerHTML = `${days}d : ${hours}h : ${minutes}m : ${seconds}s`;

    if (difference < 0 ){
        clearInterval(x);
        document.getElementById('countdown'.innerText = 'THE HUNT BEGINS')
    }
}, 1000);