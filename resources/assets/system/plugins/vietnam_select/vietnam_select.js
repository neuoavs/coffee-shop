const host = "https://provinces.open-api.vn/api/";

const callApiProvince = async (api) => {
    const response = await axios.get(api);
    renderData(response.data, "province");
};

const callApiDistrict = async (api) => {
    const response = await axios.get(api);
    renderData(response.data.districts, "district");
};

const callApiWard = async (api) => {
    const response = await axios.get(api);
    renderData(response.data.wards, "ward");
};

const callApiProvinceFilter = async (api) => {
    const response = await axios.get(api);
    renderData(response.data, "branch-filter-province");
};

const renderData = (array, select) => {
    let row =
        '<option disabled selected value="">Choose</option>';
    let rowFilter = '<option selected value="">Choose province</option>';
    switch (select) {
        case "province":
            const province = sessionStorage.getItem("province");
            console.log("Selected province from sessionStorage:", province);

            array.forEach((element) => {
                if (element.name === province) {
                    row += `<option selected value="${element.name}">${element.name}</option>`;
                    sessionStorage.removeItem("province");
                    callApiDistrict(host + "p/" + element.code + "?depth=2");
                } else {
                    row += `<option value="${element.code}-${element.name}">${element.name}</option>`;
                }
            });
            break;

        case "district":
            const district = sessionStorage.getItem("district");
            console.log("Selected district from sessionStorage:", district);

            array.forEach((element) => {
                if (element.name === district) {
                    row += `<option selected value="${element.name}">${element.name}</option>`;
                    sessionStorage.removeItem("district");
                    callApiWard(host + "d/" + element.code + "?depth=2");
                } else {
                    row += `<option value="${element.code}-${element.name}">${element.name}</option>`;
                }
            });
            break;

        case "ward":
            const ward = sessionStorage.getItem("ward");
            console.log("Selected ward from sessionStorage:", ward);

            array.forEach((element) => {
                if (element.name === ward) {
                    row += `<option selected value="${element.name}">${element.name}</option>`;
                    sessionStorage.removeItem("ward");
                } else {
                    row += `<option value="${element.name}">${element.name}</option>`;
                }
            });
            break;
        case "branch-filter-province":
            array.forEach((element) => {
                rowFilter += `<option value="${element.name}">${element.name}</option>`;
            });
            break;
        default:
            break;
    }
    if (select === "branch-filter-province") {
        $("#" + select).html(rowFilter);
    } else {
        $("#" + select).html(row);
    }
};

function setUp() {
    if ($("#branch-filter-province")) {
        callApiProvinceFilter(host + "?depth=1");
    }

    if ($("#province") && $("#district") && $("#ward")) {
        callApiProvince(host + "?depth=1");

        $("#province").change(() => {
            const province = $("#province").find("option:selected");
            const provinceValue = province.val();
            const codeAndName = provinceValue.split("-");

            callApiDistrict(host + "p/" + codeAndName[0] + "?depth=2");

            province.val(codeAndName[1]);

            $("#district").html(
                '<option disabled selected value="">Choose</option>'
            );
            $("#ward").html(
                '<option disabled selected value="">Choose</option>'
            );
        });

        $("#district").change(() => {
            const district = $("#district").find("option:selected");
            const districtValue = district.val();
            const codeAndName = districtValue.split("-");

            callApiWard(host + "d/" + codeAndName[0] + "?depth=2");

            district.val(codeAndName[1]);

            $("#ward").html(
                '<option disabled selected value="">Choose</option>'
            );
        });
    }
}


setUp();