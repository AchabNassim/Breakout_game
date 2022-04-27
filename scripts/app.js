const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');


let score = 0;
let lives = 3;
let paused = false;

const brickRowCount = 11;
const brickColumnCount = 6;

// creating elements
const ball = {
  x: canvas.width / 2,
  y: canvas.height / 2 + 30,
  size: 10,
  speed: 4,
  dx: 4,
  dy: -4
};

const brickInfo = {
  h: 23,
  w: 92,
  padding: 5,
  offsetX: 40,
  offsetY: 60,
  visible: 1
};

const paddle = {
  x: canvas.width / 2 - 70,
  y: canvas.height - 30,
  w: 140,
  h: 15,
  speed: 8,
  dx : 0
};

// creating the bricks
const bricks = [];
for (let i = 0; i < brickRowCount; i++) {
  bricks[i] = [];
  for (let j = 0; j < brickColumnCount; j++) {
    if (j >= brickColumnCount - 1){
    // if it's the last brick in the column it gets one extra life.
      brickInfo.visible = 2;
      const x = i * (brickInfo.w + brickInfo.padding) + brickInfo.offsetX;
      const y = j * (brickInfo.h + brickInfo.padding) + brickInfo.offsetY;
      bricks[i][j] = { x, y, ...brickInfo  };
    } else {
      // else it returns it to the default value(1 life).
      brickInfo.visible = 1;
      const x = i * (brickInfo.w + brickInfo.padding) + brickInfo.offsetX;
      const y = j * (brickInfo.h + brickInfo.padding) + brickInfo.offsetY;
      bricks[i][j] = { x, y, ...brickInfo };
    }
  }
}

// drawing the elements
function ballDraw(){
  ctx.beginPath();
  ctx.arc(ball.x , ball.y, ball.size, 0, Math.PI * 2);
  ctx.fillStyle = '#00b9be';
  ctx.shadowOffsetX = 1;
  ctx.shadowOffsetY = 1;
  ctx.shadowColor = '#9ff4e5';
  ctx.shadowBlur = 2;
  ctx.fill();
  ctx.closePath();
}

function paddleDraw(){
  ctx.beginPath();
  ctx.rect(paddle.x, paddle.y, paddle.w, paddle.h);
  ctx.fillStyle = 'rgba(0,43,89,0.9)';
  ctx.shadowOffsetX = 1.8;
  ctx.shadowOffsetY = 1.2;
  ctx.shadowColor = 'rgba(0,185,190,0.8)';
  ctx.shadowBlur = 2;
  ctx.fill();
  ctx.closePath();
}

function brickDraw(){
  bricks.forEach(column => {
    column.forEach(brick => {
      ctx.beginPath();
      ctx.rect(brick.x, brick.y, brick.w, brick.h);
      //** the color of the brick depends on it's visibility.
      ctx.fillStyle = colorCheck(brick);
      //**
      ctx.fill();
      ctx.closePath();
    })
  })
}

function drawScore(){
  ctx.shadowColor = 'transparent';
  ctx.fillStyle = '#005f8c'
  ctx.font = '22px monospace';
  ctx.fillText(`score: ${score}`, canvas.width - 115, 25);
}

function drawLives(){
  ctx.fillStyle = '#005f8c';
  ctx.shadowColor = 'transparent';
  ctx.font = '22px monospace';
  ctx.fillText(`lives: ${lives}`, canvas.width - 115, 45);
}

// returns a color depending on the state of the brick.
function colorCheck(brick){
  if (brick.visible > 1){
    return '#005f8c';
  } else if (brick.visible == 1){
    return 'rgba(0,95,140,0.6)';
  } else {
    return 'transparent'
  }
}


// moving the objects
function movePaddle(){
  paddle.x += paddle.dx;

  if (paddle.x + paddle.w > canvas.width){
    paddle.x = canvas.width - paddle.w;
  }

  if (paddle.x < 0){
    paddle.x = 0;
  }
}

// move the ball
function moveBall (){
  ball.x += ball.dx;
  ball.y += ball.dy;

  // wall collision (left/right)
  if (ball.x + ball.size > canvas.width || ball.x - ball.size < 0){
    ball.dx *= -1;
  } 

  // wall collision (top/bottom)
  if (ball.y + ball.size > canvas.height || ball.y - ball.size < 0){
    ball.dy *= -1;
  }
  
  // paddle collision
  if (
    ball.x - ball.size > paddle.x &&
    ball.x + ball.size < paddle.x + paddle.w && 
    ball.y + ball.size > paddle.y
  ) {
    ball.dy = -ball.speed;
  }

  // brick collision 
  bricks.forEach(column => {
    column.forEach(brick => {
      if (brick.visible) {
        if (
          ball.x - ball.size > brick.x && // left brick side check
          ball.x + ball.size < brick.x + brick.w && // right brick side check
          ball.y + ball.size > brick.y && // top brick side check
          ball.y - ball.size < brick.y + brick.h // bottom brick side check
        ) {
          ball.dy *= -1;
          brick.visible--;
          score++;
        }
      }
    });
  });

}

// draw and animate everything

function draw (){
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  ballDraw();
  paddleDraw();
  brickDraw();
  drawScore();
  drawLives();
}

function update (){
  if (!paused){
    movePaddle();
    moveBall();
    draw();
    // console.log("working");
  }  
  requestAnimationFrame(update);
}

update();

// move the paddle

function keyDown(e){
  if (e.key === 'Right' || e.key === 'ArrowRight'){
    paddle.dx = paddle.speed;
  } else if (e.key === 'Left' || e.key === 'ArrowLeft'){
    paddle.dx = -paddle.speed;
  }
}

function keyUp(e){
  if (e.key === 'Right' || e.key === 'ArrowRight'){
    paddle.dx = 0;
  } else if (e.key === 'Left' || e.key === 'ArrowLeft'){
    paddle.dx = 0;
  }
}

// pause the game 

function togglePause (){
  paused = !paused;
}

function pauseGame(e){
  var keycode = e.keyCode;
  if(keycode === 80 || keycode === 27 || keycode === 32){
    togglePause();
  }
}


// keyboard events handlers

document.addEventListener('keydown', keyDown);
document.addEventListener('keyup', keyUp);
document.addEventListener('keydown', pauseGame);














