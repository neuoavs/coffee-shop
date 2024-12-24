$(document).ready(function () {
    // Hàm xử lý Ajax filter cho employee
    let srcImgEdit = $('#edit-img').attr('src');
    let urlEditEmployee = "http://localhost/dacs2/employee-edit/";
    let srcImgDelete = $('#delete-img').attr('src');

    function ajaxFilterEmployee(data) {
        let row = "";
        data.employees.forEach(function (employee) {
            row +=
                '<tr>' +
                '<td>' +
                '<label class="checkboxs">' +
                '<input type="checkbox" />' +
                '<span class="checkmarks">' +
                '</span>' +
                '</label>' +
                '</td>' +
                '<td>' + employee.id + '</td>' +
                '<td>' + employee.nickname + '</td>' +
                '<td>' + employee.citizen_identification + '</td>' +
                '<td>' + employee.phone_number + '</td>' +
                '<td>' + employee.salary_coefficient + '</td>' +
                '<td>' + employee.position.name + '</td>' +
                '<td>' +
                '<a class="me-3" href="' + urlEditEmployee + employee.id + '">' +
                '<img id = "edit-img" src="' + srcImgEdit + '" alt="img" />' +
                '</a>' +
                '<a class="me-3 delete-confirm" href="javascript:void(0);" data-model="employee" data-id="' + employee.id + '" data-name="' + employee.name + '">' +
                '<img id = "delete-img" src="' + srcImgDelete + '" alt="img" />' +
                '</a>' +
                '</td>' +
                '</tr>';
        });

        return row;
    }

    // $('#employee-filter-position').change(function () {
    //     $('#employee-filter').submit();
    // });
    $('#employee-filter-salary-coefficient').change(function () {
        $('#employee-filter').submit();
    });

    $('#employee-filter').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "http://localhost/dacs2/filter-employee",
            type: "GET",
            data: $('#employee-filter').serialize(),
            dataType: "json",
            success: function (response) {
                let rows = ajaxFilterEmployee(response);
                $('#employee-table').html(rows);
            },
            error: function (error) {
                console.error("Error: " + error);
            }
        });
    });
});