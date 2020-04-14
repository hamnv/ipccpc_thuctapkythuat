<?php
$doc = new DOMDocument;
                $doc->preserveWhiteSpace = false;
                $doc->load('IPCCPC-epoxif-201905.xml'); //IPCCPC-epoxif-201905
                $xpath = new DOMXPath($doc);
                if(empty($_POST['keyword'])){
                   $txtSearch = 'A01B1/00';
                }
                else{
                  $txtSearch = $_POST['keyword'];
                }
                $titles = $xpath->query("Doc/Fld[@name='IC']/Prg/Sen[starts-with(normalize-space(text()),\"$txtSearch\")]"); 
                $limit = 5;
                foreach ($titles as $i => $title)
                {
                  if($i >= $limit){
                    break;
                  }

               
?>
<ul id="ipc-list">
<li ><a href="#" onClick="selectCountry('<?php echo $title->textContent; ?>');"><?php echo $title->textContent; ?></a></li>
<?php } ?>
</ul>
