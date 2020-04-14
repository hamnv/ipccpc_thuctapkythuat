<!DOCTYPE html>
<html>
<head>
<title>Điền form</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
	<div class="main">
<div class="form-group">
<form method="POST" action="form2.php" form="edit" autocomplete="off">
<label for="name">Họ và Tên:</label>
<input type="text" class="form-control" name="name">
<label for="name">Tên sáng chế: </label>
<input type="text" class="form-control" name="invent">
<label for="Infomation"> Thông tin </label>
<textarea class="ckeditor" name="description" id="editor1"></textarea>
<script type="text/javascript">
	CKEDITOR.replace( 'editor1' );
</script>
<br>
<input class="btn btn-rounded btn-primary" type="submit" value="Xác nhận"/>
</form>
</div>
</div>
</div>
</body>
</html>