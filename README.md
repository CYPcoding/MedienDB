# MedienDB

## Projekt-Organisation

**Patrick -> HTML-Man**

- Verantwortlich dass HTML zu 100% "verhebed".
- Verantwortlich dass Suche HTML-mässig funktionert


**Marcel -> PHP-Teil**

- Verantwortlich für Login/DB 
- Verantwortlich für einzelne PHP-Codesnippets (einfache If-Überprüfungen) *siehe Issue-List*
- Verantwortlich dass Suchfunktion PHP-mässig funktioniert


**Vlado -> PHP-Teil und Code-Verwalter**

- Verantwortlich für alle anderen PHP-Teile (Eigen-entwickeltes Framework, Loads, etc.)
- Code-Verwaltung


## Code

### .htaccess
Damit die Weiterleitungen funktionieren muss zwingend die .htaccess-Datei mitgeladen werden. Es kann sein, dass je nach XAMPP/MAMP-Konfiguration bzw. deren Apache-Einstellungen zuerst die Datei zugelassen werden kann.

Dazu könnt ihr überprüfen ob in der Datei *apache/config/httpd.conf* die Zeile *AllowOverride* auf *All* gesetzt ist.

