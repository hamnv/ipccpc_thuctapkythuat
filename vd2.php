<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Convert IPC to CPC</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <!-- CSS -->
  <link href='css/style.css' rel='stylesheet' type='text/css'>
  <!-- Script -->
  <script src="js/jquery.min.js"></script>
  <script src='js/bootstrap.min.js' type='text/javascript'></script>

</head>
<body>
  <div class="page-content">
    <div class="container-fluid">
      <header class="section-header">
        <h2>Chuyển đổi IPC sang CPC</h2>
      </header>
      <section class="card">
        <div class="card-block">
           <!-- Modal -->
   <div class="modal fade" id="empModal" role="dialog">
    <div class="modal-dialog">
 
     <!-- Modal content-->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Chuyển đổi IPC -> CPC</h4>
      </div>
      <div class="modal-body">
        sajkdhjdhjkshdjkashdjkashjk
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
     </div>
    </div>
   </div>
          <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
              <th>IPC</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $doc = new DOMDocument;
                $doc->preserveWhiteSpace = false;
                $doc->load('IPCCPC-epoxif-201905.xml'); //IPCCPC-epoxif-201905
                $xpath = new DOMXPath($doc);
                if(empty($_POST['userid'])){
                   $txtSearch = 'A01B1/0';
                }
                else{
                  $txtSearch = $_POST['userid'];
                }
                $titles = $xpath->query("Doc/Fld[@name='IC']/Prg/Sen[contains(text(),\"$txtSearch\")]"); 
                foreach ($titles as $title)
                {
               ?>
            <tr>
              <td> <?php 

      echo  $title->textContent;
      echo "<button id='".$title->textContent."' class='ipcinfo'> Convert</button>";
      ?>
    </td> <!--<td>
     <?php

      echo  $title->parentNode->parentNode->nextSibling->childNodes[0]->childNodes[0]->textContent; ?> </td><td>
        <?php 
      echo  $title->parentNode->parentNode->nextSibling->childNodes[0]->childNodes[1]->textContent; ?> </td><td>
        
        <?php if(empty($title->parentNode->parentNode->nextSibling->childNodes[0]->childNodes[2]->textContent)){
          echo ".";
        }
        else {
           echo  $title->parentNode->parentNode->nextSibling->childNodes[0]->childNodes[2]->textContent;
        }
      ?> </td> -->
      <?php } ?></tr>
            </tbody>
           <div class="input-group">
             <form name="search" method="POST" action="index.php">
               <input name="search" type="text" id="tags" size="30" value="" class="col-xs-3" placeholder="A01B1/00" />
               <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Chuyển đổi</button>
               </span>
            </div><br>
            <br>
            </form>
            <script type="text/javascript">
              $(document).ready(function(){

 $('.ipcinfo').click(function(){
   var id = this.id;
   var splitid = id.split(' ');
   var ipc = splitid[0];

   // AJAX request
   $.ajax({
    url: 'ajax.php',
    type: 'post',
    data: {ipc: ipc},
    success: function(response){ 
      // Add response in Modal body
      $('.modal-body').html(response);

      // Display Modal
      $('#empModal').modal('show'); 
    }
  });
 });
});
            </script>
           </div>
          </table>
        </div>
      </section>
    </div>
  </div>
</body>
</html>-