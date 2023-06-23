<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="form_style.css">
    <link rel="stylesheet" href="style.css"> 
    <link href='http://fonts.googleapis.com/css?family=Black+Ops+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <title>Sliding puzzle (Marek Świergoń)</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style.css">
  </head>

<body id="myBody" onload="checkForLocalStorage()"> 

  <?php include_once('./partials/navigation.php') ?>

  <main>
    <article>
      <div id="popupForm" class="form-popup">
        <form>
          <h4 style="text-align:center;margin-bottom:5%;">Sliding puzzle game</h4>
          <h5>Enter row/column number:</h5>
          <input type="range" id="inputRange" name="inputRange" min="3" max="8" value="3">
          <br>
          <span id="rangeValue">3</span>
          <br>
          <h4>Select board type:</h4>
          <div class="board-images">
            <img src="game/board1.png" alt="board1 Image" id="board1" class="board-image" style="width:100px;height:100px;" onclick="selectBoard('board1')">
            <img src="game/board2.png" alt="board2 Image" id="board2" class="board-image" style="width:100px;height:100px;" onclick="selectBoard('board2')">
            <img src="game/board3.png" alt="board3 Image" id="board3" class="board-image" style="width:100px;height:100px;" onclick="selectBoard('board3')">
          </div>
          <br>
          <button type="button" onclick="submitForm()">Start game</button>
        </form>
      </div>
      <section class="contact">
        <div id="game">
          <canvas id="canvas">Wygląda na to, że nie masz włączonego JavaScript. No to nie pograsz :/ </canvas>
          <button id="reset" onclick="init()">Reset</button>
          <button id="select" onclick="resetAndSelect()">End game and go to board selection</button>
          <script src="game/mypuzzle.js" type="text/javascript"></script>
        </div>
      </section>
    </article>
  </main>

  <?php include_once('./partials/footer.php') ?>

</body>
  
</html>
