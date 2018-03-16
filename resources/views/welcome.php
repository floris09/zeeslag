<?php


class Game {
  public $id;

  public function __construct($id){
    $this->id = $id;
  }
}

class Player {
  public $id;
  public $game_id;
  public $board_id;
  public $name;
  public $score;
  public $won;
  public $lost;

  public function __construct($id, $game_id, $board_id, $name){
    $this->id = $id;
    $this->game_id = $game_id;
    $this->board_id = $board_id;
    $this->name = $name;
  }
}

class Board {
  public $id;
  public $game_id;
  public $board;

  public function __construct($id, $game_id){
    $this->id = $id;
    $this->game_id = $game_id;
  }
}

class Ship {
  public $id;
  public $board_id;
  public $length;
  public $type;

  public function __construct($id, $board_id, $length){
    $this->id = $id;
    $this->board_id = $board_id;
    $this->length = $length;
  }
}


$game = new Game(1);
$player1 = new Player(1,1,1,'Floris');
$player2 = new Player(2,1,2,'Rik');
$board1 = new Board(1,1);
$board2 = new Board(2,1);
$ships1 = [new Ship(1,1,5),new Ship(2,1,4),new Ship(3,1,4),new Ship(4,1,3),new Ship(5,1,3),new Ship(6,1,3),new Ship(7,1,2),new Ship(8,1,2),new Ship(9,1,2),new Ship(10,1,2)];
$ships2 = [new Ship(11,2,5),new Ship(12,2,4),new Ship(13,2,4),new Ship(14,2,3),new Ship(15,2,3),new Ship(16,2,3),new Ship(17,2,2),new Ship(18,2,2),new Ship(19,2,2),new Ship(20,2,2)];

$board1->board =  [[0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ]
                 ];

$board2->board =  [[0 ,0 ,1 ,2 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ],
                   [0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ]
                 ];

function getColor($x){
  switch($x){
    case 0:
      return 'blue';
      break;
    case 1:
      return 'grey';
      break;
    case 2:
      return 'red';
      break;
  }
}

function drawBoard($board){
  $id = 0;
  echo "<table>";
    for($j=0; $j < 10; $j++){
      echo "<tr>";
      for($i=0; $i < 10; $i++){
        echo "<td id='$id' style='background-color:".getColor($board[$j][$i])."'onclick='getId(this)'> </td>";
        $id++;
      }
      echo "</tr>";
    }
  echo "</table>";
}

function drawShips($ships){
  $id = 0;
  foreach($ships as $ship){
    echo "<div style='width:".$ship->length * 50 ."px' class='ship'></div>";
  }
}

 ?>

<html>
<head>
  <style>
    table td {
      margin: 0;
      padding: 0;
    }

    td {
      width: 50px;
      height: 50px;
    }

    .ship {
      height: 50px;
      background-color: grey;
      border: 1px solid black;
    }
  </style>
  <script>
    function getId(field){
      console.log(field.id);
    }
  </script>
</head>
<body>

<?php drawBoard($board1->board);
      drawShips($ships1); ?>
<br>
<?php drawBoard($board2->board);
      drawShips($ships2);  ?>


</body>
</html>
