<?php

include("db.php");

function getGamesCount() {
	$conn = openDatabaseConnection();

	$query = $conn->prepare("SELECT count(*) as spelenTotal FROM games");
	$query->execute();
	$result = $query->fetch();
	return $result["spelenTotal"];
}

function getPlannedCount() {
	$conn = openDatabaseConnection();

	$query = $conn->prepare("SELECT count(*) as plannedTotal FROM planned");
	$query->execute();
	$result = $query->fetch();
	return $result["plannedTotal"];
}

function getAllGames() {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM games");
	$query->execute();
	$result = $query->fetchAll();
	return $result;
}


function getGame($id) {
	$conn = openDatabaseConnection();

	$query = $conn->prepare("SELECT * FROM games WHERE id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	$result = $query->fetch();
	return $result;
}

function getPlanned() {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM planned ORDER BY planned_time");
	$query->execute();
	$result = $query->fetchAll();
	return $result;
}

function getPlan($id2) {
	$conn = openDatabaseConnection();

	$query = $conn->prepare("SELECT * FROM planned WHERE game_id = :id");
	$query->bindParam(":id", $id2);
	$query->execute();
	$result = $query->fetch();
	return $result;
}

function getPlanID($id3) {
	$conn = openDatabaseConnection();

	$query = $conn->prepare("SELECT * FROM planned WHERE id = :id");
	$query->bindParam(":id", $id3);
	$query->execute();
	$result = $query->fetch();
	return $result;
}

function createGame($data2) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("INSERT INTO planned (game_id, planned_time, explains_person, count_players) 
		VALUES (:game_id, :planned_time, :explains_person, :count_players)");
	$query->bindParam(":game_id", $data2["game"]);
	$query->bindParam(":planned_time", $data2["time"]);
	$query->bindParam(":explains_person", $data2["explainsPerson"]);
	$query->bindParam(":count_players", $data2["players"]);
	$query->execute();
}
function deleteGame($data3) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("DELETE FROM planned WHERE id = :id");
	$query->bindParam(":id", $data3["id"]);
	$query->execute();
}

function updateGame($data4) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("UPDATE planned SET game_id = :game_id, planned_time = :planned_time, explains_person = :explains_person, count_players = :count_players WHERE id = :id");
	$query->bindParam(":game_id", $data4["game"]);
	$query->bindParam(":planned_time", $data4["time"]);
	$query->bindParam(":id", $data4["id"]);
	$query->bindParam(":explains_person", $data4["explainsPerson"]);
	$query->bindParam(":count_players", $data4["players"]);
	$query->execute();
}

