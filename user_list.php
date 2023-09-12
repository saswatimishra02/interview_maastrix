<?php
include("includes/connection.php");

$delid = $connect->real_escape_string($_GET['delid']);
if ($delid != ""){
	$deletesql = db_query("DELETE FROM user_details WHERE id={$delid}");      

    if($deletesql === TRUE){
        $msg = "Record Deleted Successfully";
        setcookie("msg", $msg, time() + 3);
        header("Location: user_list.php");
    }
    else{
        $msg = "Error";
        setcookie("msg", $msg, time() + 3);
        header("Location: user_list.php");
    }      
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
                    <h3 class='text-center'>User list</h3>
                </div>
                <div class="card-body pr-2 pl-2">
                    <?php if (isset($_COOKIE['msg'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php print str_replace("+", " ", $_COOKIE['msg']); ?>
                        </div>
                    <?php } ?>
					
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th  class="text-center">SL</th>
                                <th  class="text-center">Name</th>
                                <th  class="text-center">Email address</th>
                                <th  class="text-center">Mobile</th>
                                <th  class="text-center">Status</th>
                                <th  class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            if($user_role == 3){
                                $uid = $_SESSION['user_id'];
                                $sql = db_query("SELECT * FROM  user_details WHERE id = $uid ");
                            }
                            else{
                                $sql = db_query("SELECT * FROM  user_details ORDER BY id desc");
                            }
                            
                            while ($row = mysqli_fetch_assoc($sql)){
                                if($row['status'] == 0){
                                    $status = "Inactive";
                                }
                                else{
                                    $status = "Active";
                                }
                                ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['mobile']; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td>
                                        <a href="add_user.php?editid=<?php echo $row['id']; ?>" <?php if($user_role == 2) { echo "style='display:none';"; }?>><i class="far fa-edit"></i></a>
                                        <a href="?delid=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete?');" <?php if($user_role == 3) { echo "style='display:none';"; }?>><i class="far fa-trash-alt" id="delbtn"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            $i++;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php include("includes/footer_link.php"); ?>
        </div>
    </body>
</html>
