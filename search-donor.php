<?php
error_reporting(0);
include('includes/config.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BloodBank & Donor Management System | Become A Donar</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
        <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>


</head>

<body>

<?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Search <small>Donor</small></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Search  Donor</li>
        </ol>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->
        <form name="donar" method="post">
<div class="row">



<div class="col-lg-4 mb-4">
<div class="font-italic">Blood Group<span style="color:red">*</span> </div>
<div><select name="bloodgroup" class="form-control" required>
<?php 

$ret=mysqli_query($con,"SELECT * from tblbloodgroup");
if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{ 
?>  
<option value="<?php echo $row['BloodGroup'];?>"><?php echo $row['BloodGroup'];?></option>
<?php }} ?>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
</div>
</div>
       <!-- /.row -->
</form>   

        <div class="row">
                   <?php 
if(isset($_POST['submit']))
{
$status=1;
$bloodgroup=$_POST['bloodgroup'];

$ret=mysqli_query($con,"SELECT * from tblblooddonars where status='$status' and BloodGroup='$bloodgroup'");
if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{ 

?>

            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top img-fluid" src="images/blood-donor.jpg" alt="" ></a>
                    <div class="card-block">
                        <h4 class="card-title"><a href="#"><?php echo $row['FullName'];?></a></h4>
                        <p class="card-text"><b>Mobile No. / Email Id :</b> <?php echo $row['MobileNumber'];?> /
                        <?php if($row['EmailId'] =="")
                        {
                        echo htmlentities(NA);
                        } else {
echo htmlentities($row['EmailId']);
}
?>
                             </p>
<p class="card-text"><b>  Gender :</b> <?php echo $row['Gender'];?></p>
<p class="card-text"><b> Age:</b> <?php echo $row['Age'];?></p>
<p class="card-text"><b>Blood Group :</b> <?php echo $row['BloodGroup'];?></p>
<p class="card-text"><b>Address :</b>                  
<?php if($row['Address']=="")
{
echo htmlentities('NA');
} else {
echo htmlentities($row['Address']);
}
?></p>
     <p class="card-text"><b>Message :</b> <?php echo $row['Message'];?></p>

                    </div>
                </div>
            </div>

            <?php }}
else
{
echo htmlentities("No Record Found");

}


            } ?>
          
 



        </div>



</div>
  <?php include('includes/footer.php');?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
