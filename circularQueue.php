<?php
/*
Problem: Implement a circular queue with add (enque) & remove (deque) operations
Solution:
class nQdQ defines the template for circular queue with following methods,
	nQ($node) method for adding nodes at tail,
	dQ() method for removing nodes from head,
	printQ() method to print the circular queue.
$buffer implements the circular queue.
*/
class nQdQ{
	public $cQ; //Circular Queue
	public $maxSize = 5; //Maximum size of circular queue set here
	public $H=0; //Initially 0
	public $T=0; //Initially 0
	public $empty=true; //Flag to check if Q is empty. Initially Q is empty
	
	function nQdQ(){
		$this->cQ = array_fill(0, $this->maxSize, 0); //Initialize array size and fill the array with 0s
	}
	
	//Add node to circular Q (at Tail)
	function nQ($node){
		//Case1: Q empty
		if ($this->empty == true){
			$this->empty = false;
			$this->cQ[$this->T] = $node;
			echo $node, " added\n";
		}//Case2: Q not empty & not full
		elseif ( ($this->T + 1) % $this->maxSize != $this->H ) {
			$this->T = ($this->T + 1) % $this->maxSize;
			$this->cQ[$this->T] = $node;
			echo $node, " added\n";
		}//Case3: Q full
		else {
			echo "Q full, ",$node," not added\n";
			return;
		}
		echo "head:",$this->H," tail:",$this->T,"\n";
	}
	
	//Remove node from circular Q (from Head)
	function dQ(){
		//Case1: Q empty
		if ($this->empty == true){
			echo "Q empty\n";
			return;
		}//Case2: Only one element left
		elseif ($this->H == $this->T){
			$this->empty = true;
			echo $this->cQ[$this->H], " deleted\n";
		}//Case3: More than one element
		else{
			echo $this->cQ[$this->H], " deleted\n";
			$this->H = ($this->H + 1) % $this->maxSize;
		}
		echo "head:",$this->H," tail:",$this->T,"\n";
	}
	
	function printQ(){
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
$buffer->nQ(36);
$buffer->nQ(48);
$buffer->printQ();
?>
