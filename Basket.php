<?php
        class Basket {
            // Creating some properties (variables tied to an object)
            public $isAlive = true;
            public $ID;
            public $amount;
			public $count=0;
            
            // Assigning the values
            public function __construct($ID, $amount) {
              $this->ID[$this->count] = $ID;
              $this->amount[$this->count] = $amount;
			  $this->count = $this->count + 1;
            }
            
            // Creating a method (function tied to an object)
            public function add($ID, $amount) {
			  $this->ID[$this->count] = $ID;
              $this->amount[$this->count] = $amount;
			  $this->count = $this->count + 1;
            }
			
          }
		  
        ?>