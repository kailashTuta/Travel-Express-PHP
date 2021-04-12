<div class="container tour-images mb-5">
    <h1 class="card-title text-center text-uppercase text-white bg-dark p-3 mt-2">Tours</h1>
    <div class="row justify-content-center">
        <?php
        include "./DBConnect.php";
        $q = "SELECT * from tours";
        $res = $conn->query($q);
        while ($row = $res->fetch_assoc()) {
        ?>
            <div class="col-md-4">
                <div class="card shadow h-100" style="width: 20rem;">
                    <div class="inner">
                        <img src="images/tour-package-images/<?php echo $row['image'] ?>" class="card-img-top" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $row['name'] ?></h5>
                        <p class="card-text text-justify"><?php echo $row['description'] ?></p>
                        <?php include "./partials/viewTour.php";?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>