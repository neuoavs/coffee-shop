$(document).ready(function () {
    let srcImgEdit = $('#edit-img').attr('src');
    let srcImgDelete = $('#delete-img').attr('src');
    let srcImgAc = $('#ac-img').attr('src');
    let srcImgInac = $('#inac-img').attr('src');
    let urlEditViolation = "http://localhost/dacs2/violation-edit/";

    function ajaxFilterViolation(data) {
        let row = "";

        data.violations.forEach(function (violation) {

            row +=
                '<tr>'
                + '<td>'
                + '<label class="checkboxs">'
                + '<input type="checkbox" />'
                + '<span class="checkmarks"></span>'
                + '</label>'
                + '</td>'
                + '<td>' + violation.name + '</td>'
                + '<td>' + violation.fine_amount + '</td>';
            if (violation.active) {
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
                + '<a class="me-3" href="' + urlEditViolation + violation.id + '">'
                + '<img id = "edit-img" src="' + srcImgEdit + '" alt="img" />'
                + '</a>'
                + '<a class="me-3 delete-confirm" href="javascript:void(0);" data-model="violation" data-id="' + violation.id + '" data-name="' + violation.name + '">'
                + '<img id = "delete-img" src="' + srcImgDelete + '" alt="img" />'
                + '</a>'
                + '</td>'
                + '</tr>';
        });

        return row;
    }

    $('#violation-filter-active').change(function () {
        $('#violation-filter').submit();
    });

    $('#violation-filter-fine-amount').change(function () {
        $('#violation-filter').submit();
    });

    $('#violation-filter').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "http://localhost/dacs2/filter-violation",
            type: "GET",
            data: $('#violation-filter').serialize(),
            dataType: "json",
            success: function (response) {
                let rows = ajaxFilterViolation(response);
                $('#violation-table').html(rows);
            },
            error: function (error) {
                console.error("Error: " + error);
            }
        });
    });
});