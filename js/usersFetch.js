import { orderingUsersDesc, orderingUsersAsc, orderingUsersDescByName, orderingUsersAscByName } from './orderAlgo.js';
import { showTable, numberOfPages, trimData } from './tableFunctions.js';

var elements = {
  inputSearch: document.getElementById("parameterSearch"),
  selectEntries: document.getElementById("select-entries"),
  table: document.getElementById("tbody")
}

var counters = {
  value: 0,
  start: 0,  
  end: 3
}

var clippedData;
var totalQuantityRows = 0;


function userFetchSearch() {

  let dataForm = new FormData();
  dataForm.append("parameterSearch", elements.inputSearch.value);

  const url = "queries/queryUserSearch.php";

  fetch(url, {
    method: "POST",
    body: dataForm
  })
    .then(response => response.json())
    .then((data) => {

      if (data == "") {
        usersFetch();

      } else {
        showTable(data, elements.table);

      }
    }).catch(error => alert(error));
}


function validatingValues(value, orderingParameters){
  let functions = [showTable(orderingUsersDesc(clippedData, orderingParameters[0]), elements.table)];
  //console.log(functions[value]);

  if (value == 1) {
    functions[value];

  } else if (value == 2) {
    showTable(orderingUsersAsc(clippedData, orderingParameters[0]), elements.table);

  }if (value == 3) {
    showTable(orderingUsersAsc(clippedData, orderingParameters[1]), elements.table);

  } else if (value == 4) {
    showTable(orderingUsersDesc(clippedData, orderingParameters[1]), elements.table);

  } else if (value == 5) {
    showTable(orderingUsersAscByName(clippedData, orderingParameters[2]), elements.table);

  } else if (value == 6) {
    showTable(orderingUsersDescByName(clippedData, orderingParameters[2]), elements.table);

  }
}

function usersFetch() {
  const url = "queries/queryUsers.php";
  fetch(url)
    .then(response => response.json())
    .then(function (data) {
      
      clippedData = trimData(data, counters.end, counters.start);
      totalQuantityRows = data.length;
      
      let orderingParameters = ["cedula", "estado", "nombre"];
      validatingValues(counters.value, orderingParameters);

      showTable(clippedData, elements.table);
      numberOfPages(totalQuantityRows, elements.selectEntries);
    }).catch(error => alert(error));
}

function changingValueClick(data) {
  counters.value = data;
}

document.getElementById("parameterSearch").addEventListener("input", () => {
  userFetchSearch();
});

document.getElementById("orderingCedula").addEventListener("click", () => {
  if (counters.value == 0 || counters.value == 2) {
    changingValueClick(1);

  } else {
    changingValueClick(2);
  }
  usersFetch();
});

document.getElementById("orderingStatus").addEventListener("click", () => {
  if (counters.value == 0 || counters.value == 4) {
    changingValueClick(3);

  } else {
    changingValueClick(4);

  }
  usersFetch();
});

document.getElementById("orderingName").addEventListener("click", () => {
  if (counters.value == 0 || counters.value == 5) {
    changingValueClick(6);

  } else {
    changingValueClick(5);

  }
  usersFetch();
});

document.getElementById("left-btn").addEventListener("click", () =>{
  if(counters.start > 0){
    counters.start -= 3;
    counters.end -= 2;
  }
  usersFetch();
});

document.getElementById("right-btn").addEventListener("click", () => {
  if(counters.end <= totalQuantityRows-1){
    counters.start += 3;
    counters.end += 2;
  }
  usersFetch();
});


elements.selectEntries.addEventListener("change", () => {    
  counters.end = parseInt(elements.selectEntries.value);
  if(counters.end > totalQuantityRows){
      counters.end = totalQuantityRows;
  }
  usersFetch();
});

usersFetch();

