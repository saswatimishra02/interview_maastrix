<?php
include("includes/connection.php");
if (isset($_POST['name']) OR isset($_POST['address']) OR isset($_POST['email']) OR isset($_POST['mobile']) ){
    $name = $connect->real_escape_string($_POST['name']);
    $address = $connect->real_escape_string($_POST['address']);
    $email = $connect->real_escape_string($_POST['email']);
    $mobile = $connect->real_escape_string($_POST['mobile']);

    $conditions = '';
    if($name != ""){
        $conditions .= " AND name = '$name' ";
    }
    if($address != ""){
        $conditions .= " AND address = '$address' ";
    }
    if($email != ""){
        $conditions .= " AND email = '$email' ";
    }
    if($mobile != ""){
        $conditions .= " AND mobile = '$mobile' ";
    }
    
    $i=1;
    $sql = db_query("SELECT * FROM `emp_details` WHERE 1=1 $conditions ORDER BY name;");
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
            </tr>
        <?php
        $i++;
    }
}?>