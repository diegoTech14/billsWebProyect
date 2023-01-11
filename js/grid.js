import { editFunction, suspendFunction, enableFunction } from "./functions/rowFunctions.js";
import { language, style } from "./gridAttConfig.js";

export function dataTable(data) {
    const wrapper = document.getElementById("wrapper");
    while(wrapper.hasChildNodes()){
        wrapper.removeChild(wrapper.firstChild);
    }
    
    new gridjs.Grid({
        data: data,
        columns :[{
            id:"cedula", 
            name:"Cedula"
        }, 
        {
            id:"nombre", 
            name:"Nombre"
        }, 
        {
            id:"maquina", 
            name:"N° de máquina"
        },
        {
            id:"estado", 
            name:"Estado"
        },{
            name:"Acciones",
            formatter:(cell, row)=>{
                return [gridjs.h('button',{
                    className: 'btn btn-primary bi bi-pencil-square ms-1',
                    onClick: () => editFunction(row.cells[0].data)
                }, ''),
                
                gridjs.h('button',{
                    className: 'btn btn-warning bi bi-person-fill-dash ms-1',
                    idName: "suspender",
                    onClick: () => suspendFunction(row.cells[0].data)
                }, ''),
                
                gridjs.h('button',{
                    className: 'btn btn-success bi bi-person-fill-check ms-1',
                    onClick: () => enableFunction(row.cells[0].data)
                }, '')]
            },
        }],
        pagination: {
            limit: 3
        },
        language: language,
        style: style,
        sort: true,
        search: true,
        autoWidth:true

    }).render(document.getElementById("wrapper"));
}