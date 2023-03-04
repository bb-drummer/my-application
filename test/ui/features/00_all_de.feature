# language: de
# encoding: utf-8
# ./features/00_all_de.feature

Funktionalität: Zeige alle Seiten
  Alle Seiten sollen nacheinander angezeigt werden.

  @development
  Szenario: Homepage anzeigen
    Wenn ich die URL "https://dev.bjoernbartels.earth/" öffne
    Dann bin ich auf der Startseite
    Dann wird der Footer gezeigt
    Dann wird der Hintergrund gezeigt
    Dann wird der "legal" Link gezeigt
    Dann wird der "mailto" Link gezeigt
    Dann wird der "twitter" Link gezeigt
    Dann wird der "youtube" Link gezeigt
    Dann wird der "linkedin" Link gezeigt
    Dann wird der "xing" Link gezeigt
    Dann wird der "gitlab" Link gezeigt
    Dann wird das Analytics Script generiert

  @development
  Szenario: Impressum anzeigen
    Wenn ich die URL "https://dev.bjoernbartels.earth/legal.html" öffne
    Dann bin ich auf der Impressumseite
    Dann wird der Footer gezeigt
    Dann wird der Hintergrund gezeigt

  @development  
  Szenario: Impressum navigieren
    Wenn ich die URL "https://dev.bjoernbartels.earth/" öffne
    Dann bin ich auf der Startseite
    Wenn ich den "legal" Link öffne 
    Dann bin ich auf der Impressumseite
    Dann wird der Footer gezeigt
    Dann wird der Hintergrund gezeigt
    Dann wird die Navigation auf der Impressumseite gezeigt
    Dann wird der "back" Link gezeigt
    Dann wird die "DE" Sprachauswahl gezeigt
    Dann wird die "EN" Sprachauswahl gezeigt
    Dann wird die "FR" Sprachauswahl gezeigt
    Wenn ich die Sprache "DE" wähle
    Dann wird die Sprache "DE" gezeigt
    Wenn ich die Sprache "EN" wähle
    Dann wird die Sprache "EN" gezeigt
    Wenn ich die Sprache "FR" wähle
    Dann wird die Sprache "FR" gezeigt
    Wenn ich den "back" Link öffne
    Dann bin ich auf der Startseite

  @development
  Szenario: Fehlerseite anzeigen
    Wenn ich die URL "https://dev.bjoernbartels.earth/some-error" öffne
    Dann bin ich auf der Fehlerseite
    Dann wird kaputtes Glas gezeigt (1)
    Dann wird kaputtes Glas gezeigt (2)
    Dann wird der Footer gezeigt
    Dann wird der Hintergrund gezeigt

  @staging
  Szenario: Homepage anzeigen
    Wenn ich die URL "https://beta.bjoernbartels.earth/" öffne
    Dann bin ich auf der Startseite
    Dann wird der Footer gezeigt
    Dann wird der Hintergrund gezeigt
    Dann wird der "legal" Link gezeigt
    Dann wird der "mailto" Link gezeigt
    Dann wird der "twitter" Link gezeigt
    Dann wird der "youtube" Link gezeigt
    Dann wird der "linkedin" Link gezeigt
    Dann wird der "xing" Link gezeigt
    Dann wird der "gitlab" Link gezeigt
    Dann wird das Analytics Script generiert

  @staging
  Szenario: Impressum anzeigen
    Wenn ich die URL "https://beta.bjoernbartels.earth/legal.html" öffne
    Dann bin ich auf der Impressumseite
    Dann wird der Footer gezeigt
    Dann wird der Hintergrund gezeigt

  @staging  
  Szenario: Impressum navigieren
    Wenn ich die URL "https://beta.bjoernbartels.earth/" öffne
    Dann bin ich auf der Startseite
    Wenn ich den "legal" Link öffne 
    Dann bin ich auf der Impressumseite
    Dann wird der Footer gezeigt
    Dann wird der Hintergrund gezeigt
    Dann wird die Navigation auf der Impressumseite gezeigt
    Dann wird der "back" Link gezeigt
    Dann wird die "DE" Sprachauswahl gezeigt
    Dann wird die "EN" Sprachauswahl gezeigt
    Dann wird die "FR" Sprachauswahl gezeigt
    Wenn ich die Sprache "DE" wähle
    Dann wird die Sprache "DE" gezeigt
    Wenn ich die Sprache "EN" wähle
    Dann wird die Sprache "EN" gezeigt
    Wenn ich die Sprache "FR" wähle
    Dann wird die Sprache "FR" gezeigt
    Wenn ich den "back" Link öffne
    Dann bin ich auf der Startseite

  @staging
  Szenario: Fehlerseite anzeigen
    Wenn ich die URL "https://beta.bjoernbartels.earth/some-error" öffne
    Dann bin ich auf der Fehlerseite
    Dann wird kaputtes Glas gezeigt (1)
    Dann wird kaputtes Glas gezeigt (2)
    Dann wird der Footer gezeigt
    Dann wird der Hintergrund gezeigt

  @production
  Szenario: Homepage anzeigen
    Wenn ich die URL "https://bjoernbartels.earth/" öffne
    Dann bin ich auf der Startseite
    Dann wird der Footer gezeigt
    Dann wird der Hintergrund gezeigt
    Dann wird der "legal" Link gezeigt
    Dann wird der "mailto" Link gezeigt
    Dann wird der "twitter" Link gezeigt
    Dann wird der "youtube" Link gezeigt
    Dann wird der "linkedin" Link gezeigt
    Dann wird der "xing" Link gezeigt
    Dann wird der "gitlab" Link gezeigt
    Dann wird das Analytics Script generiert

  @production
  Szenario: Impressum anzeigen
    Wenn ich die URL "https://bjoernbartels.earth/legal.html" öffne
    Dann bin ich auf der Impressumseite
    Dann wird der Footer gezeigt
    Dann wird der Hintergrund gezeigt

  @production  
  Szenario: Impressum navigieren
    Wenn ich die URL "https://bjoernbartels.earth/" öffne
    Dann bin ich auf der Startseite
    Wenn ich den "legal" Link öffne 
    Dann bin ich auf der Impressumseite
    Dann wird der Footer gezeigt
    Dann wird der Hintergrund gezeigt
    Dann wird die Navigation auf der Impressumseite gezeigt
    Dann wird der "back" Link gezeigt
    Dann wird die "DE" Sprachauswahl gezeigt
    Dann wird die "EN" Sprachauswahl gezeigt
    Dann wird die "FR" Sprachauswahl gezeigt
    Wenn ich die Sprache "DE" wähle
    Dann wird die Sprache "DE" gezeigt
    Wenn ich die Sprache "EN" wähle
    Dann wird die Sprache "EN" gezeigt
    Wenn ich die Sprache "FR" wähle
    Dann wird die Sprache "FR" gezeigt
    Wenn ich den "back" Link öffne
    Dann bin ich auf der Startseite

  @production
  Szenario: Fehlerseite anzeigen
    Wenn ich die URL "https://bjoernbartels.earth/some-error" öffne
    Dann bin ich auf der Fehlerseite
    Dann wird kaputtes Glas gezeigt (1)
    Dann wird kaputtes Glas gezeigt (2)
    Dann wird der Footer gezeigt
    Dann wird der Hintergrund gezeigt