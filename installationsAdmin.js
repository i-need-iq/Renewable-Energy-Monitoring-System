var selectedRow = null

function onFormSubmit() {
        var formData = readFormData();
        if (selectedRow == null)
            insertNewRecord(formData);
        else
            updateRecord(formData);
        resetForm();
        toggle();
}

function readFormData() {
    var formData = {};
    formData["device_id"] = document.getElementById("device_id").value;
    formData["latitude"] = document.getElementById("latitude").value;
    formData["longitude"] = document.getElementById("longitude").value;
    formData["install_date"] = document.getElementById("install_date").value;
    formData["last_update"] = document.getElementById("last_update").value;
    formData["service_due"] = document.getElementById("service_due").value;
    formData["output"] = document.getElementById("output").value;
    formData["max_output"] = document.getElementById("max_output").value;
    formData["power_max"] = document.getElementById("power_max").value;
    formData["efficiency"] = document.getElementById("efficiency").value;
    formData["rated_eff"] = document.getElementById("rated_eff").value;
    formData["machine_state"] = document.getElementById("machine_state").value;
    return formData;
}

function insertNewRecord(data) {
    var table = document.getElementById("bazarList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
    cell1.innerHTML = data.device_id;
    cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.latitude;
    cell3 = newRow.insertCell(2);
    cell3.innerHTML = data.longitude;
    cell4 = newRow.insertCell(3);
    cell4.innerHTML = data.install_date;
    cell5 = newRow.insertCell(4);
    cell5.innerHTML = data.last_update;
    cell6 = newRow.insertCell(5);
    cell6.innerHTML = data.service_due;
    cell7 = newRow.insertCell(6);
    cell7.innerHTML = data.output;
    cell8 = newRow.insertCell(7);
    cell8.innerHTML = data.max_output;
    cell9 = newRow.insertCell(8);
    cell9.innerHTML = data.power_max;
    cell10 = newRow.insertCell(9);
    cell10.innerHTML = data.efficiency;
    cell11 = newRow.insertCell(10);
    cell11.innerHTML = data.rated_eff;
    cell12 = newRow.insertCell(11);
    cell12.innerHTML = data.machine_state;
    cell13 = newRow.insertCell(12);
    cell13.innerHTML = `<a onClick="onEdit(this);toggle()"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                       <a onClick="onDelete(this)"><i class="fa fa-remove" style="margin-left:5px;color:red"></i></a>`;
}

function resetForm() {
    document.getElementById("device_id").value = "";
    document.getElementById("latitude").value = "";
    document.getElementById("longitude").value = "";
    document.getElementById("install_date").value = "";
    document.getElementById("last_update").value = "";
    document.getElementById("service_due").value = "";
    document.getElementById("output").value = "";
    document.getElementById("max_output").value = "";
    document.getElementById("power_max").value = "";
    document.getElementById("efficiency").value = "";
    document.getElementById("rated_eff").value = "";
    document.getElementById("machine_state").value = "";
    selectedRow = null;
}

function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("device_id").value = selectedRow.cells[0].innerHTML;
    document.getElementById("latitude").value = selectedRow.cells[1].innerHTML;
    document.getElementById("longitude").value = selectedRow.cells[2].innerHTML;
    document.getElementById("install_date").value = selectedRow.cells[3].innerHTML;
    document.getElementById("last_update").value = selectedRow.cells[4].innerHTML;
    document.getElementById("service_due").value = selectedRow.cells[5].innerHTML;
    document.getElementById("output").value = selectedRow.cells[6].innerHTML;
    document.getElementById("max_output").value = selectedRow.cells[7].innerHTML;
    document.getElementById("power_max").value = selectedRow.cells[8].innerHTML;
    document.getElementById("efficiency").value = selectedRow.cells[9].innerHTML;
    document.getElementById("rated_eff").value = selectedRow.cells[10].innerHTML;
    document.getElementById("machine_state").value = selectedRow.cells[11].innerHTML;
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.device_id;
    selectedRow.cells[1].innerHTML = formData.latitude;
    selectedRow.cells[2].innerHTML = formData.longitude;
    selectedRow.cells[3].innerHTML = formData.install_date;
    selectedRow.cells[4].innerHTML = formData.last_update;
    selectedRow.cells[5].innerHTML = formData.service_due;
    selectedRow.cells[6].innerHTML = formData.output;
    selectedRow.cells[7].innerHTML = formData.max_output;
    selectedRow.cells[8].innerHTML = formData.power_max;
    selectedRow.cells[9].innerHTML = formData.efficiency;
    selectedRow.cells[10].innerHTML = formData.rated_eff;
    selectedRow.cells[11].innerHTML = formData.machine_state;
}

function onDelete(td) {
    if (confirm('Are you sure to delete this record ?')) {
        row = td.parentElement.parentElement;
        document.getElementById("bazarList").deleteRow(row.rowIndex);
        resetForm();
    }
}


function toggle(){
    $("#reserveModal").modal("toggle");
}
