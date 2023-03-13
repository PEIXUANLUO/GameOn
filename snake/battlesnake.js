
//設定外框
var BLOCK_SIZE = 20
var BLOCK_COUNT = 20

//設定畫布更新
var gameInterval

//玩家、玩家2元素
var snack
var snack2
var apple
var apple2
var score
var score2
var shit
var shit2
var newshit
var newshit2
var newshitInterval
var newshitInterval2
var shitInterval

//遊戲初始先執行的方法
function gameStart() {
    snack = {
        body: [
            { x: BLOCK_COUNT / 2, y: BLOCK_SIZE / 2 }
        ],
        size: 5,
        direction: { x: 0, y: -1 }
    }

    snack2 = {
        body: [
            { x: BLOCK_COUNT / 2, y: BLOCK_SIZE / 2 }
        ],
        size: 5,
        direction: { x: 0, y: -1 }
    }

    putApple()
    putshit()
    putNewshit()
    putNewshit2()
    updateScore(0)
    updateScore2(0)

    gameInterval = setInterval(gameRoutine, 250)
    shitInterval = setInterval(putshit, 3500)
    newshitInterval = setInterval(putNewshit, 2500)
    newshitInterval2 = setInterval(putNewshit2, 2500)
    console.log(lock)

}

//更新分數
function updateScore(newScore) {
    score = newScore
    document.getElementById("score_id").innerHTML = score
    lock = false;
}
function updateScore2(newScore2) {
    score2 = newScore2
    document.getElementById("score_id2").innerHTML = score2
    lock = false;
}

//更新蘋果
function putApple() {
    apple = {
        x: Math.floor(Math.random() * BLOCK_COUNT),
        y: Math.floor(Math.random() * BLOCK_COUNT)
    }
    apple2 = {
        x: Math.floor(Math.random() * BLOCK_COUNT),
        y: Math.floor(Math.random() * BLOCK_COUNT)
    }

    // 蘋果長在蛇身上的話，重新給蘋果。
    for (var i = 0; i < snack.body.length; i++) {
        if (snack.body[i].x === apple.x &&
            snack.body[i].y === apple.y) {
            putApple()
            break
        }
    }
    for (var i = 0; i < snack2.body.length; i++) {
        if (snack2.body[i].x === apple2.x &&
            snack2.body[i].y === apple2.y) {
            putApple()
            break
        }
    }
}

//更新毒蘋果
function putshit() {
    shit = {
        x: Math.floor(Math.random() * BLOCK_COUNT),
        y: Math.floor(Math.random() * BLOCK_COUNT)
    }
    shit2 = {
        x: Math.floor(Math.random() * BLOCK_COUNT),
        y: Math.floor(Math.random() * BLOCK_COUNT)
    }



    // 毒蘋果長在蛇身上的話，重新給蘋果。
    for (var i = 0; i < snack.body.length; i++) {
        if (snack.body[i].x === shit.x &&
            snack.body[i].y === shit.y) {
            putshit()
            break
        }

    }
    for (var i = 0; i < snack2.body.length; i++) {
        if (snack2.body[i].x === shit2.x &&
            snack2.body[i].y === shit2.y) {
            putshit()
            break
        }
    }
}

//當吃掉蘋果時...
function eatApple() {
    snack.size += 1
    putApple()
    putNewshit2()
    updateScore(score + 1)
}
function eatApple2() {
    snack2.size += 1
    putApple()
    putNewshit()
    updateScore2(score2 + 1)
}

//當吃掉毒蘋果時...
function eatshit() {
    ggler()
    return
}


function gameRoutine() {
    moveSnack()
    //玩家1狀態判定
    //死亡
    if (snackIsDead()) {
        ggler()
        return
    }
    //吃到蘋果
    if (snack.body[0].x === apple.x &&
        snack.body[0].y === apple.y) {
        eatApple()
        putshit()
        if (score > score2) {
            putNewshit2()
        }
        if (score < score2) {
            putNewshit()
        }

    }
    //吃到毒蘋果
    if (snack.body[0].x === shit.x &&
        snack.body[0].y === shit.y) {
        eatshit()
    }

    //玩家2狀態判定
    if (snack2IsDead()) {
        ggler()
        return
    }

    if (snack2.body[0].x === apple2.x &&
        snack2.body[0].y === apple2.y) {
        eatApple2()
        if (score > score2) {
            putNewshit2()
        }
        if (score < score2) {
            putNewshit()
        }
        putshit()
    }
    if (snack2.body[0].x === shit2.x &&
        snack2.body[0].y === shit2.y) {
        eatshit()
    }

    updateCanvas()
}

//分差數增加毒蘋果未寫完================================================================================================
function putNewshit() {

    newshit = {
        x: Math.floor(Math.random() * BLOCK_COUNT),
        y: Math.floor(Math.random() * BLOCK_COUNT)
    }
    for (var i = 0; i < snack.body.length; i++) {
        if (snack.body[i].x === newshit.x &&
            snack.body[i].y === newshit.y) {
            putNewshit()
            break
        }
    }
}
function putNewshit2() {

    //test
    // for (var i = 0; i <= score2 - score1; i++) {

    //     newshit`${i + 1}` = {
    //         x: Math.floor(Math.random() * BLOCK_COUNT),
    //         y: Math.floor(Math.random() * BLOCK_COUNT)
    //     }
    // }



    newshit2 = {
        x: Math.floor(Math.random() * BLOCK_COUNT),
        y: Math.floor(Math.random() * BLOCK_COUNT)
    }
    for (var i = 0; i < snack2.body.length; i++) {
        if (snack2.body[i].x === newshit2.x &&
            snack2.body[i].y === newshit2.y) {
            putNewshit2()
            break
        }
    }
}
//分差數增加毒蘋果未寫完================================================================================================


//蛇死亡判定
function snackIsDead() {

    //hit head
    if (snack.body[0].x < 0) {
        return true
    } else if (snack.body[0].x >= BLOCK_COUNT) {
        return true
    } else if (snack.body[0].y < 0) {
        return true
    } else if (snack.body[0].y >= BLOCK_COUNT) {
        return true
    }

    //hit body
    for (var i = 1; i < snack.body.length; i++) {
        if (snack.body[0].x === snack.body[i].x &&
            snack.body[0].y === snack.body[i].y) {
            return true
        }
    }

    return false
}


function snack2IsDead() {

    //hit head
    if (snack2.body[0].x < 0) {
        return true
    } else if (snack2.body[0].x >= BLOCK_COUNT) {
        return true
    } else if (snack2.body[0].y < 0) {
        return true

    } else if (snack2.body[0].y >= BLOCK_COUNT) {
        return true
    }


    //hit body
    for (var i = 1; i < snack.body.length; i++) {
        if (snack2.body[0].x === snack.body[i].x &&
            snack2.body[0].y === snack.body[i].y) {
            return true
        }
    }

    return false
}

//蛇死亡停止更新畫面
function ggler() {
    clearInterval(gameInterval)
    console.log("正常死亡")
}

//蛇的移動
function moveSnack() {
    var newBlock = {
        x: snack.body[0].x + snack.direction.x,
        y: snack.body[0].y + snack.direction.y,
    }

    snack.body.unshift(newBlock)

    while (snack.body.length > snack.size) {
        snack.body.pop()
    }

    var newBlock2 = {
        x: snack2.body[0].x + snack2.direction.x,
        y: snack2.body[0].y + snack2.direction.y,
    }

    snack2.body.unshift(newBlock2)

    while (snack2.body.length > snack2.size) {
        snack2.body.pop()
    }
}

//畫布元素設定============================================================================================================
function updateCanvas() {
    var canvas = document.getElementById("canvas_id")
    var canvas2 = document.getElementById("canvas_id2")
    var context = canvas.getContext("2d")
    var context2 = canvas2.getContext("2d")

    context.fillStyle = "black"
    context2.fillStyle = "black"
    context.fillRect(0, 0, canvas.width, canvas.height)
    context2.fillRect(0, 0, canvas2.width, canvas2.height)



    if (lock == false) {
        //若玩家1領先時...
        if (score > score2) {
            context2.fillStyle = "violet"
            context2.fillRect(
                newshit2.x * BLOCK_SIZE + 1,
                newshit2.y * BLOCK_SIZE + 1,
                BLOCK_SIZE - 1,
                BLOCK_SIZE - 1,
            )

        }
        //若玩家2領先時...
        if (score < score2) {
            context.fillStyle = "violet"
            context.fillRect(
                newshit.x * BLOCK_SIZE + 1,
                newshit.y * BLOCK_SIZE + 1,
                BLOCK_SIZE - 1,
                BLOCK_SIZE - 1,
            )
        }
    }




    //玩家1的蛇
    context.fillStyle = "lime"
    for (var i = 0; i < snack.body.length; i++) {
        context.fillRect(
            snack.body[i].x * BLOCK_SIZE,
            snack.body[i].y * BLOCK_SIZE,
            BLOCK_SIZE - 1,
            BLOCK_SIZE - 1
        )
    }

    context.fillStyle = "red"
    context.fillRect(
        apple.x * BLOCK_SIZE + 1,
        apple.y * BLOCK_SIZE + 1,
        BLOCK_SIZE - 1,
        BLOCK_SIZE - 1,
    )


    context.fillStyle = "violet"
    context.fillRect(
        shit.x * BLOCK_SIZE + 1,
        shit.y * BLOCK_SIZE + 1,
        BLOCK_SIZE - 1,
        BLOCK_SIZE - 1,
    )

    //玩家2的蛇
    context2.fillStyle = "lime"
    for (var i = 0; i < snack2.body.length; i++) {
        context2.fillRect(
            snack2.body[i].x * BLOCK_SIZE,
            snack2.body[i].y * BLOCK_SIZE,
            BLOCK_SIZE - 1,
            BLOCK_SIZE - 1
        )
    }
    context2.fillStyle = "red"
    context2.fillRect(
        apple2.x * BLOCK_SIZE + 1,
        apple2.y * BLOCK_SIZE + 1,
        BLOCK_SIZE - 1,
        BLOCK_SIZE - 1,
    )
    context2.fillStyle = "violet"
    context2.fillRect(
        shit2.x * BLOCK_SIZE + 1,
        shit2.y * BLOCK_SIZE + 1,
        BLOCK_SIZE - 1,
        BLOCK_SIZE - 1,
    )




}

//整個網頁載入時執行開始監聽鍵盤按鈕
window.onload = onPageLoaded

function onPageLoaded() {
    document.addEventListener("keydown", handleKeyDown)
    document.addEventListener("keydown", handleKeyDown2)
    document.addEventListener("keydown", handleKeyDown3)
}



//控制玩家1 上下左右
var up = document.getElementById("8")
var right = document.getElementById("4")
var down = document.getElementById("5")
var left = document.getElementById("6")
up.addEventListener("click", playerup)
right.addEventListener("click", playerright)
down.addEventListener("click", playerdown)
left.addEventListener("click", playerleft)
function playerup() {
    if (snack.direction.x === 0 && snack.direction.y === 1) {
        snack.direction.x = 0
        snack.direction.y = 1
    }
    else {
        snack.direction.x = 0
        snack.direction.y = -1

        up.classList.add("change");

        setTimeout(() => {
            up.classList.remove("change");
        }, 300);

    }
}
function playerright() {
    if (snack.direction.x === 1 && snack.direction.y === 0) {
        snack.direction.x = 1
        snack.direction.y = 0
    }
    else {
        snack.direction.x = -1
        snack.direction.y = 0


        right.classList.add("change");

        setTimeout(() => {
            right.classList.remove("change");
        }, 300);

    }
}
function playerdown() {
    if (snack.direction.x === 0 && snack.direction.y === -1) {
        snack.direction.x = 0
        snack.direction.y = -1
    }
    else {
        snack.direction.x = 0
        snack.direction.y = 1


        down.classList.add("change");

        setTimeout(() => {
            down.classList.remove("change");
        }, 300);


    }
}
function playerleft() {
    if (snack.direction.x === -1 && snack.direction.y === 0) {
        snack.direction.x = -1
        snack.direction.y = 0
    }
    else {
        snack.direction.x = 1
        snack.direction.y = 0

        left.classList.add("change");

        setTimeout(() => {
            left.classList.remove("change");
        }, 300);
    }
}
function handleKeyDown(event) {

    //往左
    if (event.keyCode === 37) {
        if (snack.direction.x === 1 && snack.direction.y === 0) {
            snack.direction.x = 1
            snack.direction.y = 0
        }
        else {
            snack.direction.x = -1
            snack.direction.y = 0


            right.classList.add("change");

            setTimeout(() => {
                right.classList.remove("change");
            }, 300);

        }

        //往右
    } else if (event.keyCode === 39) {
        if (snack.direction.x === -1 && snack.direction.y === 0) {
            snack.direction.x = -1
            snack.direction.y = 0
        }
        else {
            snack.direction.x = 1
            snack.direction.y = 0

            left.classList.add("change");

            setTimeout(() => {
                left.classList.remove("change");
            }, 300);

        }
        //往上
    } else if (event.keyCode === 38) {
        if (snack.direction.x === 0 && snack.direction.y === 1) {
            snack.direction.x = 0
            snack.direction.y = 1
        }
        else {
            snack.direction.x = 0
            snack.direction.y = -1

            up.classList.add("change");

            setTimeout(() => {
                up.classList.remove("change");
            }, 300);


        }
        //往下    
    } else if (event.keyCode === 40) {

        if (snack.direction.x === 0 && snack.direction.y === -1) {
            snack.direction.x = 0
            snack.direction.y = -1
        }
        else {
            snack.direction.x = 0
            snack.direction.y = 1


            down.classList.add("change");

            setTimeout(() => {
                down.classList.remove("change");
            }, 300);



        }

    }
}

// 控制玩家2 wasd

var up2 = document.getElementById("w")
var right2 = document.getElementById("a")
var down2 = document.getElementById("s")
var left2 = document.getElementById("d")
up2.addEventListener("click", playerup2)
right2.addEventListener("click", playerright2)
down2.addEventListener("click", playerdown2)
left2.addEventListener("click", playerleft2)
function playerup2() {
    if (snack2.direction.x === 0 && snack2.direction.y === 1) {
        snack2.direction.x = 0
        snack2.direction.y = 1
    }
    else {
        snack2.direction.x = 0
        snack2.direction.y = -1

        up2.classList.add("change");

        setTimeout(() => {
            up2.classList.remove("change");
        }, 300);
    }
}
function playerright2() {
    if (snack2.direction.x === 1 && snack2.direction.y === 0) {
        snack2.direction.x = 1
        snack2.direction.y = 0
    }
    else {
        snack2.direction.x = -1
        snack2.direction.y = 0

        right2.classList.add("change");

        setTimeout(() => {
            right2.classList.remove("change");
        }, 300);

    }
}
function playerdown2() {
    if (snack2.direction.x === 0 && snack2.direction.y === -1) {
        snack2.direction.x = 0
        snack2.direction.y = -1
    }
    else {
        snack2.direction.x = 0
        snack2.direction.y = 1


        down2.classList.add("change");

        setTimeout(() => {
            down2.classList.remove("change");
        }, 300);
    }


}
function playerleft2() {
    if (snack2.direction.x === -1 && snack2.direction.y === 0) {
        snack2.direction.x = -1
        snack2.direction.y = 0
    }
    else {
        snack2.direction.x = 1
        snack2.direction.y = 0

        left2.classList.add("change");

        setTimeout(() => {
            left2.classList.remove("change");
        }, 300);
    }

}
function handleKeyDown2(event2) {

    //往左
    if (event2.keyCode == 65) {
        if (snack2.direction.x === 1 && snack2.direction.y === 0) {
            snack2.direction.x = 1
            snack2.direction.y = 0
        }
        else {
            snack2.direction.x = -1
            snack2.direction.y = 0

            right2.classList.add("change");

            setTimeout(() => {
                right2.classList.remove("change");
            }, 300);

        }
    }
    //往上}

    else if (event2.keyCode == 87) {
        if (snack2.direction.x === 0 && snack2.direction.y === 1) {
            snack2.direction.x = 0
            snack2.direction.y = 1
        }
        else {
            snack2.direction.x = 0
            snack2.direction.y = -1

            up2.classList.add("change");

            setTimeout(() => {
                up2.classList.remove("change");
            }, 300);
        }

        //往右
    } else if (event2.keyCode == 68) {
        if (snack2.direction.x === -1 && snack2.direction.y === 0) {
            snack2.direction.x = -1
            snack2.direction.y = 0
        }
        else {
            snack2.direction.x = 1
            snack2.direction.y = 0

            left2.classList.add("change");

            setTimeout(() => {
                left2.classList.remove("change");
            }, 300);
        }


        //往下
    } else if (event2.keyCode == 83) {

        if (snack2.direction.x === 0 && snack2.direction.y === -1) {
            snack2.direction.x = 0
            snack2.direction.y = -1
        }
        else {
            snack2.direction.x = 0
            snack2.direction.y = 1


            down2.classList.add("change");

            setTimeout(() => {
                down2.classList.remove("change");
            }, 300);
        }

    }
}

//同時控制兩個玩家===================================================================================================================
function handleKeyDown3(event) {

    //往左
    if (event.keyCode === 100) {
        if (snack.direction.x === 1 && snack.direction.y === 0) {
            snack.direction.x = 1
            snack.direction.y = 0
        }
        else {
            snack.direction.x = -1
            snack.direction.y = 0


            right.classList.add("change");

            setTimeout(() => {
                right.classList.remove("change");
            }, 300);
            right2.classList.add("change");

            setTimeout(() => {
                right2.classList.remove("change");
            }, 300);
            //正式完成可註解===================================
            snack2.direction.x = -1
            snack2.direction.y = 0
        }

        //往右
    } else if (event.keyCode === 102) {
        if (snack.direction.x === -1 && snack.direction.y === 0) {
            snack.direction.x = -1
            snack.direction.y = 0
        }
        else {
            snack.direction.x = 1
            snack.direction.y = 0

            left.classList.add("change");

            setTimeout(() => {
                left.classList.remove("change");
            }, 300);
            left2.classList.add("change");

            setTimeout(() => {
                left2.classList.remove("change");
            }, 300);

            //正式完成可註解==================================
            snack2.direction.x = 1
            snack2.direction.y = 0
        }
        //往上
    } else if (event.keyCode === 104) {
        if (snack.direction.x === 0 && snack.direction.y === 1) {
            snack.direction.x = 0
            snack.direction.y = 1
        }
        else {
            snack.direction.x = 0
            snack.direction.y = -1

            up.classList.add("change");

            setTimeout(() => {
                up.classList.remove("change");
            }, 300);
            up2.classList.add("change");

            setTimeout(() => {
                up2.classList.remove("change");
            }, 300);

            //正式完成可註解==================================
            snack2.direction.x = 0
            snack2.direction.y = -1
        }
        //往下
    } else if (event.keyCode === 101) {

        if (snack.direction.x === 0 && snack.direction.y === -1) {
            snack.direction.x = 0
            snack.direction.y = -1
        }
        else {
            snack.direction.x = 0
            snack.direction.y = 1


            down.classList.add("change");

            setTimeout(() => {
                down.classList.remove("change");
            }, 300);
            down2.classList.add("change");

            setTimeout(() => {
                down2.classList.remove("change");
            }, 300);

            //正式完成可註解==================================
            snack2.direction.x = 0
            snack2.direction.y = 1

        }

    }
}
