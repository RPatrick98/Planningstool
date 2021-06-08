<?php 



	include("resources/functions.php");
	$plannedCount = getPlannedCount();


	if(isset($_GET["id"])) {
        $data3 = array(
        	"id" => $_GET["id"]
        );
        deleteGame($data3);
        header("location: planned.php");
    }

  	
	
    
	$planned = getPlanned();


	include("resources/header.php");

?>
	
	<div class="mb-5 mt-2">
		

		<div class="d-lg-flex flex-lg-row flex-sm-column justify-content-between">
	        <h1>View all <?php echo $plannedCount; ?> planned games here</h1>
	        
    	</div>
		<div class="mt-2 row">
			<?php
			foreach ($planned as $plan) {
				$game_id2 = $plan["game_id"];
				$game = getGame($game_id2);
			?>
			<div class="card-body col-lg-4">
				<img class="card-img-top img-fluid w-50 p-3" src="img/<?=$game["image"]?>">
				<div class="card-body">
					<h4 class="card-title"><?=$game["name"]?></h4>
					<p class="card-text"><?=$plan["planned_time"]?></p>
					<p class="card-text"><?=$game["play_minutes"]?> minutes</p>
					<p class="card-text"><?=$plan["explains_person"]?></p>
					<a href="plannedGame.php?id=<?=$game["id"]?>" class="btn btn-primary">More details</a>
					<a class="btn btn-danger text-whit" href="?id=<?=$plan["id"]?>" onclick="javascript: return confirm('Weet je het zeker?');">Delete appointment x</a>
				</div>
			
			</div>
			<?php
			}
			?>
		</div>

	</div>



<?php 
	include("resources/footer.php");

?>