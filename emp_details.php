<?php
include("includes/connection.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php include("includes/header.php"); ?>
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
					
                    <form action="" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">  
                                <label> Full Name </label>  
                                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name">  
                            </div>  
                            <div class="form-group col-md-6">  
                                <label> Address </label>  
                                <input type="text" class="form-control" name="name" id="address" placeholder="Address">  
                            </div>  
                            <div class="form-group col-md-6">  
                                <label> Email </label>  
                                <input type="text" class="form-control" name="name" id="email" placeholder="Email">  
                            </div>  
                            <div class="form-group col-md-6">  
                                <label> Mobile Number </label>  
                                <input type="text" class="form-control" name="name" id="mobile" placeholder="Mobile Number">  
                            </div> 
                            <div class="form-group col-md-6">  
                                <button type="button" class="btn btn-primary" id="search_btn"> Search </button>
                            </div>
                        </div> 
                    </form>

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th  class="text-center">SL</th>
                                <th  class="text-center">Employee Name</th>
                                <th  class="text-center">Designation</th>
                                <th  class="text-center">DOB</th>
                                <th  class="text-center">Email</th>
                                <th  class="text-center">Mobile</th>
                                <th  class="text-center">BG</th>
                                <th  class="text-center">DOJ</th>
                                <th  class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="emp_dlts">
                            <?php
                            $i=1;
                            $sql = db_query("SELECT * FROM `emp_details` ORDER BY name;");
                            
                            while ($row = mysqli_fetch_assoc($sql)){
                                ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['designation']; ?></td>
                                    <td><?php echo $row['dob']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['mobile']; ?></td>
                                    <td><?php echo $row['blood_group']; ?></td>
                                    <td><?php echo $row['doj']; ?></td>
                                    <td>
                                        <a href="upload_file.php?id=<?php echo $row['id']; ?>">uploads File</a>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php include("includes/footer_link.php"); ?>
        </div>
        <script>
            $("#search_btn").click(function() {
                //alert("clicked");
                var name = document.getElementById('name').value;
                var address = document.getElementById('address').value;
                var email = document.getElementById('email').value;
                var mobile = document.getElementById('mobile').value;
               
                $.ajax({
                    url: 'get_emp_data.php',
                    type: 'post',
                    data: {name: name, address: address, email: email, mobile:mobile},
                    success: function (response) {
                        //alert(response);
                        $("#emp_dlts").html(response);
                    }
                });
            });
        </script>
    </body>
</html>
