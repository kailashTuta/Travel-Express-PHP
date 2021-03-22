<button type="button" class="btn btn-primary" data-myfname="<?= $row['fname']; ?>" data-mylname="<?= $row['lname']; ?>" data-myname="<?= $row['name']; ?>" data-myemail="<?= $row['email']; ?>" data-myrole_as="<?= $row['role_as']; ?>" data-myid="<?= $row['id']; ?>" data-toggle="modal" data-target="#editUsers">
    <i class="fas fa-user-edit"></i>
</button>

<div class="modal fade" id="editUsers" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editUsersLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUsersLabel">Edit User
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                <div class="modal-body">
                    <input type="hidden" name="uid" id="uid" value="">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="fname">First name</label>
                            <input type="text" id="fname" class="form-control" name="fname">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="lname">Last name</label>
                            <input type="text" id="lname" class="form-control" name="lname">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label for="role_as">Role_as</label>
                        <select class="custom-select" id="role_as" name="role_as">
                            <option selected>Choose</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="updateUsers" class="btn btn-primary">Update Users</button>
                </div>
            </form>
        </div>
    </div>
</div>