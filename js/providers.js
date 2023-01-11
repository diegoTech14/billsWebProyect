import { usersFetch } from "./functions/fetchFunctions.js";
let providerUrlIndependent = "queries/providers/queryProviderSearch.php";
let providersColumns =[{
    id:"cedula",
    name:"cedula"
},
{
    id:"nombre", 
    name:"Nombre"
},
{
    id:"cuenta_cliente",
    name:"Cuenta cliente"
},{
    id:"estado",
    name:"Estado"
},{
    id:"deduccion",
    name:"Deducciones"
}];

usersFetch({url:"queries/providers/queryProviders.php", columns:providersColumns, urlActions:providerUrlIndependent});