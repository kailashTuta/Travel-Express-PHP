$(document).ready(function () {
    $(".gallery").magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    $('#editUsers').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var fname = button.data('myfname')
        var lname = button.data('mylname')
        var name = button.data('myname')
        var email = button.data('myemail')
        var role_as = button.data('myrole_as')
        var uid = button.data('myid')

        var modal = $(this)

        modal.find('.modal-body #fname').val(fname)
        modal.find('.modal-body #lname').val(lname)
        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #email').val(email)
        modal.find('.modal-body #uid').val(uid)
        modal.find('.modal-body #role_as').val(role_as)
    })

});
