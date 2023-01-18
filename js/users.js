import { usersFetch } from "./functions/fetchFunctions.js";

export let table = $('#myTable').DataTable({
    ordering:true,
    paging:true,
    info:true
});

usersFetch(table);

