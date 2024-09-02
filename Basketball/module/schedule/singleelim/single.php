<?php include 'header.php' ?>

<!-- Php functions and variables-->
<?php
	global $TeamArray;
	global $PositionArray;

	function writeTeamSquareToPosition($name, $pos) {
		echo "<div class=\"TeamSquare\" style=\"position:absolute;z-index:2;left:$pos[0]px;top:$pos[1]px\">$name</div>";
	}
	
	function writeTeamSquare($name) {
		echo "<div class=\"TeamSquare\">".$name."</div>";
	}
	
	function drawLine($start, $end) {
		echo "<svg style=\"position:absolute;width:100%;height:100%;top:0px;left:0px;z-index:1\">";
		echo "<line x1=$start[0] y1=$start[1] x2=$end[0] y2=$end[1] style=\"stroke:black;stroke-width:2px\" />";
		echo "</svg>";
	}
	
	function drawLineToParent($array, $index, $PositionArray) {
		$childPos = $PositionArray[$index];
		$parentPos = $PositionArray[floor(($index - 1) / 2)];
		
		drawLine([$childPos[0] + 150, $childPos[1] + 15], [midpoint($childPos[0] + 150, $parentPos[0]), $childPos[1] + 15]); //Draw Horizontal Line halfway between end of child to beginning of parent
		drawLine([midpoint($childPos[0] + 150, $parentPos[0]), $childPos[1] + 15], [midpoint($childPos[0] + 150, $parentPos[0]), $parentPos[1] + 15]); //Vertical Line to parent's height
		drawLine([midpoint($childPos[0] + 150, $parentPos[0]), $parentPos[1] + 15], [$parentPos[0], $parentPos[1] + 15]); //Draw Horizontal Line the rest of the way to Parent
	}
	
	function getDepth($arrayTree) {
		return ceil(log((count($arrayTree) + 1))/log(2)) - 1;
	}
	
	function hasChildren($array, $index) {
		if(isset($array[$index * 2 + 1]) && isset($array[$index * 2 + 2]))
			return true;
		return false;
	}
	
	function midpoint($first, $second) {
		return ($first + $second) / 2;
	}
?>

<?php 
if($_GET != null) {
	$TeamArray = preg_split("/[\n\r]+/",'hg', NULL, PREG_SPLIT_NO_EMPTY);
	$BracketArray = array_fill(0, pow(2, ceil(log(count($TeamArray))/log(2)) + 1) - 1, " ");
	$lastRowIndex = floor(count($BracketArray) / 2);
	$offset = ceil(count($BracketArray) / 2) - count($TeamArray);
	
	for($i = 0; $i < count($TeamArray); $i++) {
		$BracketArray[$lastRowIndex + $i - $offset] = $TeamArray[$i];
	}
} 
?>



<!-- Page Content -->
<h2>Enter Team Names</h2>


<!-- Form Test -->
<form action="#" method="get">
<textarea rows=10 cols=15 name="Teams">g
u
p</textarea> <br>
<input type="submit"></input>
</form>
<br><br>

<?php

	if(isset($TeamArray)) {
		echo "<div class=\"BracketArea\" style=\"height:" . ((pow(2, getDepth($BracketArray)) - 1) * 40 + 30 + 20) . "px;width:" . (getDepth($BracketArray) * 190 + 150 + 20) . "px \">";
		
		$offset = 0;
		for($i = floor(count($BracketArray)/2); $i < count($BracketArray); $i++) {
			$PositionArray[$i] = [10, $offset * 40 + 10];
			$offset++;
		}
		
		for($i = count($BracketArray) - 1; $i >= 0; $i--) {
			if(hasChildren($BracketArray, $i))
				$PositionArray[$i] = [$PositionArray[$i*2+1][0] + 190, midpoint($PositionArray[$i*2+1][1], $PositionArray[$i*2+2][1])];
		}
		
			writeTeamSquareToPosition($BracketArray[0], $PositionArray[0]); //Write First one without lines
			for($i = 1; $i < count($BracketArray); $i++) {
				if($i > (floor(count($BracketArray) / 2)) and $BracketArray[$i] == " ") { continue; } //Don't print empty squares in the last row
				writeTeamSquareToPosition($BracketArray[$i], $PositionArray[$i]);
				drawLineToParent($BracketArray, $i, $PositionArray);
			}
		
		echo "</div>"; //BracketArea
	}
?>

<?php include 'footer.php' ?>