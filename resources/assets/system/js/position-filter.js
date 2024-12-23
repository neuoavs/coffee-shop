$(document).ready(function () {
    let srcImgEdit = $('#edit-img').attr('src');
    let srcImgDelete = $('#delete-img').attr('src');
    let srcImgAc = $('#ac-img').attr('src');
    let srcImgInac = $('#inac-img').attr('src');
    let urlEditposition = "http://localhost/dacs2/position-edit/";

    function ajaxFilterposition(data) {
        let row = "";

        data.positions.forEach(function (position) {

            row +=
                '<tr>'
                + '<td>'
                + '<label class="checkboxs">'
                + '<input type="checkbox" />'
                + '<span class="checkmarks"></span>'
                + '</label>'
                + '</td>'
                + '<td>' + position.name + '</td>';
            if (position.active) {
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
                + '<a class="me-3" href="' + urlEditposition + position.id + '">'
                + '<img id = "edit-img" src="' + srcImgEdit + '" alt="img" />'
                + '</a>'
                + '<a class="me-3 delete-confirm" href="javascript:void(0);" data-model="position" data-id="' + position.id + '" data-name="' + position.name + '">'
                + '<img id = "delete-img" src="' + srcImgDelete + '" alt="img" />'
                + '</a>'
                + '</td>'
                + '</tr>';
        });

        return row;
    }

    $('#position-filter-active').change(function () {
        $('#position-filter').submit();
    });

    $('#position-filter').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "http://localhost/dacs2/filter-position",
            type: "GET",
            data: $('#position-filter').serialize(),
            dataType: "json",
            success: function (response) {
                let rows = ajaxFilterposition(response);
                $('#position-table').html(rows);
            },
            error: function (error) {
                console.error("Error: " + error);
            }
        });
    });
});