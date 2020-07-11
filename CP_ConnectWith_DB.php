<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Meeting#2, Task#2</title>
</head>
<style>
.inp1{
margin-left:19px;
margin-bottom:3px;
}
.inp2{
margin-left:28px;
margin-top:3px;
}
.container {
	 margin: auto;
	 margin-left: 5px;
	 margin-right: 5px;
	 display: flex;
	 justify-content: center;
	 align-items: center;
	}
</style>
<body>
	<h1 style="text-align:center"> Robot movement steps: </h1>
	<div class="container">
	<form action="dss.php" method="post">
    <label>Right: <input name = "right" value="0" id = "right" type = "text" size = "5" class="inp1"/></label>
	<br>
	<label>Forward: <input name = "forward" value="0" id = "forward" type = "text" size = "5" /></label>
    <br>
	<label>Left: <input name = "left" value="0" id = "left" type = "text" size = "5" class="inp2" /></label>
	<br>
	<br>
	<input type="submit" name="delete" value="Delete">
	<input type="submit" name="save" value="Save">
	<input type="submit" name="start" value="Start">
	</form>
	</div>
</body>
</html>