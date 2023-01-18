import { enableFunction, suspendFunction } from "./rowFunctions.js";

$(document).on('click', '.btnEdit', function(){
    alert("hi");
});

$(document).on('click', '.btnDisable', function(){
    const element = $(this)[0].parentElement.parentElement;
    //console.log(element.childNodes[0].textContent);
    suspendFunction(element.childNodes[0].textContent);
    //console.log(suspendFunction(element.childNodes[0].textContent));
});

$(document).on('click', '.btnEnable', function(){
    const element = $(this)[0].parentElement.parentElement;
    //console.log(element.childNodes[0].textContent);
    enableFunction(element.childNodes[0].textContent);
    //console.log(enableFunction(element.childNodes[0].textContent));
});