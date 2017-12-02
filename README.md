# MedienDB

## Projekt-Organisation

**Patrick -> HTML-Superman**

- Verantwortlich dass HTML zu 100% "verhebed"
- Verantwortlich dass Suche HTML-mässig funktionert


**Marcel -> PHP-Hero**

- Verantwortlich für Login/DB 
- Verantwortlich für einzelne PHP-Codesnippets (einfache If-Überprüfungen) *siehe Issue-List*
- Verantwortlich dass Suchfunktion PHP-mässig funktioniert


**Vlado -> PHP-Geek**

- Verantwortlich für alle anderen PHP-Teile (Eigen-entwickeltes Framework, Loads, etc.)
- Code-Verwaltung


## Code

### Aufbau
```
+-- _assets (Beinhaltet Styling, Bilder und JavaScript)
|   +-- css
|   +-- img
|   +-- js
+-- _include (Die Teile der App, die auf jeder Seite verwendet werden)
|   +-- header.php
|   +-- footer.php
+-- _page (Die Teile der App, die pro Seite spezifisch sind)
|   +-- login.php (Login-Formular wenn Benutzer nicht angemeldet)
|   +-- medienuebersicht.php (Standardansicht aller Medien)
|   +-- upload.php (Auswahlseite für Bild- und Video-Upload)
+-- .htaccess (Wichtig für Weiterleitungen (URL-Rewrite))
+-- README.md (Beinhaltet diese Text-Datei)
+-- index.php (Framework)
```

**Aufbau Framework**
Die index.php ruft nur die einzelnen Komponenten auf (Header, Page-Inhalt und Footer). Header und Footer sind im Ordner `include` abgelegt. Die spezifischen Inhalte werden aus dem Folder `page` geladen.


### .htaccess
Damit die Weiterleitungen funktionieren muss zwingend die .htaccess-Datei mitgeladen werden. Es kann sein, dass je nach XAMPP/MAMP-Konfiguration bzw. deren Apache-Einstellungen zuerst die Datei zugelassen werden kann.

Dazu könnt ihr überprüfen ob in der Datei *apache/config/httpd.conf* die Zeile *AllowOverride* auf *All* gesetzt ist.

### Konventionen

#### GitHub
Alle Commits-Beschreibungen in der Präsenzform erfassen. Z.B. "Fixes Login-Problem" statt "Fixed Login-Problem"
