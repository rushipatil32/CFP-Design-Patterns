<?php
interface Cricket{
    function play();
}
class Game implements Cricket {

    private $gameName;
    public function __construct($gameName)
    {
        $this->gameName = $gameName;
    }
    public function play()
    {
       echo "I am Playing ".$this->gameName." on ground \n";
    }
    
}
class GameProxy implements Cricket {
    private $game;
    private $gameName;
    public function __construct($name)
    {
        $this->gameName = $name;
    }
    public function play()
    {
        if($this->game == null){
            $this->game = new Game($this->gameName);
        }
        $this->game->play();

    }
}
$obj = new GameProxy("Cricket");
$obj->play();
?>