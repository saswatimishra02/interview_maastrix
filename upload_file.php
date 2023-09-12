<?php
include("includes/connection.php");

$id = $_GET['id'];
if ($id != ""){
    $sql = db_query("SELECT * FROM emp_details WHERE id='$id'");
    $row = mysqli_fetch_assoc($sql);

    $file_sql = db_query("SELECT * FROM emp_file WHERE emp_id='$id'");
    $file_row = mysqli_fetch_assoc($file_sql);
}

if($_POST['stage']){
    $stage 			    = $connect->real_escape_string($_POST['stage']);
    $emp_id 			    = $connect->real_escape_string($_POST['emp_id']);
    $upload_file_nm=$connect->real_escape_string($_POST['upload_file_nm']);
    $upload_file_array=explode(',',rtrim($upload_file_nm,','));

    $targetDir = "uploads/"; 

    if(!empty($_FILES['upload_file']['name'])){   
        foreach($upload_file_array as $img_file_val){
			$img_file_val =trim($img_file_val);
			$pos = array_search($img_file_val,array_values($_FILES['upload_file']['name']));
			if($pos !== false){
                $s1 = rand();
                $path2="uploads";
                $realname=$_FILES['upload_file']['name'];
                $realname=$s1 ."_". $realname;			
                $dest=$path2."/".$realname;
                move_uploaded_file($_FILES['upload_file']['tmp_name'],$dest);
                $upload_file=trim($realname);
            }
            else{
                $upload_file .=$targetDir.$img_file_val.",";
            }
		}
    }
    else{
        $upload_file = $upload_file_nm;
    }
    $insert_query = db_query("INSERT INTO emp_file (emp_id, upload_file) VALUES ('$emp_id', '$upload_file')");
        
    if($insert_query === TRUE){
        $msg = "Record Added Successfully";
        setcookie("msg", $msg, time() + 3);
        header("Location: emp_details.php");
    }
    else{
        $msg = "Error";
        setcookie("msg", $msg, time() + 3);
        header("Location: emp_details.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php include("includes/header.php"); ?>
    <style>
        .upload {
            position: absolute;
            padding: 10px;
            top: 30px;
            width: 97%;
            height: 120px;
            border: 2px dashed #cfcfcf;
            background-color: #f8f9fb;
            border-radius: 12px;
            text-align: center;
        }
        .upload input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100% !important;
            outline: none;
            opacity: 0;
        }
        .drag-area.upload i {
            font-size: 20px;
            color: #999;
            margin: 14px;
        }
        .upload p {
            width: 100%;
            text-align: center;
            color: #999;
            line-height: 1.4;
            font-size: 13px;
            font-family: Arial;
        }
        .uploaded-images img{
            width: 100px;
        }
        .upload_img_div{
            padding-top: 7rem;
        }
        .uploaded-images{
            margin: 10px;
        }
    </style>
    <body>
        <div class="container">
            <?php include("includes/nav.php"); ?>

            <div class="card">
                <div class="card-header">
                    <h3 class='text-center'>Employee Details</h3>
                </div>
                <div class="card-body pr-2 pl-2">
                    <?php if (isset($_COOKIE['msg'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php print str_replace("+", " ", $_COOKIE['msg']); ?>
                        </div>
                    <?php } ?>
					
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="stage" name="stage" value="2">
                        <input type="hidden" class="form-control" id="stage" name="emp_id" value="<?php echo $id; ?>">
                        <div class="row">
                            <div class="form-group col-md-6">  
                                <label> Full Name </label>  
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name'];?>" readonly placeholder="Full Name">  
                            </div>  
                            <div class="form-group col-md-6">  
                                <label> Address </label>  
                                <input type="text" class="form-control" name="address" id="address" value="<?php echo $row['address'];?>" readonly  placeholder="Address">  
                            </div>  
                            <div class="form-group col-md-6">  
                                <label> Email </label>  
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $row['email'];?>" readonly placeholder="Email">  
                            </div>  
                            <div class="form-group col-md-6">  
                                <label> Mobile Number </label>  
                                <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $row['mobile'];?>" readonly placeholder="Mobile Number">  
                            </div> 

                            <div class="form-group col-md-12">  
                                <label> Upload File </label>  
                                <input type="hidden" name="upload_file_nm" id="upload_file_nm" value="<?php //print str_replace("uploads/","",$thumbnail_img); ?>">
                                <div class="drag-area upload">
                                    <input type="file" multiple id="upload_file" name="upload_file[]" accept="image/*" <?php if($_GET['eid'] || $_GET['bid']){echo "";} else {echo "required";}?>  />
                                    <i class="fas fa-image"></i>
                                    <p>Drop your images here or select <a href="#">click to browse</a></p>
                                </div>
                            </div> 
                        </div> 
                        <div class="row" style="padding-top: 6rem!important;">
                            <div class="form-group col-md-6">  
                                <button type="submit" class="btn btn-primary"> Upload </button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="form-group col-md-12 clearfix">
                            <div id="upload_img_div">
                                <?php
                                $upload_file = $file_row['upload_file'];
                                if($upload_file !=""){
                                    $str = rtrim($upload_file, ", ");
                                    $images_array=explode(',',$str);
                                    foreach ($images_array as $img) {
                                        $img = str_replace("../","",$img);
                                        ?>
                                        <div class="uploaded-images">
                                            <i class="fa fa-times-circle close" aria-hidden="true" id=""></i>
                                            <img src="<?php echo $img;?>" style="height: 50px;width:100%" title="<?php print str_replace("uploads/","",$img); ?>">
                                        </div>
                                    <?php
                                    }
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include("includes/footer_link.php"); ?>
        </div>
        <script>
            $(document).ready(function(){
                $("#upload_file").on("change", function(e){ 
                    var eid= "#upload_img_div";
                    var files = e.target.files,
                    filesLength = files.length;
                    let img_nm='';
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        const filename = f.name;
                        const imageSize = f.size;

                        // var fileReader = new FileReader();
                        // fileReader.onload = (function(e) {
                        //     var file = e.target;
                        //     $("<span class=\"uploaded-images\">" +
                        //     "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + filename + "\"/><button type=\"button\" class=\"btn btn-primary\"> Search </button>" +"</span>")
                        //     .appendTo(eid);
                        //     $(".remove").click(function(){
                        //         $(this).parent(".uploaded-images").remove();
                        //     });
                        // });
                        // fileReader.readAsDataURL(f);
                        img_nm +=filename+',';
                    }
                    var img_val = $('#upload_file_nm').val();
                    img_nm =img_val+img_nm; 
                    $('#upload_file_nm').val(img_nm);
                    console.log(files);
                });
            });
        </script>
    </body>
</html>
