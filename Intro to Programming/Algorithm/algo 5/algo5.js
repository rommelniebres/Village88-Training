//Given an array and a value Y, count and print the number of array values greater than Y.
arr0 = [1, 2, -3, -5, 5]; //sample given
var y = 2; //sample given
var temp = 0;
for(var i=0; i<arr0.length; i++){
    if(arr0[i] > y){
        temp = arr0[i];
    }
}
console.log(temp);

//Given an array, print the max, min and average values for that array.
arr1 = [1, 2, -3, -5, 5, 10]; //sample given
var max = arr1[0];
var min = arr1[0];
var sum = 0;
for(var i=0; i<arr1.length; i++){
    if(arr1[i] > max){
        max = arr1[i];
    }
    else if(arr1[i] < min){
        min = arr1[i];
    }
    sum += arr1[i];
}
ave = sum / arr1.length;
console.log(max, min, ave);

/* Given an array of numbers, create a function that returns
a new array where negative values were replaced with the string ‘Dojo’.
For example, replaceNegatives( [1,2,-3,-5,5]) should return [1,2, "Dojo", "Dojo", 5]. */
arr2 = [1,2,-3,-5,5]; //sample given
function replaceNegatives(){
    for(var i=0; i<arr2.length; i++){
        if(arr2[i] < 0){
            arr2[i] = 'Dojo';
        }
    }
    return arr2;
}
z = replaceNegatives();
console.log(arr2);

/*Given array, and indices start and end, remove values in that index range, 
working in-place (hence shortening the array). For example, removeVals([20,30,40,50,60,70],2,4) 
should return [20,30,70].*/
arr3 = [];
function removeVals(x, start, end){ //sample given
    for(var i=0; i<x.length; i++){
        if(i < start){
            arr3.push(x[i]);
        }
        else if(i > end){
            arr3.push(x[i]);
        }
    }
}
y = removeVals([20, 30, 40, 50, 60, 70], 2, 4);
console.log(arr3);