<!DOCTYPE html>
<html>
<head>
<title>Điền form</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<script src="js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
    <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
 <script>
function goBack() {
  window.history.back();
}
</script>
<style>
	.modalDialog {
        position: fixed;
        font-family: Arial, Helvetica, sans-serif;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0,0,0,0.8);
        z-index: 99999;
        opacity:0;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
        pointer-events: none;
    }
 
.modalDialog:target {
        opacity:1;
        pointer-events: auto;
    }
 
.modalDialog > div {
        width: 400px;
        position: relative;
        margin: 10% auto;
        padding: 5px 20px 13px 20px;
        border-radius: 10px;
        background: #fff;
        background: -moz-linear-gradient(#fff, #999);
        background: -webkit-linear-gradient(#fff, #999);
        background: -o-linear-gradient(#fff, #999);
    }
 
.close {
        background: #606061;
        color: #FFFFFF;
        line-height: 25px;
        position: absolute;
        right: -12px;
        text-align: center;
        top: -10px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border-radius: 12px;
        -moz-box-shadow: 1px 1px 3px #000;
        -webkit-box-shadow: 1px 1px 3px #000;
        box-shadow: 1px 1px 3px #000;
    }
 
.close:hover { background: #00d9ff; }
</style>
</head>
<body>
<div class="container">

    <div class="breadcrumb"> Xem lại bản đăng ký </div>
    <div id="divToPrint">
         <div class="form-control">
            <label> <b> Họ và tên: </b>  <?php
        echo $_POST['name'];?> </label> <br>
        <label> <b> Tên sáng chế: </b>  <?php
        echo $_POST['invent'];?> </label> <br> <hr>
        <label> <b> Mô tả: </b></label> <br>
        <?php
        echo $_POST['description'];

        ?>  
        </div>
    </div>
    <br>
    
     <input class="btn btn-success" type="button" value="Gửi thông tin"/>  <input class="btn btn-primary" type="button" value="In phiếu" onclick="PrintDiv();" />  <a href="#" onclick="goBack()" class="btn btn-secondary"> Quay lại</a>
</div>
</body>
</html>