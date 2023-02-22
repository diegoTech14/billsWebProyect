
import { table } from "../users.js";

var formInputs = {
    dni:"cedulaInput",
    name:"nameInput",
    firstSurname:"firstSurnameInput",
    secondSurname:"secondSurnameInput",
    phone:"phoneInput",
    userName:"userNameInput",
    machineNumber:"machineNumberInput",
    email:"emailInput"
};
export function usersFetch(table) {
    
    fetch("queries/users/allUsers.php", {
        method: "GET"
    })
        .then((response) => response.json())
        .then((data) => {
            
            table.clear();
            
            for (let index = 0; index < data.length; index++) {
                table.row.add([
                    data[index].cedula, 
                    data[index].nombre, 
                    data[index].maquina, 
                    data[index].estado,
                `<button type='button' class='btn btn-primary bi bi-pencil-square ms-1 btnEdit' data-bs-toggle='modal' data-bs-target='#exampleModal'></button>

                <button type='button' class='btn btn-warning bi bi-person-fill-dash ms-1 btnDisable'></button>
                <button type='button' class='btn btn-success bi bi-person-fill-check ms-1 btnEnable'></button>
                `]).draw();
            }
        }).catch(error => alert(error));
}

export function userFetchSearch({ cedula, url }) {

    let dataForm = new FormData();
    dataForm.append("cedula", cedula);

    fetch(url, {
        method: "POST",
        body: dataForm
    })
        .then(response => response.json())
        .then((data) => {
            if (data == 1) {
                Notiflix.Notify.warning("User disabled");
            } else if (data == 2) {
                Notiflix.Notify.success("User Enabled");
            }else{
                Notiflix.Notify.failure("Error");
            }
            usersFetch(table);
        }).catch(error => console.log(error.stack));
}

export function userFetchSearchUpdate({ cedula, url }) {

    let dataForm = new FormData();
    dataForm.append("cedula", cedula);

    fetch(url, {
        method: "POST",
        body: dataForm
    })
        .then(response => response.json())
        .then((data) => {

            let formIds = Object.values(formInputs);
            let dataValues = Object.values(data);

            if(data.length != 0){
                (()=>{
                    for(let i= 0; i < dataValues.length; i++){
                        document.getElementById(formIds[i]).value = dataValues[i];
                    }
                })();
            }
        }).catch(error => console.log(error.stack));
}
