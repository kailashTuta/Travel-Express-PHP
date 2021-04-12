<div class="container-fluid" id="premiumPackage">
    <h1>Premium Packages</h1>
    <div class="border"></div>
    <div class="row">
        <?php
        include "./DBConnect.php";
        $q = "SELECT * FROM packages";
        $res = $conn->query($q);
        while ($row = $res->fetch_assoc()) {
        ?>
            <div class="col-md-3">
                <div class="single-content">
                    <img src="images/package-images/<?php echo $row['image'] ?>">
                    <div class="text-content">
                        <h4><?php echo $row['name'] ?></h4>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>