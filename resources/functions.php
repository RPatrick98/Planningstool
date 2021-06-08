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
	$query = $conn->prepare("SELECT * FROM planned");
	$query->execute();
	$result = $query->fetchAll();
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

