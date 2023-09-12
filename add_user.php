<?php
include("includes/connection.php");
if($_POST['stage']){
    $stage 			    = $connect->real_escape_string($_POST['stage']);
    $name 			    = $connect->real_escape_string($_POST['name']);
    $role 			    = $connect->real_escape_string($_POST['role']);
    $mobile 		    = $connect->real_escape_string($_POST['mobile']);
    $email 			    = $connect->real_escape_string($_POST['email']);
    $password 		    = $connect->real_escape_string($_POST['password']);
    $address 		    = $connect->real_escape_string($_POST['address']);
    $gender 		    = $connect->real_escape_string($_POST['gender']);
    $dob 			    = $connect->real_escape_string($_POST['dob']);
    $profile_pic_name   = $connect->real_escape_string($_POST['profile_pic_name']);
    $signature_name 	= $connect->real_escape_string($_POST['signature_name']);
    $status = 1;

    if($_FILES['profile_pic']['name'] != "")
	{
		$path2="uploads";
		$delpath=$path2."/".$_POST['profile_pic_name'];		
		@unlink($delpath);		

		$s1=rand();
		$realname=$_FILES['profile_pic']['name'];
		$realname=$s1 ."_". $realname;			
		$dest=$path2."/".$realname;
		move_uploaded_file($_FILES['profile_pic']['tmp_name'],$dest);
		$profile_pic=trim($realname);
	}
	else
	{
		$profile_pic=trim($_POST['profile_pic_name']);
	}
            
    if($_FILES['signature']['name'] != "")
	{
		$path2="uploads";
		$delpath=$path2."/".$_POST['signature_name'];		
		@unlink($delpath);	

		$s1=rand();
		$realname=$_FILES['signature']['name'];
		$realname=$s1 ."_". $realname;			
		$dest=$path2."/".$realname;
		move_uploaded_file($_FILES['signature']['tmp_name'],$dest);
		$signature=trim($realname);
	}
	else
	{
		$signature=trim($_POST['signature_name']);
	}

    if($stage == 2){
        $insert_query = db_query("INSERT INTO user_details (name, role, mobile, email, password, address, gender, dob, profile_pic, signature, status) VALUES ('$name', '$role', '$mobile', '$email', '$password', '$address', '$gender', '$dob', '$profile_pic', '$signature', '$status')");
        
        if($insert_query === TRUE){
            $msg = "Record Added Successfully";
            setcookie("msg", $msg, time() + 3);
            header("Location: user_list.php");
        }
        else{
            $msg = "Error";
            setcookie("msg", $msg, time() + 3);
            header("Location: user_list.php");
        }

    }
    else{
        $editid = $connect->real_escape_string($_POST['edit_id']);
        $update_query = db_query("UPDATE user_details SET `name`= '$name', `role`= '$role', `mobile`= '$mobile', `email`= '$email', `password`= '$password', `address`= '$address', `gender`= '$gender', `dob`= '$dob', `profile_pic`= '$profile_pic', `signature`= '$signature', `status`= '$status' WHERE id='$editid'");
        
        if($update_query === TRUE){
            $msg = "Record updated Successfully";
            setcookie("msg", $msg, time() + 3);
            header("Location: user_list.php");
        }
        else{
            $msg = "Error";
            setcookie("msg", $msg, time() + 3);
            header("Location: user_list.php");
        }
    }
}

$eid = $_GET['editid'];
if ($eid != ""){
    $sql = db_query("SELECT * FROM user_details WHERE id='$eid'");
    $edit_res = mysqli_fetch_assoc($sql);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php include("includes/header.php"); ?>
    <body>
        <div class="container">
            <?php include("includes/nav.php"); ?>

            <div class="card">
                <div class="card-header">
                    <h3 class='text-center'>Add New User</h3>
                </div>
                <div class="cad-body col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">  
                        <?php if($_GET['editid']){ ?>
                            <input type="hidden" class="form-control" id="stage" name="stage" value="3">
                            <input type="hidden" class="form-control" id="stage" name="edit_id" value="<?php echo $eid; ?>">
                        <?php } else { ?>
                            <input type="hidden" class="form-control" id="stage" name="stage" value="2">
                        <?php } ?>
                        <div class="row pt-3">
                            <div class="form-group col-md-12">  
                                <label> Enter Name </label>  
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo $edit_res['name']?>" required>  
                            </div>  
                            <div class="form-group col-md-6">  
                                <label> Select Role </label>  
                                <select class="form-control" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="1" <?php if($edit_res['role'] == 1) { echo "selected"; } ?>>Super Admin </option>
                                    <option value="2" <?php if($edit_res['role'] == 2) { echo "selected"; } ?>>Admin</option>
                                    <option value="3" <?php if($edit_res['role'] == 3) { echo "selected"; } ?>>User</option>
                                </select>
                            </div> 
                            <div class="form-group col-md-6">  
                                <label> Enter Phone </label>  
                                <input type="text" class="form-control" name="mobile" placeholder="Enter Phone" value="<?php echo $edit_res['mobile']?>" required>  
                            </div> 
                            <div class="form-group col-md-6">  
                                <label> Enter Email </label>  
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $edit_res['email']?>" required>  
                            </div>  
                            <div class="form-group col-md-6">  
                                <label> Enter Password </label>  
                                <input type="password" class="form-control" name="password" placeholder="Enter Password" value="<?php echo $edit_res['password']?>" required>  
                            </div>  
                            <div class="form-group col-md-12">  
                                <label> Enter Address </label>  
                                <input type="text" class="form-control" name="address" value="<?php echo $edit_res['address']?>" placeholder="Enter Address">  
                            </div>  
                            <div class="form-group col-md-6">  
                                <label> Select Gender </label>  
                                <select class="form-control" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male" <?php if($edit_res['gender'] == "Male") { echo "selected"; } ?>>Male </option>
                                    <option value="Female" <?php if($edit_res['gender'] == "Female") { echo "selected"; } ?>>Female</option>
                                    <option value="Others" <?php if($edit_res['gender'] == "Others") { echo "selected"; } ?>>Others</option>
                                </select>
                            </div> 
                            <div class="form-group col-md-6">  
                                <label> Enter Date Of Birth </label>  
                                <input type="date" class="form-control" name="dob" value="<?php if(isset($edit_res['dob'])) { echo date( 'Y-m-d', strtotime($edit_res['dob'])); }?>" placeholder="Enter Date Of Birth">  
                            </div> 
                            <div class="form-group col-md-6">  
                                <label> Upload Profile Pic </label>  
                                <input type="file" class="form-control" name="profile_pic">  
                                <input type="hidden" class="form-control" name="profile_pic_name" value="<?php echo $edit_res['profile_pic']?>">  
                                <?php
								if($edit_res['profile_pic'] != ""){
									echo "<a href=\"download_file.php?file=".$edit_res['profile_pic']."&dwn_type=img\" title=\"Download\" style=\"color: #1b5a90;margin-top: .5rem;\">
									    ".$edit_res['profile_pic']."&nbsp;&nbsp;&nbsp;<i class=\"fa fa-download\"></i>
									</a>";
								}
								?>
                            </div>  
                            <div class="form-group col-md-6">  
                                <label> Upload Signature</label>  
                                <input type="file" class="form-control" name="signature"> 
                                <input type="hidden" class="form-control" name="signature_name" value="<?php echo $edit_res['signature']?>"> 
                                <?php
								if($edit_res['signature'] != ""){
									echo "<a href=\"download_file.php?file=".$edit_res['signature']."&dwn_type=img\" title=\"Download\" style=\"color: #1b5a90;margin-top: .5rem;\">
									    ".$edit_res['signature']."&nbsp;&nbsp;&nbsp;<i class=\"fa fa-download\"></i>
									</a>";
								}
								?>  
                            </div>  
                            <div class="form-group col-md-6">  
                                <label> Select Satus </label>  
                                <select class="form-control" name="status" required>
                                    <option value="" selected>Select Satus</option>
                                    <option value="0" <?php if(isset($edit_res['status']) && $edit_res['status'] == 0) { echo "selected"; } ?>>Inactive </option>
                                    <option value="1" <?php if(isset($edit_res['status']) && $edit_res['status'] == 1) { echo "selected"; } ?>>Active</option>
                                </select>
                            </div> 

                            <div class="form-group col-md-12">  
                                <button type="submit" class="btn btn-primary btn-block"> Register </button>
                            </div>  
                        </div>
                    
                          
                    </form>  
                </div>
            </div>
            <?php include("includes/footer_link.php"); ?>
        </div>
    </body>
</html>
