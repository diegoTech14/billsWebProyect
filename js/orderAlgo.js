export function orderingUsersDesc(users, parameter){
    
    for(let i = users.length-1; i >= 0; i--){
        for(let u = users.length-1; u > 0; u--){

            if(users[u][parameter] > users[u-1][parameter]){
                let temporalUser = users[u];
                users[u] = users[u-1]; 
                users[u-1] = temporalUser; 
            }
        }
    }
    return users;
}

export function orderingUsersAsc(users, parameter){
    
    for(let i = 0; i < users.length; i++){
        for(let u = 0; u < users.length-1; u++){

            if(users[u][parameter] > users[u+1][parameter]){
                let temporalUser = users[u];
                users[u] = users[u+1]; 
                users[u+1] = temporalUser; 
            }
        }
    }
    return users;
}

export function orderingUsersDescByName(users, parameter){
    
    for(let i = users.length-1; i >= 0; i--){
        for(let u = users.length-1; u > 0; u--){

            if(users[u][parameter][0] > users[u-1][parameter][0]){
                let temporalUser = users[u];
                users[u] = users[u-1]; 
                users[u-1] = temporalUser; 
            }
        }
    }
    return users;
}

export function orderingUsersAscByName(users){
    
    for(let i = 0; i < users.length; i++){
        for(let u = 0; u < users.length-1; u++){

            if(users[u]["nombre"][0] > users[u+1]["nombre"][0]){
                let temporalUser = users[u];
                users[u] = users[u+1]; 
                users[u+1] = temporalUser; 
            }
        }
    }
    return users;
}