function resetNegatives(x0){
    for(var i=0; i<x0.length; i++){
        if(x0[i] < 0){
            x0[i] = 0;
        }
    }
    return x0
}
x0 = resetNegatives([1,2,-1, -3]) //sample given
console.log(x0)



function moveForward(x1){
    for(var i=0; i<x1.length; i++){
        x1[i] = x1[i+1];
    }
    x1[x1.length-1] = 0
    return x1;
}
x1 = moveForward([1,2,3]) //sample given
console.log(x1)



arr0 = [];
function returnReversed(x2){
    for(var i=x2.length; i>0; i--){
        arr0.push(x2[i - 1])
    }
    return arr0;
}
x2 = returnReversed([1,2,3]) //sample given
console.log(x2)




arr1 = [];
function repeatTwice(x3){
    for(var i=0; i<x3.length; i++){
        arr1.push(x3[i])
        arr1.push(x3[i])
    }
    return arr1;
}
x3 = repeatTwice([4,"Ulysses", 42, false]) //sample given
console.log(x3)