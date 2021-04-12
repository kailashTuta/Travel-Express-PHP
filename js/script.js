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
    $('#editTours').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var name = button.data('myname')
        var description = button.data('mydescription')
        var tid = button.data('myid')
        var price = button.data('myprice')
        var placesCovered = button.data('myplacescovered')

        var modal = $(this)

        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #description').val(description)
        modal.find('.modal-body #price').val(price)
        modal.find('.modal-body #tid').val(tid)
        modal.find('.modal-body #places_covered').val(placesCovered)
    })
    $('#editPackages').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var name = button.data('myname')
        var description = button.data('mydescription')
        var pid = button.data('myid')
        var price = button.data('myprice')
        var placesCovered = button.data('myplacescovered')

        var modal = $(this)

        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #description').val(description)
        modal.find('.modal-body #price').val(price)
        modal.find('.modal-body #pid').val(pid)
        modal.find('.modal-body #places_covered').val(placesCovered)
    })
    $('#viewTour').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var name = button.data('myname')
        var description = button.data('mydescription')
        var tid = button.data('myid')
        var price = button.data('myprice')
        var placesCovered = button.data('myplacescovered')
        var image = button.data('myimage')

        var priceTag = price + '/- per person';
        var imgpth = "images/tour-package-images/" + image;

        var modal = $(this)
        modal.find('.modal-header #viewTourLabel').text(name)
        modal.find('.modal-body #viewTourDescription').text(description)
        modal.find('.modal-body #viewTourPlacesCovered').text(placesCovered)
        modal.find('.modal-body #viewTourPrice').text(priceTag)
        modal.find('.modal-body #viewTourImg').attr('src', imgpth)
        modal.find('.modal-body #viewTourImg').attr('alt', name)

        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #description').val(description)
        modal.find('.modal-body #price').val(price)
        modal.find('.modal-body #tid').val(tid)
        modal.find('.modal-body #places_covered').val(placesCovered)
    })
    $('#viewPackage').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var name = button.data('myname')
        var description = button.data('mydescription')
        var pid = button.data('myid')
        var price = button.data('myprice')
        var placesCovered = button.data('myplacescovered')
        var image = button.data('myimage')

        var priceTag = price + '/- per person';
        var imgpth = "images/package-images/" + image;

        var modal = $(this)
        modal.find('.modal-header #viewPackageLabel').text(name)
        modal.find('.modal-body #viewPackageDescription').text(description)
        modal.find('.modal-body #viewPackagePlacesCovered').text(placesCovered)
        modal.find('.modal-body #viewPackagePrice').text(priceTag)
        modal.find('.modal-body #viewPackageImg').attr('src', imgpth)
        modal.find('.modal-body #viewPackageImg').attr('alt', name)

        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #description').val(description)
        modal.find('.modal-body #price').val(price)
        modal.find('.modal-body #p_id').val(pid)
        modal.find('.modal-body #places_covered').val(placesCovered)
    })

    $('#editBooking').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var bid = button.data('myid')
        var status = button.data('mystatus')


        var modal = $(this)
        modal.find('.modal-body #b_id').val(bid)
        modal.find('.modal-body #status').val(status)
    })

    // Adding classes to my booking
    $("#confirmed").addClass("bg-success");
    $("#pending").addClass("bg-warning");
    $("#cancelled").addClass("bg-danger");
});
