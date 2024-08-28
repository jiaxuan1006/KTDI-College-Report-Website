<?php
// Include the database configuration file
include 'config.php';

// Get images from the database
$sql = "SELECT * FROM images ORDER BY uploaded_on DESC";
$result = mysqli_query($conn, $sql);
if($rows > 0){
    while($rows = mysqli_fetch_assoc($result)){
        $imageURL = 'uploads/'.$row["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>