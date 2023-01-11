import { dataTable } from "../grid.js";

export function usersFetch() {

    fetch("queries/users/allUsers.php",{
        method:"GET"
    })
        .then((response) => response.json())
        .then((data) =>{
            console.log(data[0].estado);
            dataTable(data);
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
            }
            usersFetch();
        }).catch(error => alert(error.stack));
}
