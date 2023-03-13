// var BLOCK_SIZE = 30
// var BLOCK_COUNT = 30

// var gameInterval
// var snack
// var apple
// var score
// var shit
// var shitInterval


// function gameStart() {
//     snack = {
//         body: [
//             { x: BLOCK_COUNT / 2, y: BLOCK_SIZE / 2 }
//         ],
//         size: 5,
//         direction: { x: 0, y: -1 }
//     }

//     putApple()
//     putshit()
//     updateScore(0)
//     gameInterval = setInterval(gameRoutine, 250)
//     shitInterval = setInterval(putshit, 2500)

// }

// function updateScore(newScore) {
//     score = newScore
//     document.getElementById("score_id").innerHTML = score
// }

// function putApple() {
//     apple = {
//         x: Math.floor(Math.random() * BLOCK_COUNT),
//         y: Math.floor(Math.random() * BLOCK_COUNT)
//     }

//     // 蘋果長在蛇身上的話，重新給蘋果。
//     for (var i = 0; i < snack.body.length; i++) {
//         if (snack.body[i].x === apple.x &&
//             snack.body[i].y === apple.y) {
//             putApple()
//             break
//         }
//     }

// }

// function putshit() {
//     shit = {
//         x: Math.floor(Math.random() * BLOCK_COUNT),
//         y: Math.floor(Math.random() * BLOCK_COUNT)
//     }

//     // 蘋果長在蛇身上的話，重新給蘋果。
//     for (var i = 0; i < snack.body.length; i++) {
//         if (snack.body[i].x === shit.x &&
//             snack.body[i].y === shit.y) {
//             putshit()
//             break
//         }
//     }

// }

// function eatApple() {
//     snack.size += 1
//     putApple()
//     updateScore(score + 1)
// } function eatshit() {
//     ggler()
//     return
// }








// function gameRoutine() {
//     moveSnack()

//     if (snackIsDead()) {
//         ggler()
//         return
//     }

//     if (snack.body[0].x === apple.x &&
//         snack.body[0].y === apple.y) {
//         eatApple()
//         putshit()
//     }
//     if (snack.body[0].x === shit.x &&
//         snack.body[0].y === shit.y) {
//         eatshit()
//     }







//     updateCanvas()
// }




// function snackIsDead() {

//     //hit head
//     if (snack.body[0].x < 0) {
//         return ture
//     } else if (snack.body[0].x >= BLOCK_COUNT) {
//         return ture
//     } else if (snack.body[0].y < 0) {
//         return ture
//     } else if (snack.body[0].y >= BLOCK_COUNT) {
//         return ture
//     }

//     //hit body
//     for (var i = 1; i < snack.body.length; i++) {
//         if (snack.body[0].x === snack.body[i].x &&
//             snack.body[0].y === snack.body[i].y) {
//             return true
//         }
//     }

//     return false
// }

// function ggler() {
//     clearInterval(gameInterval)
// }


// function moveSnack() {
//     var newBlock = {
//         x: snack.body[0].x + snack.direction.x,
//         y: snack.body[0].y + snack.direction.y,
//     }

//     snack.body.unshift(newBlock)

//     while (snack.body.length > snack.size) {
//         snack.body.pop()
//     }
// }


// function updateCanvas() {
//     var canvas = document.getElementById("canvas_id")
//     var context = canvas.getContext("2d")

//     context.fillStyle = "black"
//     context.fillRect(0, 0, canvas.width, canvas.height)
    

//     context.fillStyle = "lime";
//     context.fillRect
//     for (var i = 0; i < snack.body.length; i++) {
//         context.fillRect(
//             snack.body[i].x * BLOCK_SIZE,
//             snack.body[i].y * BLOCK_SIZE,
//             BLOCK_SIZE - 1,
//             BLOCK_SIZE - 1
//         )
//     }

//     context.fillStyle = "red"
//     context.fillRect(
//         apple.x * BLOCK_SIZE + 1,
//         apple.y * BLOCK_SIZE + 1,
//         BLOCK_SIZE - 1,
//         BLOCK_SIZE - 1,
//     )


//     context.fillStyle = "violet"
//     context.fillRect(
//         shit.x * BLOCK_SIZE + 1,
//         shit.y * BLOCK_SIZE + 1,
//         BLOCK_SIZE - 1,
//         BLOCK_SIZE - 1,
//     )



// }


// window.onload = onPageLoaded

// function onPageLoaded() {
//     document.addEventListener("keydown", handleKeyDown)
// }

// function handleKeyDown(event) {

//     var originX = snack.direction.x
//     var originY = snack.direction.y
//     //往左
//     if (event.keyCode === 37) {
//         if (snack.direction.x === 1 && snack.direction.y === 0) {
//             snack.direction.x = 1
//             snack.direction.y = 0
//         }
//         else {
//             snack.direction.x = -1
//             snack.direction.y = 0
//         }

//         //往右
//     } else if (event.keyCode === 39) {
//         if (snack.direction.x === -1 && snack.direction.y === 0) {
//             snack.direction.x = -1
//             snack.direction.y = 0
//         }
//         else {
//             snack.direction.x = 1
//             snack.direction.y = 0
//         }
//         //往上
//     } else if (event.keyCode === 38) {
//         if (snack.direction.x === 0 && snack.direction.y === 1) {
//             snack.direction.x = 0
//             snack.direction.y = 1
//         }
//         else {
//             snack.direction.x = 0
//             snack.direction.y = -1
//         }
//         //往下    
//     } else if (event.keyCode === 40) {

//         if (snack.direction.x === 0 && snack.direction.y === -1) {
//             snack.direction.x = 0
//             snack.direction.y = -1
//         }
//         else {
//             snack.direction.x = 0
//             snack.direction.y = 1
//         }

//     }

// }




var BLOCK_SIZE = 24
var BLOCK_COUNT = 24

var gameInterval
var snack
var apple
var score
var level

function gameStart() {
    snack = {
        body: [
            { x: BLOCK_COUNT / 2, y: BLOCK_COUNT / 2 }
        ],
        size: 5,
        direction: { x: 0, y: -1 }
    }

    putApple()
    updateScore(0)
    updateGameLevel(1)
}

function updateGameLevel(newLevel) {
    level = newLevel

    if (gameInterval) {
        clearInterval(gameInterval)
    }
    gameInterval = setInterval(gameRoutine, 1000 / (10 + level))
}

function updateScore(newScore) {
    score = newScore
    document.getElementById('score_id').innerHTML = score
}

function putApple() {
    apple = {
        x: Math.floor(Math.random() * BLOCK_COUNT),
        y: Math.floor(Math.random() * BLOCK_COUNT)
    }

    for (var i = 0; i < snack.body.length; i++) {
        if (snack.body[i].x === apple.x &&
            snack.body[i].y === apple.y) {
            putApple();
            break
        }
    }
}

function eatApple() {
    snack.size += 1
    putApple()
    updateScore(score + 1)
}



function gameRoutine() {
    moveSnack()

    if (snackIsDead()) {
        ggler()
        return
    }

    if (snack.body[0].x === apple.x &&
        snack.body[0].y === apple.y) {
        eatApple()
    }

    updateCanvas()
}

function snackIsDead() {
    // hit walls
    if (snack.body[0].x < 0) {
        return true
    } else if (snack.body[0].x >= BLOCK_COUNT) {
        return true
    } else if (snack.body[0].y < 0) {
        return true
    } else if (snack.body[0].y >= BLOCK_COUNT) {
        return true
    }

    // hit body
    for (var i = 1; i < snack.body.length; i++) {
        if (snack.body[0].x === snack.body[i].x &&
            snack.body[0].y === snack.body[i].y) {
            return true
        }
    }

    return false
}

function ggler() {
    clearInterval(gameInterval)
}

function moveSnack() {
    var newBlock = {
        x: snack.body[0].x + snack.direction.x,
        y: snack.body[0].y + snack.direction.y
    }

    snack.body.unshift(newBlock)

    while (snack.body.length > snack.size) {
        snack.body.pop()
    }
}

function updateCanvas() {
    var canvas = document.getElementById('canvas_id')
    var context = canvas.getContext('2d')

    context.fillStyle = 'black'
    context.fillRect(0, 0, canvas.width, canvas.height)

    context.fillStyle = 'lime'
    for (var i = 0; i < snack.body.length; i++) {
        context.fillRect(
            snack.body[i].x * BLOCK_SIZE + 1,
            snack.body[i].y * BLOCK_SIZE + 1,
            BLOCK_SIZE - 1,
            BLOCK_SIZE - 1
        )
    }

    context.fillStyle = 'red'
    context.fillRect(
        apple.x * BLOCK_SIZE + 1,
        apple.y * BLOCK_SIZE + 1,
        BLOCK_SIZE - 1,
        BLOCK_SIZE - 1
    )
}

window.onload = onPageLoaded

function onPageLoaded() {
    document.addEventListener('keydown', handleKeyDown)
}








function handleKeyDown(event) {
    var originX = snack.direction.x
    var originY = snack.direction.y

    if (event.keyCode === 37) { // left arrow
        snack.direction.x = originY
        snack.direction.y = -originX
    } else if (event.keyCode === 39) { // right arrow
        snack.direction.x = -originY
        snack.direction.y = originX
    }
}
