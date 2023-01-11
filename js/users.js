import { usersFetch } from "./functions/fetchFunctions.js";

document.getElementById("refresh").addEventListener("click", () =>{
    console.log("si");
    usersFetch("queries/users/allUsers.php");    
});
usersFetch("queries/users/allUsers.php");