<?php 
include("resources/functions.php");

$game_id = 0;
    if(isset($_GET["id"])) {
        $game_id = $_GET["id"];
    }

    $game = getGame($game_id);
include("resources/header.php");
?>


<div class="mb-5 mt-2">

    <div class="d-lg-flex flex-lg-row flex-sm-column justify-content-between">
        <h1>Watch - <?=$game["name"]?> - here</h1>
        
    </div>

    <div class="content mt-2">
        <div class="row">
            <div class="col-lg-4">
                <div class="text-left border ">
                    <img class="img-fluid p-1 w-75 p-3" src="img/<?=$game["image"]?>"/>

                    <div class="border-bottom">
                        <strong>Name: <?=$game["name"]?></strong>
                    </div>
                    <div class="border-bottom">
                        <strong>Expansions: <?=$game["expansions"]?></strong>
                    </div>
                    <div class="border-bottom">
                        <a href="<?=$game["url"]?>">URL</a>
                    </div>
                    
                   <div class="border-bottom">
                        <strong>Min players: <?=$game["min_players"]?></strong>
                    </div>
                    <div class="border-bottom">
                        <strong>Max_players: <?=$game["max_players"]?> </strong>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-8">
                <p class="card-text">
                <?=$game["description"]?>
                </p>
                <div class="border-bottom">
                        <strong><?=$game["youtube"]?></strong>
                    </div>
            </div>
            
        </div>
    </div>
    <hr>
</div>




<?php 

include("resources/footer.php");

?>