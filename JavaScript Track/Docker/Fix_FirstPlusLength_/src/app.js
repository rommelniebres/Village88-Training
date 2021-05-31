var Express             = require("express");
var App                 = Express();

App.get('/', function(request, response) {
    function firstPlusLength(arr) {
        let first = arr[0];
        let length = arr.length;
        let result = first + length;

        return result;
    }
    
    let a = firstPlusLength([0,1,2,3,4]);
    let b = firstPlusLength([3,0,2,5]);
    let c = firstPlusLength([-5,0,2,5]);
    let d = firstPlusLength([1, 2]);

    // should print out 5, 7, -1, 3
    response.send("<h1>" + a + ", " + b + ", " + c + ", " + d + "</h1>");
})

App.listen(3000, function() {});