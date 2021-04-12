<form class="form-container" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="form-group">
        <label for="trip_name">Tour Name</label>
        <input type="text" class="form-control" name="trip_name" value="<?php echo $name ?>" readonly>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="price">Price</label>
            <input type="number" class="form-control" value="<?php echo $price ?>" name="price" readonly>
        </div>
        <div class="form-group col-md-6">
            <label for="persons">Enter no of persons</label>
            <select name="persons" class="custom-select">
                <option selected>Choose</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="mobile">Mobile Number</label>
            <input type="number" class="form-control" name="mobile">
        </div>
        <div class="form-group col-md-6">
            <label for="journey_date">Journey Date</label>
            <input type="date" name="journey_date" class="form-control">
        </div>
    </div>
    <?php
    if ($package_id == null) {
    ?>
        <div class="form-group">
            <label for="tour_id">Tour Id</label>
            <input type="number" class="form-control" name="tour_id" value="<?php echo $tour_id ?>" readonly>
        </div>
    <?php
    } else {
    ?>
        <div class="form-group">
            <label for="package_id">Package Id</label>
            <input type="number" class="form-control" name="package_id" value="<?php echo $package_id ?>" readonly>
        </div>
    <?php
    }
    ?>
    <div class="form-group">
        <label for="user_id">User Id</label>
        <input type="number" name="user_id" class="form-control" value="<?php echo $_SESSION['id'] ?>" readonly>
    </div>
    <div class="form-group">
        <input type="submit" value="Book" class="btn btn-info btn-block">
    </div>
</form>