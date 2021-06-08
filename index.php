<?php

include("resources/functions.php");

$gamesCount = getGamesCount();
$games = getAllGames();
include("resources/header.php");
?>


	<div class="mb-5 mt-2">
		<div class="d-lg-flex flex-lg-row flex-sm-column justify-content-between">
	        <h1>View all <?php echo $gamesCount; ?> games here</h1>
	        
    	</div>
		<div class="mt-2 row">
			<?php
			foreach ($games as $game) {
			?>
			<div class="card-body col-lg-4">
				<img class="card-img-top img-fluid w-50 p-3" src="img/<?=$game["image"]?>">
				<div class="card-body">
					<h4 class="card-title"><?=$game["name"]?></h4>
					<p class="card-text"><?=$game["skills"]?></p>
					<a href="game.php?id=<?=$game["id"]?>" class="btn btn-primary">More details</a>
				</div>
			
			</div>
			<?php
			}
			?>
		</div>

	</div>

<?php
include("resources/footer.php")
?>
	



	