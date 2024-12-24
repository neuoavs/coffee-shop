$(document).ready(function () {
    let change = false;

    $('#begin_hour').change(function () {
        let bh = parseInt($('#begin_hour').val(), 10);
        // End hour
        row = '<option disabled value="00">Choose</option>';

        for (let index = bh; index < 24; index++) {
            if (index === bh) {
                num = index < 10 ? '0' + index : index.toString();
                row += '<option selected value="' + num + '">' + num + '</option>';
            } else {
                num = index < 10 ? '0' + index : index.toString();
                row += '<option value="' + num + '">' + num + '</option>';
            }
        }
        $('#end_hour').html(row);
        // End hour

        // End minute
        if (!change) {
            row = '<option disabled selected value="00">Choose</option>';

            for (let index = 0; index < 60; index++) {
                num = index < 10 ? '0' + index : index.toString();
                row += '<option value="' + num + '">' + num + '</option>';
            }
            $('#end_minute').html(row);
        }
        // End minute

        // End second
        if (!change) {
            change = true;
            row = '<option disabled selected value="00">Choose</option>';

            for (let index = 0; index < 60; index++) {
                num = index < 10 ? '0' + index : index.toString();
                row += '<option value="' + num + '">' + num + '</option>';
            }
            $('#end_second').html(row);
        }
        // End second
    });
});