<?php
include("includes/connection.php");

if (!isset($_SESSION['user_id'])){
    header("location:index.php");
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
                    <h3 class="text-center">Welcome! 
                        <strong>
                            <span class="badge badge-lg badge-secondary text-white">
                                <?php echo $_SESSION['name'];?>
                            </span>
                        </strong>
                    </h3>
                </div>
            </div>
            <?php include("includes/footer_link.php"); ?>
        </div>
    </body>
</html>
