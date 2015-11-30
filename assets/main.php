<?php

function getWordsFromFile($filename) {
    $theFile = 'assets/'.$filename.'.txt';
    $words = file_get_contents($theFile);
    return $words;
}

function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '';
    }
    return $text;
}

function getFiles() {
    foreach (glob("assets/*.txt") as $filename) {
        $theFiles = explode('.',$filename);
        $realFiles = explode('/',$theFiles[0]);
        $nameOfFile[] = $realFiles[1];
    }
    return $nameOfFile;
}


function showParagraphs($words,$paragraphs,$wordType) {
    $fileTypes = getFiles(); 
    if ($wordType=="all") {
        foreach($fileTypes as $fileType) {
            $finalWords .= getWordsFromFile($fileType);
        }
    } else {
        $finalWords = getWordsFromFile($wordType);
    }   
    //$allSayings = explode('::',$finalWords);
    $allSayings = explode(PHP_EOL, $finalWords);
    $numSayings = count($allSayings);
    for ($paras=0;$paras<$paragraphs;$paras++) {
        for ($x=0;$x<$words;$x++) {
            $r = rand(0,$numSayings);
            $paragraph .= $allSayings[$r].' '; 
        }
        $paragraph = limit_text($paragraph,$words);
        $finalParagraphs .='<br /><br />'.$paragraph;
        unset($paragraph);
    }
    return $finalParagraphs;
}


?>
