<?php
/*
Site Index
*/
include 'includes/header.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $msg = "New email from: " . $name . " at " . $email;
    $msg .= "Message: " .$message;

    $to = 'andi@madebyfactory.com';
    $header = "From: " . $_POST['email'];


    mail($to, $subject ,$msg, $header);

}
 ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Contact Us</h1>
            <form class="" action="contact.php" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Subject" name="subject">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-12">
                                <textarea class="form-control" name="message" rows="8" cols="80"></textarea>
                            </div>
                        </div>
                        <button type="submit" name="submit" value="Register" class="btn btn-info btn-round btn-lg">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Row -->
</div>
<!-- End Container -->
<?php include 'includes/footer.php' ?>
