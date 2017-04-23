var documentWidth = window.innerWidth,
    documentHeight = window.innerHeight,
    gameOver = false,
    score = 0,
    canvas = $("#gameCanvas").get(0),
    context = canvas.getContext("2d");
    context.canvas.width = documentWidth-10;
    context.canvas.height = documentHeight-10;
    canvasWidth = context.canvas.width;
    canvasHeight = context.canvas.height;

var Color = {
    black: "#000",
    green: "#C3FF68"
};

function clamp(num, min, max) {
    return Math.min(Math.max(num, min), max);
}

var player = {

    x: documentWidth/2-60,
    y: documentHeight-60,
    width: 60,
    height: 60
};

player.explode = function() {
    this.active = false;
    gameOver = true;
};

player.draw = function() {
    $("#player").css({
        position: "absolute",
        top: player.y,
        left: player.x,
        width: player.width,
        height: player.height
    });
};

player.shoot = function() {

    var bulletPosition = this.midpoint();

    player.bullets.push(Bullet({
        speed: 5,
        x: bulletPosition.x,
        y: bulletPosition.y
    }));

};

player.midpoint = function() {
    return {
        x: this.x + this.width/2,
        y: this.y + this.height/2
    };
};

player.bullets = [];


function Bullet(I) {
    I.active = true;
    I.xVelocity = 0;
    I.yVelocity = -I.speed;
    I.width = 3;
    I.height = 3;
    I.color = Color.green;

    I.inBounds = function() {
        return I.x >= 0 && I.x <= canvasWidth &&
            I.y >= 0 && I.y <= canvasHeight;
    };

    I.draw = function() {
        context.fillStyle = this.color;
        context.fillRect(this.x, this.y, this.width, this.height);
    };

    I.update = function() {
        I.x += I.xVelocity;
        I.y += I.yVelocity;

        I.active = I.active && I.inBounds();
    };

    I.explode = function() {
        this.active = false;
    };

    return I;
}

enemies = [];

function Enemy(I) {
    I = I || {};

    I.image = $("#enemy").get(0);
    I.active = true;
    I.age = Math.floor(Math.random() * 128);
    I.color = "#A2B";

    I.x = documentWidth / 4 + Math.random() * documentHeight / 2;
    // I.x = Math.floor(Math.random()*(documentWidth-(documentWidth/4))+200);
    I.y = 0;
    I.xVelocity = 0;
    I.yVelocity = 2;

    I.width = 32;
    I.height = 32;

    I.inBounds = function() {
        return I.x >= 0 && I.x <= canvasWidth &&
            I.y >= 0 && I.y <= canvasHeight-60;
    };

    I.draw = function() {
        context.drawImage(I.image,I.x,I.y,I.width,I.height);
    };

    I.update = function() {
        if(score>=100 && score <200)
            I.yVelocity=3;
        if(score>=200 && score <300)
            I.yVelocity=4;
        if(score>=300 && score <400)
            I.yVelocity=5;
        I.x += I.xVelocity;
        I.y += I.yVelocity;

        I.xVelocity = 3 * Math.sin(I.age * Math.PI / 64);

        I.age++;

        I.active = I.active && I.inBounds();
    };

    I.explode = function() {
        if(gameOver)
            this.active = false;
        else
            this.active = false;
            score += 1;
    };

    return I;
}

function update() {

    if(keydown.space) {

        player.shoot();
    }

    if(keydown.left) {

        player.x -= 5;
    }

    if(keydown.right) {
        player.x += 5;
    }

    player.x = clamp(player.x, 0, canvasWidth - player.width);

    player.bullets.forEach(function(bullet) {
        bullet.update();
    });

    player.bullets = player.bullets.filter(function(bullet) {
        return bullet.active;
    });

    enemies.forEach(function(enemy) {
        enemy.update();
        if(!(enemy.inBounds()))
            score -=1;
    });


    enemies = enemies.filter(function(enemy) {
        return enemy.active;
    });



    handleCollisions();

    if(Math.random() < 0.1) {
        enemies.push(Enemy());
    }

}

function draw() {

    context.clearRect(0, 0, canvasWidth, canvasHeight);
    player.draw();

    player.bullets.forEach(function(bullet) {

        bullet.draw();

    });

    enemies.forEach(function(enemy) {

        enemy.draw();
    });


    context.fillStyle = Color.green;
    context.textAlign = 'left';
    context.font = "14pt Audiowide";
    context.fillText(score, 30, 80);


}

function collides(a, b) {
    return a.x < b.x + b.width &&
        a.x + a.width > b.x &&
        a.y < b.y + b.height &&
        a.y + a.height > b.y;
}

function handleCollisions() {
    player.bullets.forEach(function(bullet) {
        enemies.forEach(function(enemy) {
            if(collides(bullet, enemy)) {
                bullet.explode();
                enemy.explode();
            }
        });
    });

    enemies.forEach(function(enemy) {
        if(collides(enemy, player)) {
            enemy.explode();
            player.explode();
        }
    });
}

function gameLoop() {

    update();

    draw();

        if (gameOver) {
            context.fillStyle = Color.green;
            context.textAlign = 'center';
            context.font = "32pt Audiowide";
            context.fillText("Game Over", documentWidth / 2, documentHeight / 2);

        } else {
            setTimeout(gameLoop, 1000 / 30);
        }
    
}


$(document).ready(function () {

    gameLoop();

});
