# Inventar Changelog

## Version 0.2.2 (2025-11-11)

* Add: tl_inventar.room und .inventarnummer sortierbar

## Version 0.2.1 (2025-03-10)

* Add: tl_inventar.info -> Feld für Bemerkungen/Informationen
* Add: tl_inventar.dealer -> Feld für Händler
* Inventarliste: Kaufbetrag vor Eurozeichen mit geschütztem Leerzeichen, damit kein Umbruch erfolgt

## Version 0.2.0 (2025-02-04)

* Change: Inventarnummer sechsstellig ohne Punkte statt siebenstellig mit Punkten
* Change: tl_inventar.documentDate mit leerem als Standard statt aktuellen Datum
* Change: tl_inventar.usefulLifeYears (Nutzungsdauer) -> Standard auf leer statt 0
* Add: tl_inventar_hersteller und tl_inventar_mitarbeiter
* Add: Filter für alle Kategorien
* Add: Anschaffungspreis in Inventarauflistung
* Add: Kaufdatum Flag setzen, damit Filter funktioniert + Datum in Inventarliste anzeigen
* Change: Feld Anschaffungswert benutzerfreundlich formatieren: Standard = leer, wenn gefüllt mit zwei Nachkommastellen
* Change: Bereich Standort und Kategorien mit w50 statt long formatiert, da zuviel Platzverschwendung
* Add: Felder für Anlagennummer, Seriennummer, Gerätenummer, Baujahr

## Version 0.1.1 (2025-02-03)

* Add: tl_inventar.inventarnummer -> Ausgabe der Inventarnummer auf Grundlage der Datensatz-ID
* Add: tl_inventar -> weitere Eingabefelder analog einer DSB-Inventarliste von 2011

## Version 0.1.0 (2025-01-28)

* Change: Ausbau der Erweiterung

## Version 0.0.5 (2025-01-24)

* Fix: Attempted to load class "Backend" from the global namespace.

## Version 0.0.4 (2025-01-24)

* Fix: Undefined constant "VERSION" 

## Version 0.0.3 (2025-01-24)

* Delete: tl_inventar.singleSRC entfernt

## Version 0.0.2 (2025-01-24)

* Fix: Attempted to load class "Config" from the global namespace. Did you forget a "use" statement for "League\Flysystem\Config"? 

## Version 0.0.1 (2025-01-23)

* Initiale Version für Contao 5
