# language: de
# encoding: utf-8
# ./features/00_all_de.feature

Funktionalität: Zeige alle Seiten
  Alle Seiten sollen nacheinander angezeigt werden.


  @local @development @staging @production
  Szenario: Homepage anzeigen
    Wenn die Seite "homepage" aufgerufen wird
    Dann wird die Seite "homepage" angezeigt
    Dann wird das Element "header" auf der Seite "homepage" angezeigt
    Dann wird das Element "footer" auf der Seite "homepage" angezeigt
    Dann wird das Element "background" auf der Seite "homepage" angezeigt
    Dann wird das Element "analytics" auf der Seite "homepage" angezeigt
    Dann wird der CTA "mailto" auf der Seite "homepage" angezeigt
    Dann wird der CTA "twitter" auf der Seite "homepage" angezeigt
    Dann wird der CTA "youtube" auf der Seite "homepage" angezeigt
    Dann wird der CTA "linkedin" auf der Seite "homepage" angezeigt
    Dann wird der CTA "xing" auf der Seite "homepage" angezeigt
    Dann wird der CTA "gitlab" auf der Seite "homepage" angezeigt
    Dann wird der CTA "legal" auf der Seite "homepage" angezeigt
    Dann wird der CTA "derbongen" auf der Seite "homepage" angezeigt
    Dann wird ein Screenshot "test" von der Seite "homepage" gespeichert


  @local @development @staging @production
  Szenario: Impressum anzeigen
    Wenn die Seite "homepage" aufgerufen wird
    Wenn der CTA "legal" auf der Seite "homepage" ausgelösst wird 
    Dann wird die Seite "imprint" angezeigt
    Dann wird das Element "footer" auf der Seite "imprint" angezeigt
    Dann wird das Element "background" auf der Seite "imprint" angezeigt
    Dann wird das Element "analytics" auf der Seite "imprint" angezeigt
    Dann wird das Element "navigation" auf der Seite "imprint" angezeigt
    Dann wird die Sprachauswahl "DE" auf der Seite "imprint" angezeigt
    Dann wird die Sprachauswahl "EN" auf der Seite "imprint" angezeigt
    Dann wird die Sprachauswahl "FR" auf der Seite "imprint" angezeigt
    Dann wird der CTA "back" auf der Seite "homepage" angezeigt
    Dann wird ein Screenshot "test" von der Seite "imprint" gespeichert
    Wenn die Sprache "DE" auf der Seite "imprint" ausgewählt wird
    Dann wird die Sprache "DE" auf der Seite "imprint" angezeigt
    Dann wird ein Screenshot "test-de" von der Seite "imprint" gespeichert
    Wenn die Sprache "EN" auf der Seite "imprint" ausgewählt wird
    Dann wird die Sprache "EN" auf der Seite "imprint" angezeigt
    Dann wird ein Screenshot "test-en" von der Seite "imprint" gespeichert
    Wenn die Sprache "FR" auf der Seite "imprint" ausgewählt wird
    Dann wird die Sprache "FR" auf der Seite "imprint" angezeigt
    Dann wird ein Screenshot "test-fr" von der Seite "imprint" gespeichert
    Wenn der CTA "back" auf der Seite "imprint" ausgelösst wird 
    Dann wird die Seite "homepage" angezeigt


  @local @development @staging @production
  Szenario: Fehlerseite 404 anzeigen
    Wenn die Seite "errorpage-404" aufgerufen wird
    Dann wird die Seite "errorpage-404" angezeigt
    Dann wird das Element "header" auf der Seite "homepage" angezeigt
    Dann wird das Element "footer" auf der Seite "errorpage-404" angezeigt
    Dann wird das Element "background" auf der Seite "errorpage-404" angezeigt
    Dann wird das Element "broken glas" auf der Seite "errorpage-404" angezeigt
    Dann wird das Element "analytics" auf der Seite "errorpage-404" angezeigt
    Dann wird ein Screenshot "test" von der Seite "errorpage-404" gespeichert

  @local @development @staging @production
  Szenario: Fehlerseite 50x anzeigen
    Wenn die Seite "errorpage-50x" aufgerufen wird
    Dann wird die Seite "errorpage-50x" angezeigt
    Dann wird das Element "header" auf der Seite "homepage" angezeigt
    Dann wird das Element "footer" auf der Seite "errorpage-50x" angezeigt
    Dann wird das Element "background" auf der Seite "errorpage-50x" angezeigt
    Dann wird das Element "broken glas" auf der Seite "errorpage-50x" angezeigt
    Dann wird das Element "analytics" auf der Seite "errorpage-50x" angezeigt
    Dann wird ein Screenshot "test" von der Seite "errorpage-50x" gespeichert

  @development @staging @production
  Szenario: generische Fehlerseite anzeigen
    Wenn die Seite "errorpage" aufgerufen wird
    Dann wird die Seite "errorpage" angezeigt
    Dann wird das Element "header" auf der Seite "homepage" angezeigt
    Dann wird das Element "footer" auf der Seite "errorpage" angezeigt
    Dann wird das Element "background" auf der Seite "errorpage" angezeigt
    Dann wird das Element "broken glas" auf der Seite "errorpage" angezeigt
    Dann wird das Element "analytics" auf der Seite "errorpage" angezeigt
    Dann wird ein Screenshot "test" von der Seite "errorpage" gespeichert
