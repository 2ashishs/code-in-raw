<?php
class nQdQ{
	public $cQ; //Circular Queue
	public $maxSize = 5; //Maximum size of circular queue set here
	public $H=-1; //Initially -1
	public $T=-1; //Initially -1
	public $empty=true; //Flag to check if Q is empty. Initially Q is empty
	
	function nQdQ(){
		$this->cQ = array_fill(0, $this->maxSize, -1); //-1 represents empty element - could be any other number
	}
	
	//Add node to circular Q (at Tail)
	function nQ($node){
		//Case1: Q empty initially
		if ($this->empty == true && $this->H == -1){
			$this->empty = FALSE;
			$this->H = 0;
			$this->T = 0;
			$this->cQ[$this->T] = $node;
			echo $node, " added\n";
		}//Case2: Q empty (after nQ & dQ operations)
		elseif ($this->empty == true){
			$this->cQ[$this->T] == $node;
			echo $node, " added\n";
		}//Case3: Q non empty
		else {
			//Case3A: Q full
			if (($this->T + 1) % $this->maxSize == $this->H) {
				echo "Q full, can't add ",$node,"\n";
			}//Case3B: Q not full
			else {
				$this->T = ($this->T + 1) % $this->maxSize;
				$this->cQ[$this->T] = $node;
				echo $node, " added\n";
			}
		}
	}
	
	//Remove node from circular Q (from Head)
	function dQ(){
		//Case1: Q empty
		if ($this->empty == true){
			echo "Q empty\n";
		}//Case2: Only one element left
		elseif ($this->H == $this->T){
			$this->empty = true;
			echo $this->cQ[$this->H], " deleted\n";
			$this->cQ[$this->H] = -1; //reset node
		}//Case3: More than one element
		else{
			echo $this->cQ[$this->H], " deleted\n";
			$this->cQ[$this->H] = -1; //reset node
			$this->H = ($this->H + 1) % $this->maxSize;
		}
	}
	
	function printQ(){
		echo "head:",$this->H," tail:",$this->T,"\n";
		//Case1: Q empty
		if ($this->empty == true){
			echo "Can't print empty Q\n";
		}//Case2: Q non-empty
		else{
			for ($i=$this->H; $i != $this->T; $i=($i+1)%$this->maxSize){
				echo $this->cQ[$i], " ";
			}
			echo $this->cQ[$this->T],"\n";
		}
	}
}

$buffer = new nQdQ();
//fill Q
$buffer->nQ(24);
$buffer->nQ(68);
$buffer->nQ(32);
$buffer->nQ(98);
$buffer->nQ(46);
//Qfull
$buffer->nQ(12); //generates error
$buffer->printQ();
//remove nodes from Q
$buffer->dQ();
$buffer->dQ();
$buffer->dQ();
$buffer->dQ();
//one element Q
$buffer->printQ();
$buffer->dQ();
//empty Q
$buffer->printQ();
//fill Q
$buffer->nQ(12);
$buffer->printQ();
?>