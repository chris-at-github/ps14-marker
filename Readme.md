# Ps14 Modulor
Beispiel TYPO3 Extension für die Erstellung neuer Module auf Basis von Fluid Styled Content.

## Implementierung
1. Repository unter neuem Extension Key clonen
2. .git Verzeichnis entfernen
3. Neues Git-Repository unter github.com anlegen
4. Git-Repository in Extension Verzeichnis einfügen und in PHPStorm registrieren
5. Ersetzung ps14_modulor, modulor und Ps14Modulor im gesamten Verzeichnis durch neuen Extension Key
6. Nötige Erweiterungen umsetzen

## Installation
1. TypoScript (Setup, Constants) der Extension unter ps14_site/Configuration/TypoScript/Extensions einbinden
2. Extension in public/typo3conf/ext/ps14_site/ext_emconf.php im Key constraints/suggests hinterlegen
3. Extension installieren