import { orderingUsersDesc, orderingUsersAsc, orderingUsersDescByName, orderingUsersAscByName } from './orderAlgo.js';

var inpurSearch = document.getElementById("parameterSearch");
var table = document.getElementById("tbody");
var clippedData;
var quantityRows = 0;
var start = 0;
var end = 3;
var value = 0;

function showTable(allUsers) {
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

// display the specific quantity of rows
function trimData(data) {
  
  let dataResume = [];
  let counter = 0;

  if((start >= 0 && end >= 3) && end <= data.length){
    for (let i = start; i < end; i++) {
      if(data[i] != undefined){
        dataResume[counter++] = data[i];
      }
    }
  }
  console.log(dataResume);
  return dataResume;
}

function userFetchSearch() {

  let dataForm = new FormData();
  dataForm.append("parameterSearch", inpurSearch.value);

  const url = "queries/queryUserSearch.php";

  fetch(url, {
    method: "POST",
    body: dataForm
  })
    .then(response => response.json())
    .then((data) => {

      clippedData = trimData(data);
      if (data == "") {
        usersFetch();

      } else {
        showTable(data);

      }
    }).catch(error => alert(error));
}


function usersFetch() {
  const url = "queries/queryUsers.php";
  fetch(url)
    .then(response => response.json())
    .then(function (data) {
      
      clippedData = trimData(data);
      
      quantityRows = data.length;
      if (value == 1) {
        showTable(orderingUsersDesc(clippedData, "cedula"));

      } else if (value == 4) {
        showTable(orderingUsersDesc(clippedData, "estado"));

      } else if (value == 2) {
        showTable(orderingUsersAsc(clippedData, "cedula"));

      } else if (value == 3) {
        showTable(orderingUsersAsc(clippedData, "estado"));

      } else if (value == 5) {
        showTable(orderingUsersAscByName(clippedData, "nombre"));

      } else if (value == 6) {
        showTable(orderingUsersDescByName(clippedData, "nombre"));

      }else if(value == 0){
        showTable(clippedData);
      }
    }).catch(error => alert(error));
}


function changingValueClick(data) {
  value = data;
}

document.getElementById("parameterSearch").addEventListener("input", () => {
  userFetchSearch();
});

document.getElementById("orderingCedula").addEventListener("click", () => {
  if (value == 0 || value == 2) {
    changingValueClick(1);

  } else {
    changingValueClick(2);
  }
  usersFetch();
});

document.getElementById("orderingStatus").addEventListener("click", () => {
  if (value == 0 || value == 4) {
    changingValueClick(3);

  } else {
    changingValueClick(4);

  }
  usersFetch();
});

document.getElementById("orderingName").addEventListener("click", () => {
  if (value == 0 || value == 5) {
    changingValueClick(6);

  } else {
    changingValueClick(5);

  }
  usersFetch();
});

document.getElementById("left-btn").addEventListener("click", () =>{
  if(start > 0){
    start -= 3;
    end -= 2;
  }
  usersFetch();
});

document.getElementById("right-btn").addEventListener("click", () =>{
  if(end <= quantityRows-1){
    start += 3;
    end += 2;
  }
  usersFetch();
});

usersFetch();
