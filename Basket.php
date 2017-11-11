<?php
        class Basket {
            // Creating some properties (variables tied to an object)
            public $isAlive = true;
            public $ID;
            public $amount;
			public $index=0;
            
            // Assigning the values
            public function __construct($ID, $amount) {
              $this->ID[$this->index] = $ID;
              $this->amount[$this->index] = $amount;
			  $this->index = $this->index + 1;
			  echo "NewONE".$ID;
            }
            
            // Creating a method (function tied to an object)
            public function add($ID, $amount) {
				$isthere = false;
			  for($i=0; $i<$this->index; $i++){
				  if($this->ID[$i] == $ID){
					  $this->amount[$i] = $this->amount[$i] + $amount;
					  $isthere = true;
				  }
			  }
			  if($isthere == false){
			  $this->ID[$this->index] = $ID;
              $this->amount[$this->index] = $amount;
			  $this->index = $this->index + 1;
			  }
            }
			public function update($ID, $amount) {
				for($i=0; $i<$this->index; $i++){
					if($i == $ID){
						if($amount != 0){
							$this->amount[$i] = $amount;
						} else{
							if($i<$this-index){
								for($j=$i; $j<$this->index; $j++){
									$this->ID[$j] = $this->ID[$j+1];
									$this->amount[$j] = $this->amount[$j+1];
								}
							}
							$this->index= $this->index -1;
						}
					}
					
				}
			}
          }
		  
        ?>