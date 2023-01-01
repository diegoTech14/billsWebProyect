export function showTable(allUsers, table) {
    table.innerHTML = '<tr>';

    for (let index = 0; index < allUsers.length; index++) {

        let complete_name = allUsers[index]["nombre"] + " " + allUsers[index]["apellido_uno"] + " " + allUsers[index]["apellido_dos"];
        table.innerHTML += '<th scope="row">' + allUsers[index]["cedula"] + '</th>' +
            '<td>' + complete_name + '</td>' +
            '<td>' + allUsers[index]["nombre_usuario"] + '</td>' +
            '<td>' + allUsers[index]["numero_maquina"] + '</td>' +
            '<td>' + allUsers[index]["estado"] + '</td>' +
            '<td>' +
            '<button class="btn btn-danger m-1">Deshabilitar</button>' +
            '<button class="btn btn-success">Actualizar</button>' +
            '</td>';
    }
    table.innerHTML += '</tr>' +
        '</tr>';
}

export function numberOfPages(rows, selectEntries) {
    let panelNumbers = document.getElementById("numbers");
    let quantityPages = rows / parseInt(selectEntries.value);

    panelNumbers.innerHTML = "";

    for (let i = 0; i < quantityPages; i++) {
        panelNumbers.innerHTML += "<button class='btn btn-light m-1'>" + (i + 1) + "</button>";
    }
}


// display the specific quantity of rows
export function trimData(data, end, start) {
  
    let dataResume = [];
    let counter = 0;
    
    if((start >= 0 && end >= 3) && end <= data.length){
  
      for (let i = start; i < end; i++) {
        if(data[i] != undefined){
          dataResume[counter++] = data[i];
        }
      }
  
    }
    return dataResume;
  }