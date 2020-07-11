<?php
// Create connection
$connect= mysqli_connect("localhost","root","","control_panel_db");
// Check connection
if($connect->connect_error){
	die("Connection failed: ".$connect->connect_error);}
//	echo "Connected successfully";

	if(isset($_POST['delete'])){ 
		$sql="DELETE FROM move_robot"; ?>
		<h4 style="text-align:center"><p style="color:red">All the data was successfully deleted </p></h4>
		<?php }
	else if(isset($_POST['save'])){
		$sql="INSERT INTO move_robot (rightt, leftt,forward)VALUES('".$_POST['right']."','".$_POST['left']."','".$_POST['forward']."')"; ?>
		<h4 style="text-align:center"><p style="color:red">The data was successfully added </p></h4>
		<?php }
	else {//if(isset(($_POST['start']))
		$sql="SELECT forward, rightt, leftt FROM move_robot";
		$sql2=mysqli_query($connect,$sql);}
	
	if (mysqli_query($connect,$sql)){
		//echo "1 record added";
	}
	
	include "CP_ConnectWith_DB.php";  
	$connect->close();
?>
<html>
<head>
</head>
<style>
.container {
	 margin: auto;
	 margin-left: 5px;
	 margin-right: 5px;
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 padding: 10px;
	}
</style>
<body> 
<script type="text/javascript" language="javascript"> 
		var numf;
		numf=[]; 
		var numr;
		numr=[]; 
		var numl;
		numl=[]; 
		var count=0;
		
</script>
<div class="container"> 
	<?php if(isset($_POST['start'])){
			$rcheck=mysqli_num_rows($sql2);
			 if($rcheck >0){?>
				<table width="100" cellpadding=5celspacing=5 border=1>
				<tr>
				<th>Forward</th>
				<th>Right</th>
				<th>Left</th>
				</tr>
				 
			<?php while($row=mysqli_fetch_assoc($sql2)){?>
			<script type="text/javascript" language="javascript">
				
			numf[count]="<?php echo $row['forward']; ?>";
			numr[count]="<?php echo $row['rightt']; ?>";
			numl[count]="<?php echo $row['leftt']; ?>";
			count++;
			//console.log("row " + numf.length);
			</script>
	<tr>
	<td><?php echo $row['forward'];?></td>
	<td><?php echo $row['rightt'];?></td>
	<td><?php echo $row['leftt'];?></td>
	</tr>
	<?php } ?>
	</table>
	</div>
	<p style="text-align:center"><canvas id="can" width="301" height="301" style="border:1px solid #000000;"> </canvas></p>
    <script type="text/javascript" language="javascript"> 
		
	//select the canvas elwments and context type
	ctx = document.getElementById("can").getContext("2d");
	//begin the path
	ctx.beginPath();
	
	//ctx.translate(150, 150);
	//select the start position of the path.
	ctx.moveTo(150,150);
	ctx.fillRect(145,145,10,10);
	//ctx.moveTo(0,0);
	//ctx.fillRect(-5,-5,10,10);
	ctx.stroke();
	var i= 0;
	var xs=150;
	var ys=150;
	var newx=150;
	var newy=150;
	//console.log("row " + numf.length);
	for(i=0;i < numf.length;i){
		if(numf[i] != 0){
			newx=xs;
			newy= ys - 5*(numf[i]);
			canvas_arrow(ctx, xs, ys, newx, newy);
			xs=newx;
			ys=newy;
			ctx.stroke();
			i++;
		}
		else if(numr[i] != 0 && i<(numf.length)){ //r or l
			//ctx.translate(xs,ys);
			//ctx.rotate(0 * Math.PI / 180);
			i++;
			if(numf[i] != 0 && i<(numf.length)){
				newx=xs + 5 *(numf[i]);
				newy= ys;
				canvas_arrow(ctx, xs, ys, newx, newy);
				xs=newx;
				ys=newy;
				ctx.stroke();
				i++;
				if(numr[i] != 0 && i<(numf.length)){//u or d
					newx=xs;
					newy= ys + 5 *(numf[++i]);
					canvas_arrow(ctx, xs, ys, newx, newy);
					xs=newx;
					ys=newy;
					ctx.stroke();
					i++;
					if(numr[i] != 0 && i<(numf.length)){//r or l
						newx=xs - 5 *(numf[++i]);
						newy= ys;
						canvas_arrow(ctx, xs, ys, newx, newy);
						xs=newx;
						ys=newy;
						ctx.stroke();
						i++;
						if(numr[i] != 0 && i<(numf.length)){//u or d
						newx=xs;
						newy= ys - 5*(numf[++i]);
						canvas_arrow(ctx, xs, ys, newx, newy);
						xs=newx;
						ys=newy;
						ctx.stroke();
						i++;
						}
						else{
							newx=xs ;
							newy= ys+ 5 *(numf[++i]);
							canvas_arrow(ctx, xs, ys, newx, newy);
							xs=newx;
							ys=newy;
							ctx.stroke();
							i++;					
						}
					}
					else{
						newx=xs + 5 *(numf[++i]);
						newy= ys;
						canvas_arrow(ctx, xs, ys, newx, newy);
						xs=newx;
						ys=newy;
						ctx.stroke();
						i++;					
					}
				}
				else{
					newx=xs;
					newy= xy - 5 *(numf[++i]);
					canvas_arrow(ctx, xs, ys, newx, newy);
					xs=newx;
					ys=newy;
					ctx.stroke();
					i++;
				}
				
			}
			
		}
		else if(numl[i] != 0 && i<(numf.length)){//left
			//ctx.translate(xs,ys);
			//ctx.rotate(270 * Math.PI / 180);
			i++;
			if(numf[i] != 0 && i<(numf.length)){
				newx=newx - 5 *(numf[i]);
				newy= ys;
				canvas_arrow(ctx, xs, ys, newx, newy);
				xs=newx;
				ys=newy;
				ctx.stroke();
				i++;
				if(numl[i] != 0 && i<(numf.length)){//u or d
					newx=xs;
					newy= ys + 5 *(numf[++i]);
					canvas_arrow(ctx, xs, ys, newx, newy);
					xs=newx;
					ys=newy;
					ctx.stroke();
					i++;
					if(numl[i] != 0 && i<(numf.length)){//r or l
						newx=xs + 5 *(numf[++i]);
						newy= ys;
						canvas_arrow(ctx, xs, ys, newx, newy);
						xs=newx;
						ys=newy;
						ctx.stroke();
						i++;
						if(numl[i] != 0 && i<(numf.length)){//r or l
							newx=xs ;
							newy= ys - 5 *(numf[++i]);
							canvas_arrow(ctx, xs, ys, newx, newy);
							xs=newx;
							ys=newy;
							ctx.stroke();
							i++;
						}
						else{
							newx=xs ;
							newy= ys+5 *(numf[++i]);
							canvas_arrow(ctx, xs, ys, newx, newy);
							xs=newx;
							ys=newy;
							ctx.stroke();
							i++;					
					}
					}
					else{
						newx=xs - 5 *(numf[++i]);
						newy= ys;
						canvas_arrow(ctx, xs, ys, newx, newy);
						xs=newx;
						ys=newy;
						ctx.stroke();
						i++;					
					}
				}
				else{
					newx=xs;
					newy= xy - 5 *(numf[++i]);
					canvas_arrow(ctx, xs, ys, newx, newy);
					xs=newx;
					ys=newy;
					ctx.stroke();
					i++;
				}
			}
		}		
	}
	//canvas_arrow(ctx, xs, ys, 150, 50);
	//ctx.stroke();
function canvas_arrow(context, fromx, fromy, tox, toy) {
  var headlen = 10; // length of head in pixels
  var dx = tox - fromx;
  var dy = toy - fromy;
  var angle = Math.atan2(dy, dx);
  context.moveTo(fromx, fromy);
  context.lineTo(tox, toy);
  context.lineTo(tox - headlen * Math.cos(angle - Math.PI / 6), toy - headlen * Math.sin(angle - Math.PI / 6));
  context.moveTo(tox, toy);
  context.lineTo(tox - headlen * Math.cos(angle + Math.PI / 6), toy - headlen * Math.sin(angle + Math.PI / 6));
}
	</script>
	<?php }else {echo "There is no data.";}}	?> 

</body>
</html>