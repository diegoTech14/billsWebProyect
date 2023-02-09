import { userFetchSearch } from "./fetchFunctions.js";


export function editFunction(cedula) {
    console.log("Hi");
}

export function suspendFunction(cedula) {
    console.log(cedula);
    userFetchSearch({cedula:cedula, url:"./queries/users/disableUser.php"});
}

export function enableFunction(cedula) {
    userFetchSearch({cedula:cedula, url:"./queries/users/enableUser.php"});
}

