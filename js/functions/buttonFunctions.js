import { enableFunction, suspendFunction } from "./rowFunctions.js";

$(document).on('click', '.btnEdit', function(){
    alert("hi");
});

$(document).on('click', '.btnDisable', function(){
    const element = $(this)[0].parentElement.parentElement;
    suspendFunction(element.childNodes[0].textContent);
});

$(document).on('click', '.btnEnable', function(){
    const element = $(this)[0].parentElement.parentElement;
    enableFunction(element.childNodes[0].textContent);
});