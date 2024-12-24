$(document).ready(function () {
    let srcImgEdit = $('#edit-img').attr('src');
    let srcImgDelete = $('#delete-img').attr('src');
    let srcImgAc = $('#ac-img').attr('src');
    let srcImgInac = $('#inac-img').attr('src');
    let urlEditProduct = "http://localhost/dacs2/product-edit/";

    function ajaxFilterProduct(data) {
        let row = "";

        data.products.forEach(function (product) {
            let productImage = window.location.origin + '/dacs2/' + product.image;

            if (product.description === null) {
                product.description = "";
            }

            row +=
                '<tr>'
                + '<td>'
                + '<label class="checkboxs">'
                + '<input type="checkbox" />'
                + '<span class="checkmarks"></span>'
                + '</label>'
                + '</td>'
                + '<td>' + product.name + '</td>'
                + '<td>' + product.menu.name + '</td>'
                + '<td>' + product.description + '</td>'
                + '<td>' + product.price + '</td>'
                + '<td>'
                + '<img class = "image-sheet" src="' + productImage + '" alt="' + product.name + '"/>'
                + '</td> ';

            if (product.active) {
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
                + '<a class="me-3" href="' + urlEditProduct + product.id + '">'
                + '<img id = "edit-img" src="' + srcImgEdit + '" alt="img" />'
                + '</a>'
                + '<a class="me-3 delete-confirm" href="javascript:void(0);" data-model="product" data-id="' + product.id + '" data-name="' + product.name + '">'
                + '<img id = "delete-img" src="' + srcImgDelete + '" alt="img" />'
                + '</a>'
                + '</td>'
                + '</tr>';
        });

        return row;
    }
    $('#product-filter-active').change(function () {
        $('#product-filter').submit();
    });
    $('#product-filter-menu').change(function () {
        $('#product-filter').submit();
    });
    $('#product-filter-price').change(function () {
        $('#product-filter').submit();
    });

    $('#product-filter').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "http://localhost/dacs2/filter-product",
            type: "GET",
            data: $('#product-filter').serialize(),
            dataType: "json",
            success: function (response) {
                let rows = ajaxFilterProduct(response);
                $('#product-table').html(rows);
                console.log(response);
            },
            error: function (error) {
                console.error("Error: " + error);
            }
        });
    });
});


