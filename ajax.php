<?php
$doc = new DOMDocument;
$doc->preserveWhiteSpace = false;
$doc->load('IPCCPC-epoxif-201905.xml'); //IPCCPC-epoxif-201905
$xpath = new DOMXPath($doc);
if(empty($_POST['ipc'])){
    $ipc = "A01B1/02";
}else{
  $ipc = $_POST['ipc'];  
}
$titles = $xpath->query("Doc/Fld[@name='IC']/Prg/Sen[contains(text(),\"$ipc\")]"); 
    foreach ($titles as $title)
        {
        echo "<b>IPC: </b>".$title->textContent."<br>";
        echo "<b>CPC1: </b>".$title->parentNode->parentNode->nextSibling->childNodes[0]->childNodes[0]->textContent."<br>";
        echo "<b>CPC2: </b>".$title->parentNode->parentNode->nextSibling->childNodes[0]->childNodes[1]->textContent."<br>";
        if(empty($title->parentNode->parentNode->nextSibling->childNodes[0]->childNodes[2]->textContent)){
          echo "<br>"; }
        else{
            echo  "<b>CPC3: </b>".$title->parentNode->parentNode->nextSibling->childNodes[0]->childNodes[2]->textContent."<br>";
        }
    }
    
exit;
?>