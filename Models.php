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
			$this->Passwort = $Passwort;
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
	
?>