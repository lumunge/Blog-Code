<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
	@media print {
		 #printbtn {
        display :  none;
    }
  * {
    display: none;
  }
  #printableTable {
    display: block;
  }
		.no-print{
			display: none;
		}
}
	</style>

</head>

<body>

	

<section runat="server">
    <title>Print Page</title>
    <script type="text/javascript">
        function print_page() {
            var ButtonControl = document.getElementById("btnprint");
            ButtonControl.style.visibility = "hidden";
            window.print();
        }
    </script>
<br>
<br>
<br>
<?php
$name = $location = "";

if (isset($_POST['name'])) {
  $name = $_POST['name'];
}
if (isset($_POST['location'])) {
  $location = $_POST['location'];
}
?>
<h1>Hello <?php echo $_POST["name"]; ?>!<br>
 Your mail is <?php echo $_POST["location"]; ?>.</h1>
<br>
<br>
<br>
<div>
    <strong>Hello world</strong><br/>
    <input type="button" id="btnprint" value="Print this Page" onclick="print_page()" />

    </div>
</section>


 
</body>
</html>