import { userFetchSearch } from "./fetchFunctions.js";

export function editFunction(cedula) {
    console.log("Hi");
}

export function suspendFunction(cedula) {
    userFetchSearch({cedula:cedula, url:"./queries/users/disableUser.php"});
    //usersFe("queries/users/allUsers.php");
}

export function enableFunction(cedula) {
    userFetchSearch({cedula:cedula, url:"./queries/users/enableUser.php"});
    //usersFe("queries/users/allUsers.php");

}

