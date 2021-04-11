<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addPackageModal">
    <i class="fas fa-plus-circle"></i>
    Add Package
</button>

<!-- Modal -->
<div class="modal fade" id="addPackageModal" tabindex="-1" aria-labelledby="addPackageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTourModalLabel">Add Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="5" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="places_covered">Places Covered</label>
                        <textarea class="form-control" name="places_covered" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input">
                            <label class="custom-file-label" for="image">Please Upload Image</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addPackages" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>