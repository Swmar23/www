const PUZZLE_HOVER_TINT = "#009900";

let _puzzleDifficulty;
let selectedBoard;

// Get the popup form, the input range element, and the board images
const popupForm = document.getElementById("popupForm");
const inputRange = document.getElementById("inputRange");
const board1 = document.getElementById("board1");
const board2 = document.getElementById("board2");
const board3 = document.getElementById("board3");

// Open the form when the user clicks the "Open form" button
function openForm() {
  if (_canvas != null) {
    _canvas.style.display = "none";
  }
  popupForm.style.display = "block";
  document.getElementById("reset").style.display = "none";
  document.getElementById("select").style.display = "none";
}

// Close the form when the user clicks the "Close" button or outside the form
function closeForm() {
  popupForm.style.display = "none";
}

// Update the range value text when the user changes the range value
inputRange.oninput = function() {
  const rangeValue = document.getElementById("rangeValue");
  rangeValue.innerHTML = inputRange.value;
};

// Select the clicked board image and deselect the others
function selectBoard(id) {
  board1.classList.remove("selected");
  board2.classList.remove("selected");
  board3.classList.remove("selected");
  document.getElementById(id).classList.add("selected");
  const selectedImage = document.getElementById(id);
  selectedBoard = "game/" + selectedImage.src.split("/").pop();
}

// Submit the form when the user clicks the "Submit" button
function submitForm() {
  const inputValue = parseInt(inputRange.value);
  if (selectedBoard != null) {
    closeForm();
    _puzzleDifficulty = inputValue;
    init();
  } else {
    alert("Wybierz planszę!");
  }
}

let _blank;
let _stage;
let _canvas;
let _img;
let _pieces;  //at start at index 0 we have element '0', at index 1 '1' and so on
let _puzzleWidth;
let _puzzleHeight;
let _canvasPieceWidth;
let _canvasPieceHeight;
let _hoveredPiece;
let _imgPieceWidth;
let _imgPieceHeight;
let _mouse;

function getXImageCordFromIndex(index) {
  return (index % _puzzleDifficulty) * _imgPieceWidth;
}

function getYImageCordFromIndex(index) {
  return Math.floor(index / _puzzleDifficulty) * _imgPieceHeight;
}

function getXCanvasCordFromIndex(index) {
  return (index % _puzzleDifficulty) * _canvasPieceWidth;
}

function getYCanvasCordFromIndex(index) {
  return Math.floor(index / _puzzleDifficulty) * _canvasPieceHeight;
}

function checkForLocalStorage() {
  selectedBoard = localStorage.getItem("selectedBoard");
  _puzzleDifficulty = parseInt(localStorage.getItem("puzzleDifficulty"));
  _pieces = JSON.parse(localStorage.getItem("boardState"));
  if (selectedBoard && _puzzleDifficulty && _pieces) {
    reloadStartedGame();
  } else {
    openForm();
  }
}

function resetAndSelect() {
  localStorage.clear();
  openForm();
}

function reloadStartedGame() {
  _img = new Image();
  _img.addEventListener("load",initReload);
  _img.src = selectedBoard;
  document.getElementById("reset").style.display = "block";
  document.getElementById("select").style.display = "block";
}

function init(){
  document.onclick = null;
  document.onmousemove = null;
  _img = new Image();
  _img.addEventListener("load",onImage);
  _img.src = selectedBoard;
  document.getElementById("reset").style.display = "none";
  document.getElementById("select").style.display = "none";
  if (_canvas != null) { 
    _canvas.style.display = "block";
  }
}
function onImage(){
  _imgPieceWidth = Math.floor(_img.width / _puzzleDifficulty);
  _imgPieceHeight = Math.floor(_img.height / _puzzleDifficulty);
  _puzzleWidth = 0.7 * Math.min(window.innerWidth, window.innerHeight);
  _puzzleHeight = 0.7 * Math.min(window.innerWidth, window.innerHeight);
  _canvasPieceWidth = Math.floor(_puzzleWidth / _puzzleDifficulty);
  _canvasPieceHeight = Math.floor(_puzzleHeight / _puzzleDifficulty);
  setCanvas();
  initPuzzle();
}

function initReload() {
  _imgPieceWidth = Math.floor(_img.width / _puzzleDifficulty);
  _imgPieceHeight = Math.floor(_img.height / _puzzleDifficulty);
  _puzzleWidth = 0.7 * Math.min(window.innerWidth, window.innerHeight);
  _puzzleHeight = 0.7 * Math.min(window.innerWidth, window.innerHeight);
  _canvasPieceWidth = Math.floor(_puzzleWidth / _puzzleDifficulty);
  _canvasPieceHeight = Math.floor(_puzzleHeight / _puzzleDifficulty);
  _mouse = {x:0,y:0};
  setCanvas();
  _blank = _puzzleDifficulty * _puzzleDifficulty - 1;
  _stage.clearRect(0,0,_puzzleWidth,_puzzleHeight);
  let pieceCurrentIndex;
  let i;
  for(i = 0;i < _pieces.length;i += 1) {
    pieceCurrentIndex = _pieces[i];
    if(i == _blank) {
      _stage.fillStyle = "blue";
      _stage.fillRect(getXCanvasCordFromIndex(pieceCurrentIndex), getYCanvasCordFromIndex(pieceCurrentIndex), _canvasPieceWidth, _canvasPieceHeight);
      _stage.strokeRect(getXCanvasCordFromIndex(pieceCurrentIndex), getYCanvasCordFromIndex(pieceCurrentIndex), _canvasPieceWidth, _canvasPieceHeight);
    }
    else {
      _stage.drawImage
      ( 
        _img, 
        getXImageCordFromIndex(i),
        getYImageCordFromIndex(i), 
        _imgPieceWidth, _imgPieceHeight, 
        getXCanvasCordFromIndex(pieceCurrentIndex),
        getYCanvasCordFromIndex(pieceCurrentIndex),
        _canvasPieceWidth,
        _canvasPieceHeight
      );
      _stage.strokeRect(getXCanvasCordFromIndex(pieceCurrentIndex), getYCanvasCordFromIndex(pieceCurrentIndex), _canvasPieceWidth, _canvasPieceHeight);
    }
  }
  document.onmousemove = highlightPieces;
  document.onclick = movePiece;
}

function setCanvas(){
  _canvas = document.getElementById("canvas");
  _stage = _canvas.getContext("2d");
  _canvas.width = _puzzleWidth;
  _canvas.height = _puzzleHeight;
  _canvas.style.border = "1px solid black";
}

function initPuzzle(){
  _blank = _puzzleDifficulty * _puzzleDifficulty - 1;
  _pieces = [];
  _mouse = {x:0,y:0};
  _stage.drawImage(_img, 0, 0, _img.width, _img.height, 0, 0, _puzzleWidth, _puzzleHeight);
  createTitle("Click to Start Puzzle");
  buildPieces();
}

function createTitle(msg){
  _stage.fillStyle = "#808080";
  _stage.globalAlpha = 0.8;
  _stage.fillRect(0,_puzzleHeight - 40, _puzzleWidth,40);
  _stage.fillStyle = "#FFFFFF";
  _stage.globalAlpha = 1;
  _stage.textAlign = "center";
  _stage.textBaseline = "middle";
  _stage.font = "20px Arial";
  _stage.fillText(msg,_puzzleWidth / 2,_puzzleHeight - 20);
}
function buildPieces(){
  let i;  
  for(i = 0;i < _puzzleDifficulty * _puzzleDifficulty;i += 1){
    _pieces.push(i);
  }
  document.onclick = shufflePuzzle;
}
function shufflePuzzle(){
  document.getElementById("reset").style.display = "block";
  document.getElementById("select").style.display = "block";
  _pieces = shuffleArray(_pieces);
  _stage.clearRect(0,0,_puzzleWidth,_puzzleHeight);
  updateCanvas();
  document.onmousemove = highlightPieces;
  document.onclick = movePiece;
  localStorage.setItem("boardState", JSON.stringify(_pieces));
  localStorage.setItem("selectedBoard", selectedBoard);
  localStorage.setItem("puzzleDifficulty", _puzzleDifficulty);
}

function highlightPieces(e) {
  _hoveredPiece = null;
  if(e.layerX || e.layerX == 0){
    _mouse.x = e.layerX - _canvas.offsetLeft;
    _mouse.y = e.layerY - _canvas.offsetTop;
  }
  else if(e.offsetX || e.offsetX == 0){
      _mouse.x = e.offsetX - _canvas.offsetLeft;
      _mouse.y = e.offsetY - _canvas.offsetTop;
  }
  _hoveredPiece = checkGridIndexHovered();
  updateCanvas();
  if(_hoveredPiece != null) {
    if(_hoveredPiece + 1 == _pieces[_blank] || _hoveredPiece - 1 == _pieces[_blank] || _hoveredPiece + _puzzleDifficulty == _pieces[_blank] || _hoveredPiece - _puzzleDifficulty == _pieces[_blank]) {
      _stage.save();
      _stage.globalAlpha = 0.4;
      _stage.fillStyle = PUZZLE_HOVER_TINT;
      _stage.fillRect(getXCanvasCordFromIndex(_hoveredPiece), getYCanvasCordFromIndex(_hoveredPiece), _canvasPieceWidth, _canvasPieceHeight);
      _stage.restore();
    }
  }
}

function updateCanvas() {
  let pieceCurrentIndex;
  let i;
  _stage.clearRect(0,0,_puzzleWidth,_puzzleHeight);
  for(i = 0;i < _pieces.length;i += 1) {
    pieceCurrentIndex = _pieces[i];
    if(i == _blank) {
      _stage.fillStyle = "blue";
      _stage.fillRect(getXCanvasCordFromIndex(pieceCurrentIndex), getYCanvasCordFromIndex(pieceCurrentIndex), _canvasPieceWidth, _canvasPieceHeight);
      _stage.strokeRect(getXCanvasCordFromIndex(pieceCurrentIndex), getYCanvasCordFromIndex(pieceCurrentIndex), _canvasPieceWidth, _canvasPieceHeight);
    }
    else { 
      _stage.drawImage
      ( 
        _img, 
        getXImageCordFromIndex(i),
        getYImageCordFromIndex(i), 
        _imgPieceWidth, _imgPieceHeight, 
        getXCanvasCordFromIndex(pieceCurrentIndex),
        getYCanvasCordFromIndex(pieceCurrentIndex),
        _canvasPieceWidth,
        _canvasPieceHeight
      );
      _stage.strokeRect(getXCanvasCordFromIndex(pieceCurrentIndex), getYCanvasCordFromIndex(pieceCurrentIndex), _canvasPieceWidth, _canvasPieceHeight);
    }
  }
}

function checkGridIndexHovered() { //returns of hovered index element
  let i;
  for(i = 0;i < _pieces.length;i += 1){
    if(_mouse.x < getXCanvasCordFromIndex(i) || _mouse.x > (getXCanvasCordFromIndex(i) + _canvasPieceWidth) || _mouse.y < getYCanvasCordFromIndex(i) || _mouse.y > (getYCanvasCordFromIndex(i) + _canvasPieceHeight)){
      //GRID ELEMENT OF INDEX i NOT HIT
    }
    else{
      return i;
    }
  }
  return null;
}

function movePiece() {
  if (_hoveredPiece != null) {
    if(_hoveredPiece + 1 == _pieces[_blank] || _hoveredPiece - 1 == _pieces[_blank] || _hoveredPiece + _puzzleDifficulty == _pieces[_blank] || _hoveredPiece - _puzzleDifficulty == _pieces[_blank]) {
      let hoveredPieceValue;
      for(i = 0;i < _pieces.length;i += 1) {
        if (_pieces[i] == _hoveredPiece) {
          hoveredPieceValue = i;
          break;
        }
      }
      let blankIndex = _pieces[_blank];
      _pieces[_blank] = _hoveredPiece;
      _pieces[hoveredPieceValue] = blankIndex;

    }
  }
  localStorage.setItem("boardState", JSON.stringify(_pieces));
  updatePuzzleAndCheckWin();
}

function updatePuzzleAndCheckWin() {
  _stage.clearRect(0,0,_puzzleWidth,_puzzleHeight);
  let gameWin = true;
  let i;
  let pieceCurrentIndex;
  for(i = 0;i < _pieces.length;i += 1) {
    pieceCurrentIndex = _pieces[i];
    if(i == _blank) {
      _stage.fillStyle = "blue";
      _stage.fillRect(getXCanvasCordFromIndex(pieceCurrentIndex), getYCanvasCordFromIndex(pieceCurrentIndex), _canvasPieceWidth, _canvasPieceHeight);
      _stage.strokeRect(getXCanvasCordFromIndex(pieceCurrentIndex), getYCanvasCordFromIndex(pieceCurrentIndex), _canvasPieceWidth, _canvasPieceHeight);
    }
    else {
      _stage.drawImage
      ( 
        _img, 
        getXImageCordFromIndex(i),
        getYImageCordFromIndex(i), 
        _imgPieceWidth, _imgPieceHeight, 
        getXCanvasCordFromIndex(pieceCurrentIndex),
        getYCanvasCordFromIndex(pieceCurrentIndex),
        _canvasPieceWidth,
        _canvasPieceHeight
      );
      _stage.strokeRect(getXCanvasCordFromIndex(pieceCurrentIndex), getYCanvasCordFromIndex(pieceCurrentIndex), _canvasPieceWidth, _canvasPieceHeight);
    }
    if(pieceCurrentIndex != i) {
      gameWin = false;
    }
  }
  if(gameWin){
    localStorage.clear();
    setTimeout(gameOver,500);
  }
}

function gameOver(){
  alert("You won!");
  document.onclick = null;
  document.onmousemove = null;
  openForm();
}

function isSolvable(o){
  let board = Array(16);
  let i;
  let j;
  for(i = 0; i< o.length;i += 1) {
    if (i == (_puzzleDifficulty * _puzzleDifficulty - 1)) {
      board[o[i]] = 0;
    }
    else {
      board[o[i]] = i+1; 
    }
  }
  let inversions = 0;
  for (i = 0; i < board.length; i += 1) {
    for (j = i+1; j < board.length; j += 1) {
      if (board[i] > board[j] && board[i] !== 0 && board[j] !== 0) {
        inversions += 1;
      }
    }
  }
  const blankIndex = board.indexOf(0);
  const blankRow = Math.floor(blankIndex / Math.sqrt(board.length));
  if(_puzzleDifficulty % 2 === 1) {
    return (inversions % 2 === 0)
  } else {
    return ((inversions + blankRow) % 2 === 1)
  }
}

function shuffleArray(o){
  do {
    for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
  } while(!isSolvable(o))
  return o;
}