$(document).ready(function () {
    let srcImgEdit = $('#edit-img').attr('src');
    let urlEditProduct = "http://localhost/dacs2/product-edit/";
    let srcImgDelete = $('#delete-img').attr('src');

    function ajaxFilterProduct(data) {
        let row = "";

        data.products.forEach(function (product) {

            row +=
                '<tr>' +
                '<td>' +
                '<label class="checkboxs">' +
                '<input type="checkbox" />' +
                '<span class="checkmarks">' +
                '</span>' +
                '</label>' +
                '</td>' +
                '<td>' + product.name + '</td>' +
                // '<td>' + product.menu.name + '</td> ' +
                '<td>' +
                '<img src="{{ asset(' + product.image + ') }}" alt="' + product.name + '" style="width: 100px; height: auto;" />' +
                '</td> ' +
                '<td>' + product.cost + '</td>' +
                '<td>' +
                '<a class="me-3" href="' + urlEditProduct + product.id + '">' +
                '<img id = "edit-img" src="' + srcImgEdit + '" alt="img" />' +
                '</a>' +
                '<a class="me-3 delete-confirm" href="javascript:void(0);" data-model="product" data-id="{{$pr->id}}" data-name="{{$pr->name}}">' +
                '<img id = "delete-img" src="' + srcImgDelete + '" alt="img" />' +
                '</a>' +
                '</td>' +
                '</tr>';
        });

        return row;
    }



    $('#product-filter-menu').change(function () {
        // alert();
        $('#product-filter').submit();
    });

    $('#product-filter-cost').change(function () {
        // alert();
        $('#product-filter').submit();
    });

    $('#product-filter').submit(function (e) {
        // e.preventDefault();
        // let formData = new FormData(this);

        // $.ajax({
        //     url: "http://localhost/dacs2/filter-product",
        //     type: "GET",
        //     data: formData,
        //     processData: false,
        //     contentType: false,
        //     dataType: "json",
        //     success: function (response) {
        //         let rows = ajaxFilterProduct(response);
        //         $('#product-table').html(rows);
        //     },
        //     error: function (error) {
        //         console.log("Error: " + error);
        //     }
        // });
    });
});


