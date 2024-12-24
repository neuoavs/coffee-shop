$(document).ready(function () {
    let srcImgEdit = $('#edit-img').attr('src');
    let srcImgDelete = $('#delete-img').attr('src');
    let srcImgAc = $('#ac-img').attr('src');
    let srcImgInac = $('#inac-img').attr('src');
    let urlEditItem = "http://localhost/dacs2/item-edit/";

    function ajaxFilterItem(data) {
        let row = "";

        data.items.forEach(function (item) {
            let itemImage = window.location.origin + '/dacs2/' + item.image;

            if (item.description === null) {
                item.description = "";
            }

            row +=
                '<tr>'
                + '<td>'
                + '<label class="checkboxs">'
                + '<input type="checkbox" />'
                + '<span class="checkmarks"></span>'
                + '</label>'
                + '</td>'
                + '<td>' + item.name + '</td>'
                + '<td>' + item.amount + '</td>'
                + '<td>' + item.unit.name + '</td>'
                + '<td>'
                + '<img class = "image-sheet" src="' + itemImage + '" alt="' + item.name + '"/>'
                + '</td> '
                + '<td>' + item.branch.name + '</td>';
            if (item.active) {
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
                + '<a class="me-3" href="' + urlEditItem + item.id + '">'
                + '<img id = "edit-img" src="' + srcImgEdit + '" alt="img" />'
                + '</a>'
                + '<a class="me-3 delete-confirm" href="javascript:void(0);" data-model="item" data-id="' + item.id + '" data-name="' + item.name + '">'
                + '<img id = "delete-img" src="' + srcImgDelete + '" alt="img" />'
                + '</a>'
                + '</td>'
                + '</tr>';
        });

        return row;
    }
    $('#item-filter-active').change(function () {
        $('#item-filter').submit();
    });
    $('#item-filter-unit').change(function () {
        $('#item-filter').submit();
    });
    $('#item-filter-branch').change(function () {
        $('#item-filter').submit();
    });

    $('#item-filter').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "http://localhost/dacs2/filter-item",
            type: "GET",
            data: $('#item-filter').serialize(),
            dataType: "json",
            success: function (response) {
                let rows = ajaxFilterItem(response);
                $('#item-table').html(rows);
                console.log(response);
            },
            error: function (error) {
                console.error("Error: " + error);
            }
        });
    });
});


