$(document).ready(function () {
    let srcImgEdit = $('#edit-img').attr('src');
    let srcImgDelete = $('#delete-img').attr('src');
    let srcImgAc = $('#ac-img').attr('src');
    let srcImgInac = $('#inac-img').attr('src');
    let urlEditBranchEmployee = "http://localhost/dacs2/branch-employee-edit/";

    function ajaxFilterBranchEmployee(data) {
        let row = "";

        data.branchEmployee.forEach(function (be) {

            row +=
                '<tr>'
                + '<td>'
                + '<label class="checkboxs">'
                + '<input type="checkbox" />'
                + '<span class="checkmarks"></span>'
                + '</label>'
                + '</td>'
                + '<td>' + be.employee.nickname + '</td>'
                + '<td>' + be.branch.name + '</td>';
            if (be.active) {
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
                + '<a class="me-3" href="' + urlEditBranchEmployee + be.id + '">'
                + '<img id = "edit-img" src="' + srcImgEdit + '" alt="img" />'
                + '</a>'
                + '<a class="me-3 delete-confirm" href="javascript:void(0);" data-model="be" data-id="' + be.id + '" data-name="' + be.name + '">'
                + '<img id = "delete-img" src="' + srcImgDelete + '" alt="img" />'
                + '</a>'
                + '</td>'
                + '</tr>';
        });

        return row;
    }

    $('#branch-employee-filter-active').change(function () {
        $('#branch-employee-filter').submit();
    });

    $('#branch-employee-filter-branch').change(function () {
        $('#branch-employee-filter').submit();
    });

    $('#branch-employee-filter').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "http://localhost/dacs2/filter-branch-employee",
            type: "GET",
            data: $('#branch-employee-filter').serialize(),
            dataType: "json",
            success: function (response) {
                let rows = ajaxFilterBranchEmployee(response);
                $('#branch-employee-table').html(rows);
            },
            error: function (error) {
                console.error("Error: " + error);
            }
        });
    });
});