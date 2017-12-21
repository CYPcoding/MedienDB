# MedienDB

## Projekt-Organisation

**Patrick -> HTML-Superman**

- Verantwortlich dass HTML zu 100% "verhebed"
- Verantwortlich dass Suche HTML-mässig funktionert


**Marcel -> PHP-Hero**

- Verantwortlich für Login/DB 
- Verantwortlich für einzelne PHP-Codesnippets (einfache If-Überprüfungen) *siehe Issue-List*
- Verantwortlich dass Suchfunktion PHP-mässig funktioniert


**Vlado -> PHP- und JS-Geek**

- Verantwortlich für alle anderen PHP-Teile (Eigen-entwickeltes Framework, Loads, etc.)
- Verantwortlich für die UX (z.B. Filtering etc.)
- Code-Verwaltung

## Timeline

bis

08.12.17 | Grund-System fertig (alle Issues "enhancement" abgeschlossen)

15.12.17 | Korrekturen und Bugs alle behoben

           Puffer
         
22.12.17 | MedienDB fertig

anschliessend | Formalitäten abschliessen für Projekt-Abschluss @FHNW


## Code

### Aufbau

```
.
├── assets (Beinhaltet Styling, Bilder und JavaScript)
│   └── css
│   └── img
│   └── js
│   
└── include (Die Teile der App, die auf jeder Seite verwendet werden)
│   └── header.php
│   └── get_userdetails.php
│   └── footer.php
│   
└── meta (Die Teile der App, die im Head der einzelnen Seiten spezifisch sind)
│   └── (.. gleich wie bei /page ..)
│   
└── page (Die Teile der App, die pro Seite spezifisch sind)
│   └── benutzerverwaltung.php (Benutzerliste und Funktion "neuen Benutzer anlegen")
│   └── bilder.php (Ansicht und Suchmaske BilderDB)
│   └── login.php (Login-Formular wenn Benutzer nicht angemeldet)
│   └── logout.php (Abmeldung vom System)
│   └── pwforgot.php (Formular, um sich ein neues Passwort zusenden zu lassen)
│   └── rangliste.php (Top 10 Bilder Statistik)
│   └── upload.php (Auswahlseite für Bild- und Video-Upload)
│   └── uploadimg.php (Upload- und Tagging-Formular für Bilder)
│   └── uploadvid.php (Upload- und Tagging-Formular für Videos)
│   └── userprofile.php (Im "Mein Konto" werden die eigenen Verwendungen der Bilder angezeigt)
│   └── videos.php (Ansicht und Suchmaske VideoDB)
│   
└── .htaccess (Wichtig für Weiterleitungen (URL-Rewrite))
│   
└── README.md (Beinhaltet diese Text-Datei)
│   
└── index.php (Framework)
```

**Aufbau Framework**

Die index.php ruft nur die einzelnen Komponenten auf (Header, Page-Inhalt und Footer). Header und Footer sind im Ordner `include` abgelegt. Die spezifischen Inhalte werden aus dem Folder `page` geladen.

**Aufbau Datenbank**

*Datenbank-Design*

![Datenbank-Design](https://github.com/CYPcoding/MedienDB/blob/dev-login/trash/DatabaseDesign.JPG?raw=true)


### .htaccess
Damit die Weiterleitungen funktionieren muss zwingend die .htaccess-Datei mitgeladen werden. Es kann sein, dass je nach XAMPP/MAMP-Konfiguration bzw. deren Apache-Einstellungen zuerst die Datei zugelassen werden kann.

Dazu könnt ihr überprüfen ob in der Datei *apache/config/httpd.conf* die Zeile *AllowOverride* auf *All* gesetzt ist.

### Konventionen

#### GitHub
Alle Commits-Beschreibungen in der Präsenzform erfassen. Z.B. "Fixes Login-Problem" statt "Fixed Login-Problem"
