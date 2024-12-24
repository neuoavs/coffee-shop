$(document).ready(function () {
    let srcImgEdit = $('#edit-img').attr('src');
    let srcImgDelete = $('#delete-img').attr('src');
    let srcImgAc = $('#ac-img').attr('src');
    let srcImgInac = $('#inac-img').attr('src');
    let urlEditShift = "http://localhost/dacs2/shift-edit/";

    function ajaxFilterShift(data) {
        let row = "";

        data.shifts.forEach(function (shift) {

            row +=
                '<tr>'
                + '<td>'
                + '<label class="checkboxs">'
                + '<input type="checkbox" />'
                + '<span class="checkmarks"></span>'
                + '</label>'
                + '</td>'
                + '<td>' + shift.name + '</td>'
                + '<td>' + shift.begin_time + '</td>'
                + '<td>' + shift.end_time + '</td>';
            if (shift.active) {
                row +=
                    '<td>'
                    + '<img id = "ac-img" src="' + srcImgAc + '" alt="img" />'
                    + '</td>';
            } else {
                row +=
                    '<td>'
                    + '<img id = "inac-img" src="' + srcImgInac + '" alt="img" />'
                    + '</td>';
            }
            row +=
                '<td>'
                + '<a class="me-3" href="' + urlEditShift + shift.id + '">'
                + '<img id = "edit-img" src="' + srcImgEdit + '" alt="img" />'
                + '</a>'
                + '<a class="me-3 delete-confirm" href="javascript:void(0);" data-model="shift" data-id="' + shift.id + '" data-name="' + shift.name + '">'
                + '<img id = "delete-img" src="' + srcImgDelete + '" alt="img" />'
                + '</a>'
                + '</td>'
                + '</tr>';
        });

        return row;
    }

    $('#shift-filter-active').change(function () {
        $('#shift-filter').submit();
    });
    // $('#shift-filter-time-space').change(function () {
    //     $('#shift-filter').submit();
    // });
    $('#shift-filter').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "http://localhost/dacs2/filter-shift",
            type: "GET",
            data: $('#shift-filter').serialize(),
            dataType: "json",
            success: function (response) {
                let rows = ajaxFilterShift(response);
                $('#shift-table').html(rows);
            },
            error: function (error) {
                console.error("Error: " + error);
            }
        });
    });
});