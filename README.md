Contao 3 - Anti SEO Hack
========================

Aus SEO Sicht ist es ungünstig, wenn eine Seite sowohl mit als auch ohne "index.php/" erreichbar ist, Stichwort "Duplicate Content". Um dem gerecht zu werden, wird ab Contao 2.9.0 bei eingeschalteter URL Umschreibung ein Zugriff auf eine URL mit "index.php/" nicht mehr die Seite angezeigt sondern auf ein Error 404 umgelenkt.

Das klingt im Prinzip richtig, hat aber 2 große Nachteile.

* Webseiten die vor dem Einschalten der URL Umschreibung bereits von Suchmaschinen indiziert wurden, haben nun falsche Links dort, Suchergebnisse zeigen nach Aufruf auf die Fehlerseite.
* Logauswertungen haben nachgewiesen, das sogar bei Webseiten die von Anfang an die URL Umschreibung eingeschaltet hatte, trotzdem von Suchmaschinen besucht werden und dabei die URL mit "index.php/" aufgerufen wird. Dazu gehört auch leider der GoogleBot.

Die Idee ist nun, statt der 404 Fehlermeldung die Zugriffe über eine permanente Umleitung auf die richtige URL zu lenken.

### Manuelle Installation

Der Inhalt vom `src` Verzeichnis muss nach `system/modules/` kopiert werden. Es muss also damit existieren: `system/modules/seo_hack_bugbuster/`.

### Hinweise
* composer.json ist nicht geprüft, composer Installation nicht getestet. Rückmeldung / Korrekturen erwünscht.

