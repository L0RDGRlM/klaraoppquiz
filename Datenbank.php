<?php
	/* Verbindung zur Datenbank aufbauen */
	
	$con = mysqli_connect("","root");
	
	/* SQL-String erzeugen und anschließend an MySQL mittels der gerade geöffneten Verbindung übermitteln */
	
	$sql = "CREATE DATABASE IF NOT EXISTS kahoot";
	$result = mysqli_query($con, $sql);
	
	if ($result == TRUE) {
		echo "Datenbank erfolgreich angelegt.<br />";
	} elseif ($result == FALSE) {
		echo "Fehler beim Erstellen der Datenbank.<br />";
	}
	
	/* Datenbank für weitere Queries auswählen */
	
	mysqli_select_db($con, "kahoot");
		
	
	/* --- Tabellen anlegen --- */	
	
	/* Tabelle für die Accounts der Quizmaster */
	$sql = "CREATE TABLE IF NOT EXISTS accounts (
		ID integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
		EMAIL varchar(60) UNIQUE KEY,
		PASSWORT varchar(255),
		NAME varchar (30),
		VORNAME varchar (30),
		AKTIV boolean
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	$result = mysqli_query($con, $sql);
	
	if ($result == TRUE) {
		echo "Tabelle accounts erfolgreich angelegt.<br />";		
	} elseif ($result == FALSE) {
		echo "Fehler beim Erstellen der Tabelle accounts.<br />";
	}	
	
	
	/* Tabelle für die Kopfdaten der Fragenkataloge */
	$sql = "CREATE TABLE IF NOT EXISTS kataloge (
		ID integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
		ERSTELLER_ID integer,
		TITEL varchar (100),
		BESCHREIBUNG varchar (255),
		QUELLEN varchar (255),
		BILD binary,
		constraint fk_account foreign key(ERSTELLER_ID) references `accounts`(ID)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	$result = mysqli_query($con, $sql);
	
	if ($result == TRUE) {
		echo "Tabelle kataloge erfolgreich angelegt.<br />";
		/* Anlegen der folgenden Tabellen ergibt nur Sinn, wenn die Tabelle kataloge existiert */
		
		/* Tabelle für die Quizfragen */
		$sql = "CREATE TABLE IF NOT EXISTS fragen (
			ID integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
			KATALOG_ID integer,
			TEXT varchar (500),
			BIL binary,
			ZEIT integer,
			constraint fk_katalog foreign key(KATALOG_ID) references `kataloge`(ID)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		$result = mysqli_query($con, $sql);
		
		if ($result == TRUE) {
			echo "Tabelle fragen erfolgreich angelegt.<br />";
			/* Anlegen der folgenden Tabelle ergibt nur Sinn, wenn die Tabelle fragen existiert */
			
			
			/* Tabelle für die Antworten */
			$sql = "CREATE TABLE IF NOT EXISTS antworten (
				ID integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
				FRAGE_ID integer,
				TEXT varchar(50),
				KORREKT boolean,
				constraint fk_frage foreign key(FRAGE_ID) references `fragen`(ID)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1";
			$result = mysqli_query($con, $sql);
			
			if ($result == TRUE) {
				echo "Tabelle antworten erfolgreich angelegt.<br />";
			} elseif ($result == FALSE) {
				echo "Fehler beim Erstellen der Tabelle antworten.<br />";
			}
						
		} elseif ($result == FALSE) {
			echo "Fehler beim Erstellen der Tabelle fragen.<br />";
		}			
		
	} elseif ($result == FALSE) {
		echo "Fehler beim Erstellen der Tabelle kataloge.<br />";
	}		
	
	/* Verbindung trennen */
	mysqli_close($con);
?>