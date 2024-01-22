<?php
    abstract class Move{
        protected $name;
        abstract function Go();
    }

    class Play extends Move{
        public function Go() {
            echo $this->name;
        }
    }
?>