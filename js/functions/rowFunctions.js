import { userFetchSearch, userFetchSearchUpdate } from "./fetchFunctions.js";


export function editFunction(cedula) {
    userFetchSearchUpdate({cedula:cedula, url:"./queries/users/searchUser.php"});
}

export function suspendFunction(cedula) {
    userFetchSearch({cedula:cedula, url:"./queries/users/disableUser.php"});
}

export function enableFunction(cedula) {
    userFetchSearch({cedula:cedula, url:"./queries/users/enableUser.php"});
}

export function deleteFunction(cedula) {
    userFetchSearch({cedula:cedula, url:"./queries/users/deleteUsers.php"});
}

