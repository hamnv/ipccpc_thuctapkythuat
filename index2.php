<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Convert IPC to CPC</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.12.4.js"></script>
  <style>

.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#ipc-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#ipc-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#ipc-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
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
                $doc->load('IPCCPC-epoxif-201905.xml'); //IPCCPC-epoxif-201905
                $xpath = new DOMXPath($doc);
                if(empty($_POST['search'])){
                   $txtSearch = 'A01B1/00';
                   $plh = "IPC";
                }
                else{
                  $txtSearch = $_POST['search'];
                  $plh = $txtSearch;
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
  <form method="post" action="index2.php" autocomplete="off">
  <input type="text" id="search-box" placeholder="<?php echo $plh;?>" name="search" size="30" value="" class="col-xs-3"/>  <span class="input-group-btn">
                    <br><button class="btn btn-default" type="submit">Chuyển đổi</button>
               </div>
  <div id="suggesstion-box"></div>
</form><br>
            <script type="text/javascript">
              // AJAX call for autocomplete 
$(document).ready(function(){
  $("#search-box").keyup(function(){
    $.ajax({
    type: "POST",
    url: "autocomplete.php",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#search-box").css("background","#FFF");
    }
    });
  });
});
//To select country name
function selectCountry(val) {
   var id = val;
   var splitid = id.split(' ');
   var ipc = splitid[0];
$("#search-box").val(ipc);
$("#suggesstion-box").hide();
}
            </script>
           </div>
          </table>
        </div>
      </section>
    </div>
  </div>
</body>
</html>