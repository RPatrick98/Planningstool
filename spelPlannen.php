<?php
	include("resources/functions.php");
	$games = getAllGames();
	include("resources/header.php");

	if($_SERVER["REQUEST_METHOD"] == "POST") {
        $data2 = array(
            "game" => $_POST["game"],
            "time" => $_POST["time"],
            "explainsPerson" => $_POST["explainsPerson"],
            "players" => $_POST["players"]
        );
        createGame($data2);
        header("location: index.php");
    }

?>

<div class="mb-5 mt-2">
	<h1>Spelletje Plannen</h1>
	<form method="POST">
		<div class="form-group md-form mx-5 my-5">
			<select name="game" id="game">
				<?php
					foreach ($games as $game) {
				?>
				<option value="<?=$game["id"]?>"><?=$game["name"]?></option>
				<?php
				}
				?>
			</select>
		</div>

		<div class="form-group md-form mx-5 my-5">
			<label for="time">Choose a time for your appointment:</label>

			<input type="datetime-local" id="time"
		       name="time" value="2018-06-12T19:30"
		       min="2018-06-07T00:00" max="2018-06-14T00:00">
		</div>
		

		<div class="form-group md-form mx-5 my-5">
			<select class="form-select" aria-label="Default select example" name="explainsPerson" id="explainsPerson">
			 	<option selected>Open this select menu</option>
			 	<option value="1">One</option>
			 	<option value="2">Two</option>
			 	<option value="3">Three</option>
			</select>
		</div>
		<div class="form-group md-form mx-5 my-5">
			<label for="players">Players</label>
			<input name="players" type="text" class="form-control" id="players" placeholder="Number of players">
		</div>
		<button type="submit" class="btn btn-primary form-group md-form mx-5 my-5">Plannen</button>
	</form>
</div>


<?php 
	include("resources/footer.php");
?>



