<?php
# Gesamter Quellcode dieser Datei frei von KI-generierten Inhalten.

    $kontonummer = "DE89 3704 0044";

    echo 'Zu prüfende Kontonummer: '.$kontonummer."\n";

    $kontonummer = str_replace(' ', '', $kontonummer);
    $kontonummerLength = strlen($kontonummer);

    echo 'Kontonummer ohne Leerzeichen: '.$kontonummer."\n";

    echo 'Länge korrekt: ';

    if(strlen($kontonummer) != 12){
        echo 'Die Kontonummer ist UNGÜLTIG!';
        return;
    }
   
    echo 'JA ('.$kontonummerLength.' Zeichen)'."\n";

    $laendercodeChars = [$kontonummer[0], $kontonummer[1]];

    echo 'Ländercode korrekt: ';

    if($laendercodeChars[0] != 'D' || $laendercodeChars[1] != 'E'){
        echo 'Die Kontonummer ist UNGÜLTIG!';
        return;
    }
    
    echo 'JA ('.$laendercodeChars[0].$laendercodeChars[1].')'."\n";

    echo 'Prüfziffer und Kontonummer sind Zahlen: ';

    $kontonummerWithoutLaendercode = "";

    for ($i = 2; $i < $kontonummerLength; $i++) {
        $kontonummerWithoutLaendercode .= $kontonummer[$i];
    }

    for($i = 0; $i < strlen($kontonummerWithoutLaendercode); $i++){
        $asciiValue = ord($kontonummerWithoutLaendercode[$i]);

        if($asciiValue < 48 || $asciiValue > 57){
            echo 'Die Kontonummer ist UNGÜLTIG!';
            return;
        }
    }

    echo 'JA ('.$kontonummerWithoutLaendercode.')'."\n";

    $kontonummerSum = 0;
    for($i = 0; $i < strlen($kontonummerWithoutLaendercode); $i++){
        $kontonummerSum += intval($kontonummerWithoutLaendercode[$i]);
    }

    echo 'Summe der Ziffern: '.$kontonummerSum."\n";

    echo 'Teilbar durch 9: ';

    if($kontonummerSum % 9 != 0){
        echo 'NEIN'."\n";
        echo 'Die Kontonummer ist UNGÜLTIG!';
        return;
    }

    echo 'JA'."\n";

    echo 'Die Kontonummer ist GÜLTIG!';