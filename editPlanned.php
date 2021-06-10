<?php 
include("resources/functions.php");



	$game_id = 0;
	if(isset($_GET["id"])) {
		$game_id = $_GET["id"];
	}


	$plan = getPlanID($game_id);
	$planned = getPlanned();
	$games = getAllGames();





	if($_SERVER["REQUEST_METHOD"] == "POST") {
	        $data4 = array(
	            "game" => $_POST["game"],
	            "time" => $_POST["time"],
	            "id" => $_GET["id"],
	            "explainsPerson" => $_POST["explainsPerson"],
	            "players" => $_POST["players"]
	        );
	        updateGame($data4);
	        header("location: planned.php");
	}


include("resources/header.php");

?>




<div class="mb-5 mt-2">
	<h1>Spelletje Plannen</h1>
	<form method="POST">
		<div class="form-group md-form mx-5 my-5">
			<select name="game" id="game">
				<?php
					foreach ($games as $game) {
				?>
				<option value="<?=$game["id"]?>" <?php if($game["id"] == $plan["game_id"]) { echo "selected";} ?>><?=$game["name"]?></option>
				<?php
				}
				?>
			</select>
		</div>

		<div class="form-group md-form mx-5 my-5">
			<label for="time">Choose a time for your appointment:</label>

			<input type="datetime-local" id="time"
		       name="time" value="<?=$plan["planned_time"]?>"
		       min="2018-06-07T00:00" max="2018-06-14T00:00">
		</div>
		

		<div class="form-group md-form mx-5 my-5">
			<select class="form-select" aria-label="Default select example" name="explainsPerson" id="explainsPerson">
			 	<option selected>Open this select menu</option>
			 	<option value="E. M. BUTER">E. M. BUTER</option>
			 	<option value="P. NOORDZIJ">P. NOORDZIJ</option>
			 	<option value="C. KOOLEN">C. KOOLEN</option>
			</select>
		</div>
		<div class="form-group md-form mx-5 my-5">
			<label for="players">Players</label>
			<input name="players" type="text" class="form-control" id="players" placeholder="Number of players" value="<?=$plan["count_players"]?>">
		</div>
		<button type="submit" class="btn btn-success form-group md-form mx-5 my-5">Edit</button>
	</form>
</div>




<?php 


include("resources/footer.php");

?>