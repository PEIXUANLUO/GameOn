

const mario = document.querySelector(".mario");
const pipe = document.querySelector(".pipe");


// 正確



const jump = () => {
    mario.classList.add("jump");

    setTimeout(() => {
        mario.classList.remove("jump");
    }, 500);
}



const loop = setInterval(() => {
    
    console.log("loop")

    const pipePosition = pipe.offsetLeft;
    const marioPosition = +window.getComputedStyle(mario).bottom.replace("px", "");



    if (pipePosition <= 180 && pipePosition > 0 && marioPosition < 110) {

        pipe.style.animation = "none";
        pipe.style.left = `${pipePosition}px`;

        mario.style.animation = "none";
        mario.style.bottom = `${marioPosition}px`;

        mario.src = "./img/game-over.png";
        mario.style.width = "120px"
        mario.style.marginLeft = "100px";

        clearInterval(loop);
    }

}, 10);

document.addEventListener("keydown", jump);




var timer;
var ele = document.getElementById("timer");

(function (){
    var sec = 1;
    timer = setInterval(() => {
        ele.innerHTML =  sec;
        sec ++;
    }, 1000)
})()

