function largestElement(x){
    temp = 0;
    for(var i=0; i<x.length; i++){
        if( temp < x[i]){
            temp = x[i]
        }
    }
    return temp;
 }
 y = largestElement([1,30,5,7]);
 console.log(y); // should log 30