<?php
	class account
	{
		private $ID;
		private $EMail;
		private $Passwort;
		private $Name;
		private $Vorname;
		private $Aktiv;
		
		
		function __construct($ID, $EMail, $Passwort, $Name, $Vorname)
		{
			$this->ID = $ID;
			$this->EMail = $EMail;
			$this->Passwort = passwort_hash(Passwort);
			$this->Name = $Name;
			$this->Vorname = $Vorname;
		}
		
		function validate_Login($passwort)
		{
			$validated = passwort_verify($passwort, $this->Passwort);			
			return $validated;
		}
		
		function getName()
		{
			$returnName = $this->Vorname . " " . $this->Name;
			return $returnName;
		}
		
		function getID()
		{
			return $this->ID;
		}
		
		function getAktiv()
		{
			return $this->Aktiv;
		}
		
		function setAktiv($Aktiv)
		{
			$this->Aktiv = $Aktiv;
		}
	} // End Class account

	
	class katalog
	{
		private $ID;
		private $ErstellerID;
		private $Titel;
		private $Beschreibung;
		private $Quellen;
		private $Bild;
		
		
		function __construct($ID, $ErstellerID, $Titel, $Beschreibung, $Quellen, $Bild)
		{
			$this->ID = $ID;
			$this->ErstellerID = $ErstellerID;
			$this->Titel = $Titel;
			$this->Beschreibung = $Beschreibung;
			$this->Quellen = $Quellen;
			$this->Bild = $Bild;
		}		
		
		function getID()
		{
			return $this->ID;
		}
		
		function getErstellerID()
		{
			return $this->ErstellerID;
		}
		
		function getTitel()
		{
			return $this->Titel;
		}
		
		function setTitel($Titel)
		{
			$this->Titel = $Titel;
		}
		
		function getBeschreibung()
		{
			return $this->Beschreibung;
		}
		
		function setBeschreibung($Beschreibung)
		{
			$this->Beschreibung = $Beschreibung;
		}
		
		function getQuellen()
		{
			return $this->Quellen;
		}
		
		function setQuellen($Quellen)
		{
			$this->Quellen = $Quellen;
		}
		
		function getBild()
		{
			return $this->Bild;
		}
		
		function setBild($Bild)
		{
			$this->Bild = $Bild;
		}
	} //End Class katalog
	
	
	class frage
	{
		private $ID;
		private $KatalogID;
		private $Text;		
		private $Zeit;
		private $Bild;
		
		
		function __construct($ID, $KatalogID, $Text, $Zeit, $Bild)
		{
			$this->ID = $ID;
			$this->KatalogID = $KatalogID;
			$this->Text = $Text;
			$this->Zeit = $Zeit;
			$this->Bild = $Bild;
		}		
		
		function getID()
		{
			return $this->ID;
		}
		
		function getKatalogID()
		{
			return $this->KatalogID;
		}
		
		function getText()
		{
			return $this->Text;
		}
		
		function setText($Text)
		{
			$this->Text = $Text;
		}
		
		function getZeit()
		{
			return $this->Zeit;
		}
		
		function setZeit($Zeit)
		{
			$this->Zeit = $Zeit;
		}
				
		function getBild()
		{
			return $this->Bild;
		}
		
		function setBild($Bild)
		{
			$this->Bild = $Bild;
		}	
	} //End Class frage
	
	
	class antwort
	{
		private $ID;
		private $FrageID;
		private $Text;		
		private $Korrekt;
		
		
		function __construct($ID, $FrageID, $Text, $Korrekt)
		{
			$this->ID = $ID;
			$this->FrageID = $FrageID;
			$this->Text = $Text;
			$this->Korrekt = $Korrekt;
		}		
		
		function getID()
		{
			return $this->ID;
		}
		
		function getFrageID()
		{
			return $this->FrageID;
		}
		
		function getText()
		{
			return $this->Text;
		}
		
		function setText($Text)
		{
			$this->Text = $Text;
		}
		
		function getKorrekt()
		{
			return $this->Korrekt;
		}
		
		function setKorrekt($Korrekt)
		{
			$this->Korrekt = $Korrekt;
		}
	} //End Class antwort
	
	
	class connector
	{
		function getAccount($email)
		{
			/* Verbindung zur Datenbank aufbauen */
			$con = mysqli_connect("","root");
			/* Datenbank für weitere Queries auswählen */
			mysqli_select_db($con, "klaraoppquiz");
	
			/* SQL-String erzeugen und anschließend an MySQL mittels der gerade geöffneten Verbindung übermitteln */
			$sql = "SELECT * FROM accounts WHERE EMAIL = '" . email .  "';";
			
			$account instanceof account = mysqli_query($con, $sql);
			
			/* Verbindung trennen */
			mysqli_close($con);
			
			return account;
		} 		
		
		
		function createKatalog($newKatalog instanceof katalog)
		{
			/* Verbindung zur Datenbank aufbauen */
			$con = mysqli_connect("","root");
			/* Datenbank für weitere Queries auswählen */
			mysqli_select_db($con, "klaraoppquiz");
	
			/* SQL-String erzeugen und anschließend an MySQL mittels der gerade geöffneten Verbindung übermitteln */
			$sql = "INSERT INTO kataloge (ERSTELLER_ID, TITEL, BESCHREIBUNG, QUELLEN, BILD) values (" . newKatalog.getErstellerID . ", " . newKatalog.getTitel . ", " . newKatalog.getBeschreibung . ", " . newKatalog.getQuellen . ", " . newKatalog.getBild . ");";
			
			mysqli_query($con, $sql);
			
			/* Verbindung trennen */
			mysqli_close($con);			
		}
		
		function updateKatalog($changedKatalog instanceof katalog)
		{
			/* Verbindung zur Datenbank aufbauen */
			$con = mysqli_connect("","root");
			/* Datenbank für weitere Queries auswählen */
			mysqli_select_db($con, "klaraoppquiz");
	
			/* SQL-String erzeugen und anschließend an MySQL mittels der gerade geöffneten Verbindung übermitteln */
			$sql = "UPDATE kataloge SET ERSTELLER_ID = '" . changedKatalog.getErstellerID . "', TITEL = '" . changedKatalog.getTitel . "', BESCHREIBUNG = '" . changedKatalog.getBeschreibung . "', QUELLEN = '" . changedKatalog.getQuellen . "', BILD = '" . changedKatalog.getBild . "' WHERE ID = " .changedKatalog.getID . ";";
			
			mysqli_query($con, $sql);
			
			/* Verbindung trennen */
			mysqli_close($con);				
		}
		
		function getKataloge()
		{
			private kataloge();
			
			/* Verbindung zur Datenbank aufbauen */
			$con = mysqli_connect("","root");
			/* Datenbank für weitere Queries auswählen */
			mysqli_select_db($con, "klaraoppquiz");
	
			/* SQL-String erzeugen und anschließend an MySQL mittels der gerade geöffneten Verbindung übermitteln */
			$sql = "SELECT * FROM kataloge";
			
			kataloge() = mysqli_query($con, $sql);
			
			/* Verbindung trennen */
			mysqli_close($con);
			
			return kataloge();
		}
		
		function getKatalogeForErsteller(int $accountID)
		{
			private kataloge();
			
			/* Verbindung zur Datenbank aufbauen */
			$con = mysqli_connect("","root");
			/* Datenbank für weitere Queries auswählen */
			mysqli_select_db($con, "klaraoppquiz");
	
			/* SQL-String erzeugen und anschließend an MySQL mittels der gerade geöffneten Verbindung übermitteln */
			$sql = "SELECT * FROM kataloge WHERE ERSTELLER_ID = " . accountID . ";";
			
			kataloge() = mysqli_query($con, $sql);
			
			/* Verbindung trennen */
			mysqli_close($con);
			
			return kataloge();
		}
		
		function createFrage($newFrage instanceof frage)
		{
			/* Verbindung zur Datenbank aufbauen */
			$con = mysqli_connect("","root");
			/* Datenbank für weitere Queries auswählen */
			mysqli_select_db($con, "klaraoppquiz");
	
			/* SQL-String erzeugen und anschließend an MySQL mittels der gerade geöffneten Verbindung übermitteln */
			$sql = "INSERT INTO fragen (KATALOG_ID, TEXT, ZEIT, BILD) values (" . frage.getKatalogID . ", " . frage.getText . ", " . frage.getZeit . ", " . frage.getBild . ");";
			
			mysqli_query($con, $sql);
			
			/* Verbindung trennen */
			mysqli_close($con);			
		}
		
		function updateFrage($changedFrage instanceof frage)
		{
			/* Verbindung zur Datenbank aufbauen */
			$con = mysqli_connect("","root");
			/* Datenbank für weitere Queries auswählen */
			mysqli_select_db($con, "klaraoppquiz");
	
			/* SQL-String erzeugen und anschließend an MySQL mittels der gerade geöffneten Verbindung übermitteln */
			$sql = "UPDATE fragen SET KATALOG_ID = '" . changedFrage.getKatalogID . "', TEXT = '" . changedFrage.getText . "', ZEIT = '" . changedFrage.getZeit . "', BILD = '" . changedFrage.getBild . "' WHERE ID = " .changedFrage.getID . ";";
			
			mysqli_query($con, $sql);
			
			/* Verbindung trennen */
			mysqli_close($con);				
		}
		
		function getFragen(int $katalogID)
		{			
			private fragen();
			
			/* Verbindung zur Datenbank aufbauen */
			$con = mysqli_connect("","root");
			/* Datenbank für weitere Queries auswählen */
			mysqli_select_db($con, "klaraoppquiz");
	
			/* SQL-String erzeugen und anschließend an MySQL mittels der gerade geöffneten Verbindung übermitteln */
			$sql = "SELECT * FROM fragen WHERE KATALOG_ID = " . katalogID . ";";
			
			fragen() = mysqli_query($con, $sql);
			
			/* Verbindung trennen */
			mysqli_close($con);
			
			return fragen();
		}
		
		function createAntwort($newAntwort instanceof antwort)
		{
			/* Verbindung zur Datenbank aufbauen */
			$con = mysqli_connect("","root");
			/* Datenbank für weitere Queries auswählen */
			mysqli_select_db($con, "klaraoppquiz");
	
			/* SQL-String erzeugen und anschließend an MySQL mittels der gerade geöffneten Verbindung übermitteln */
			$sql = "INSERT INTO antworten (FRAGE_ID, TEXT, KORREKT) values (" . newAntwort.getFrageID . ", " . newAntwort.getText . ", " . newAntwort.getKorrekt . ");";
			
			mysqli_query($con, $sql);
			
			/* Verbindung trennen */
			mysqli_close($con);			
		}
		
		function updateAntwort($changedAntwort instanceof antwort)
		{
			/* Verbindung zur Datenbank aufbauen */
			$con = mysqli_connect("","root");
			/* Datenbank für weitere Queries auswählen */
			mysqli_select_db($con, "klaraoppquiz");
	
			/* SQL-String erzeugen und anschließend an MySQL mittels der gerade geöffneten Verbindung übermitteln */
			$sql = "UPDATE antworten SET FRAGE_ID = '" . changedAntwort.getFrageID . "', TEXT = '" . changedAntwort.getText . "', KORREKT = '" . changedAntwort.getKorrekt . " WHERE ID = ". changedAntwort.getID . ";";
			
			mysqli_query($con, $sql);
			
			/* Verbindung trennen */
			mysqli_close($con);				
		}
		
		function getAntworten(int $frageID)
		{			
			private antworten();
			
			/* Verbindung zur Datenbank aufbauen */
			$con = mysqli_connect("","root");
			/* Datenbank für weitere Queries auswählen */
			mysqli_select_db($con, "klaraoppquiz");
	
			/* SQL-String erzeugen und anschließend an MySQL mittels der gerade geöffneten Verbindung übermitteln */
			$sql = "SELECT * FROM antworten WHERE FRAGE_ID = " . frageID . ";";
			
			antworten() = mysqli_query($con, $sql);
			
			/* Verbindung trennen */
			mysqli_close($con);
			
			return fragen();
		}
		
	}
?>