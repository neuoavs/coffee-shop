$(document).ready(function () {
    let srcImgEdit = $('#edit-img').attr('src');
    let srcImgDelete = $('#delete-img').attr('src');
    let srcImgAc = $('#ac-img').attr('src');
    let srcImgInac = $('#inac-img').attr('src');
    let urlEditMenu = "http://localhost/dacs2/menu-edit/";

    function ajaxFiltermenu(data) {
        let row = "";

        data.menus.forEach(function (menu) {

            row +=
                '<tr>'
                + '<td>'
                + '<label class="checkboxs">'
                + '<input type="checkbox" />'
                + '<span class="checkmarks"></span>'
                + '</label>'
                + '</td>'
                + '<td>' + menu.name + '</td>';
            if (menu.active) {
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
                + '<a class="me-3" href="' + urlEditMenu + menu.id + '">'
                + '<img id = "edit-img" src="' + srcImgEdit + '" alt="img" />'
                + '</a>'
                + '<a class="me-3 delete-confirm" href="javascript:void(0);" data-model="menu" data-id="' + menu.id + '" data-name="' + menu.name + '">'
                + '<img id = "delete-img" src="' + srcImgDelete + '" alt="img" />'
                + '</a>'
                + '</td>'
                + '</tr>';
        });

        return row;
    }

    $('#menu-filter-active').change(function () {
        $('#menu-filter').submit();
    });

    $('#menu-filter').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "http://localhost/dacs2/filter-menu",
            type: "GET",
            data: $('#menu-filter').serialize(),
            dataType: "json",
            success: function (response) {
                let rows = ajaxFiltermenu(response);
                $('#menu-table').html(rows);
            },
            error: function (error) {
                console.error("Error: " + error);
            }
        });
    });
});