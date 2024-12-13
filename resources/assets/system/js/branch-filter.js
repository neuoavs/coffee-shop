$(document).ready(function () {
    // Hàm xử lý Ajax filter cho branch
    let srcImgEdit = $('#edit-img').attr('src');
    let urlEditBranch = "http://localhost/dacs2/branch-edit/";
    // let urlEditProduct = "http://localhost/dacs2/product-edit/";
    let srcImgDelete = $('#delete-img').attr('src');

    function ajaxFilterBranch(data) {
        let row = "";

        data.branches.forEach(function (branch) {

            row +=
                '<tr>' +
                '<td>' +
                '<label class="checkboxs">' +
                '<input type="checkbox" />' +
                '<span class="checkmarks">' +
                '</span></label></td><td>' + branch.name + '</td>' +
                '<td>' + branch.address + '</td>' +
                '<td>' + branch.province + '</td>' +
                '<td>' + branch.district + '</td>' +
                '<td>' + branch.ward + '</td>' +
                '<td>' +
                '<a class="me-3" href="' + urlEditBranch + branch.id + '">' +
                '<img id = "edit-img" src="' + srcImgEdit + '" alt="img" />' +
                '</a>' +
                '<a class="me-3 delete-confirm" href="javascript:void(0);" data-model="branch" data-id="' + branch.id + '" data-name="' + branch.name + '">' +
                '<img id = "delete-img" src="' + srcImgDelete + '" alt="img" />' +
                '</a>' +
                '</td>' +
                '</tr>';
        });

        return row;
    }

    $('#branch-filter-province').change(function () {
        $('#branch-filter').submit();
    });

    $('#branch-filter').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "http://localhost/dacs2/filter-branch",
            type: "GET",
            data: $('#branch-filter').serialize(),
            dataType: "json",
            success: function (response) {
                let rows = ajaxFilterBranch(response);
                $('#branch-table').html(rows);
            },
            error: function (error) {
                console.error("Error: " + error);
            }
        });
    });
});