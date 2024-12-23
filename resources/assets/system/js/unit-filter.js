$(document).ready(function () {
    let srcImgEdit = $('#edit-img').attr('src');
    let srcImgDelete = $('#delete-img').attr('src');
    let srcImgAc = $('#ac-img').attr('src');
    let srcImgInac = $('#inac-img').attr('src');
    let urlEditUnit = "http://localhost/dacs2/unit-edit/";

    function ajaxFilterunit(data) {
        let row = "";

        data.units.forEach(function (unit) {

            row +=
                '<tr>'
                + '<td>'
                + '<label class="checkboxs">'
                + '<input type="checkbox" />'
                + '<span class="checkmarks"></span>'
                + '</label>'
                + '</td>'
                + '<td>' + unit.name + '</td>';
            if (unit.active) {
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
                + '<a class="me-3" href="' + urlEditUnit + unit.id + '">'
                + '<img id = "edit-img" src="' + srcImgEdit + '" alt="img" />'
                + '</a>'
                + '<a class="me-3 delete-confirm" href="javascript:void(0);" data-model="unit" data-id="' + unit.id + '" data-name="' + unit.name + '">'
                + '<img id = "delete-img" src="' + srcImgDelete + '" alt="img" />'
                + '</a>'
                + '</td>'
                + '</tr>';
        });

        return row;
    }

    $('#unit-filter-active').change(function () {
        $('#unit-filter').submit();
    });

    $('#unit-filter').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "http://localhost/dacs2/filter-unit",
            type: "GET",
            data: $('#unit-filter').serialize(),
            dataType: "json",
            success: function (response) {
                let rows = ajaxFilterunit(response);
                $('#unit-table').html(rows);
            },
            error: function (error) {
                console.error("Error: " + error);
            }
        });
    });
});