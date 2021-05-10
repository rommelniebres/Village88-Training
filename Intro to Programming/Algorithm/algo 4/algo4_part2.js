function squareValue(x){
    y = [];
    for(var i=0; i<x.length; i++){
        y.push(x[i] * x[i]);
    }
    return y;
}
y = squareValue([1,2,3]);
 console.log(y); // should log [1,4,9]
y = squareValue([2,5,8]);
 console.log(y); // should log [4,25,64]


function returnOddArray(){
    y = [];
    for(var i=1; i<=255; i++){
        if(i % 2 != 0){
            y.push(i);
        }
    }
    return y
}
y = returnOddArray();
 console.log(y); // should log [1,3,5,...,253,255]


function printAverage(x){
    sum = 0;
    for(var i=0; i<x.length; i++){
        sum += x[i];
    }
    sum /= x.length;
    return sum;
}
y = printAverage([1,2,3]);
 console.log(y); // should log 2
y = printAverage([2,5,8]);
 console.log(y); // should log 5