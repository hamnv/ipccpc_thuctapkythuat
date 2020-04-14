<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="jquery.twbsPagination.min.js"></script>
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
</head>
<body>


             
		<h2>Nhập vào IPC</h2>
				<div class="form-group">
			 	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Nhập mã IPC">
			 </div>
			


	<hr>
	<table id="employee" class="table table-bordered table table-hover" cellspacing="0" width="100%">
     <colgroup><col><col><col></colgroup>
      <thead>
      <tr>
            <th>ICP</th>
            <th >CPC1</th>
            <th>CPC2</th>
            <th>CPC3</th>
      </tr>
     
     
<?php
	$doc = new DOMDocument;
	$doc->preserveWhiteSpace = false;
	$doc->load('test.xml'); //IPCCPC-epoxif-201905
	$xpath = new DOMXPath($doc);
	$titles = $xpath->query('Doc'); 
	foreach ($titles as $title)
	{
    ?>  <td> <?php 


		  echo  $title->firstChild->textContent;
      ?>
    </td><td>
      <?php

   	  echo  $title->lastChild->childNodes[0]->childNodes[0]->textContent; ?> </td><td>
        <?php 
    	echo  $title->lastChild->childNodes[0]->childNodes[1]->textContent; ?> </td><td>
        <?php 
    	echo  $title->lastChild->childNodes[0]->childNodes[2]->textContent; ?> </td> </tr>
   		<?php } ?>

 </thead>
      <tbody id="emp_body">
</tbody>
</table>
 </body>
 </html>