<button type="button" class="btn btn-info" data-myname="<?= $row['name']; ?>" data-myimage="<?= $row['image']; ?>" data-mydescription="<?= $row['description']; ?>" data-myprice="<?= $row['price']; ?>" data-myplacescovered="<?= $row['places_covered']; ?>" data-myid="<?= $row['p_id']; ?>" data-toggle="modal" data-target="#viewPackage">
    View More
</button>

<!-- Modal -->
<div class="modal fade" id="viewPackage" tabindex="-1" aria-labelledby="viewPackageLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPackageLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img id="viewPackageImg" class="w-100 mb-2 h-75" src="" alt="">
                        <form action="booking.php" method="post">
                            <input type="hidden" name="name" id="name">
                            <input type="hidden" name="package_id" id="p_id" value="">
                            <input type="hidden" name="price" id="price" value="">
                            <button class="btn btn-info btn-block">Book Now</button>
                        </form>
                    </div>
                    <div class="offset-md-1 col-md-7">
                        <label class="font-weight-bolder">Description</label>
                        <p id="viewPackageDescription" class="text-justify"></p>
                        <label class="font-weight-bolder">Places Covered</label>
                        <p id="viewPackagePlacesCovered" class="text-justify"></p>
                        <label class="font-weight-bolder">Price</label>
                        <p id="viewPackagePrice" class="text-justify text-capitalize"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>