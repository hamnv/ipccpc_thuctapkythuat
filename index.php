<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Convert IPC to CPC</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <script src="js/jquery-1.12.4.js"></script>
</head>
<body>
  <div class="page-content">
    <div class="container-fluid">
      <header class="section-header">
        <h2>Chuyển đổi IPC sang CPC</h2>
      </header>
      <section class="card">
        <div class="card-block">
          <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
              <th>IPC</th>
              <th>CPC1</th>
              <th>CPC2</th>
              <th>CPC3</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $doc = new DOMDocument;
                $doc->preserveWhiteSpace = false;
                $doc->load('IPCCPC-epoxif-201907.xml'); //IPCCPC-epoxif-201905
                $xpath = new DOMXPath($doc);
                if(empty($_POST['search'])){
                   $txtSearch = 'A01B1/00';
                }
                else{
                  $txtSearch = $_POST['search'];
                }
                $titles = $xpath->query("Doc/Fld[@name='IC']/Prg/Sen[starts-with(normalize-space(text()),\"$txtSearch\")]"); 
                $limit = 20;
                foreach ($titles as $i => $title)
                {
                  if($i >= $limit){
                    break;
                  }

               ?>
            <tr>
              <td> <?php 

      echo  $title->textContent;
      ?>
    </td><td>
      <?php

      echo  $title->parentNode->parentNode->nextSibling->childNodes[0]->childNodes[0]->textContent; ?> </td><td>
        <?php if(empty($title->parentNode->parentNode->nextSibling->childNodes[0]->childNodes[1]->textContent)){
          echo ".";
        } else{
           echo  $title->parentNode->parentNode->nextSibling->childNodes[0]->childNodes[1]->textContent; 
         } ?>
      </td><td>
        
        <?php if(empty($title->parentNode->parentNode->nextSibling->childNodes[0]->childNodes[2]->textContent)){
          echo ".";
        }
        else {
           echo  $title->parentNode->parentNode->nextSibling->childNodes[0]->childNodes[2]->textContent;
        }
      ?> </td> </tr>
      <?php } ?>
            </tbody>
           <div class="input-group">
             <form name="search" method="POST" action="index.php">
               <input name="search" type="text" id="tags" size="30" value="" class="col-xs-3" placeholder="
               <?php echo $txtSearch; ?>" />
               <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Chuyển đổi</button>
               </span>
            </div><br>
            <br>
            </form>
           </div>
          </table>
        </div>
      </section>
    </div>
  </div>
</body>
</html>