<?php
$conn = new mysqli("localhost", "steml1og_stemfun","s0RkDLtTvN0t", "steml1og_stemf") or die ('Cannot connect to db');
$mid = $_POST["id"];
$result = mysqli_query($conn,"SELECT distinct color FROM sub_material where material_id ='$mid'");?>

<option value="">Select Color</option>
<?php
while($row=mysqli_fetch_assoc($result)){?>
    
    <option value="<?php echo $row["color"];?>"> <?php echo $row["color"];?> </option>
<?php }
?>