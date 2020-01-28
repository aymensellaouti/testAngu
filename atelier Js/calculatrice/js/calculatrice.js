/**
 * Created by aymen on 20/02/2017.
 */


var op1 = document.querySelector("#op1");
var op2 = document.querySelector("#op2");
var resultat=document.querySelector("#result");
var op1Value;
var op2Value;
function show() {
    op1Value = isNaN(parseInt(op1.value, 10)) ? 0 : parseInt(op1);
    op2Value = isNaN(parseInt(op2.value, 10)) ? 0 : parseInt(op2);
    console.log(op1Value);
    console.log(op2Value);
}

var operations = {
    add: function (x, y) {
        return x + y;
    },
    subtract: function (x, y) {
        return x - y;
    },
    multiply: function (x, y) {
        return x * y;
    },
    divide: function (x, y) {
        if (y)
            return (x / y)
        return 0;
    }

}

function operate(operation, operand1, operand2) {
    if (typeof operations[operation] === "function")
        return operations[operation](operand1, operand2);
    else throw "unknown operator";
}

var plus=document.querySelector('#plus');
plus.addEventListener('click',function () {
    op1Value = isNaN(parseInt(op1.value, 10)) ? 0 : parseInt(op1.value,10);
    op2Value = isNaN(parseInt(op2.value, 10)) ? 0 : parseInt(op2.value,10);
    console.log(op1Value);
    console.log(op2Value);
    resultat.value=operate("add", op1Value, op2Value);
})
var moin=document.querySelector('#moin');
moin.addEventListener('click',function () {
    op1Value = isNaN(parseInt(op1.value, 10)) ? 0 : parseInt(op1.value,10);
    op2Value = isNaN(parseInt(op2.value, 10)) ? 0 : parseInt(op2.value,10);
    resultat.value=operate("subtract", op1Value, op2Value);
})
var fois=document.querySelector('#fois');
fois.addEventListener('click',function () {
    op1Value = isNaN(parseInt(op1.value, 10)) ? 0 : parseInt(op1.value,10);
    op2Value = isNaN(parseInt(op2.value, 10)) ? 0 : parseInt(op2.value,10);
    resultat.value=operate("multiply", op1Value, op2Value);
})
var sur=document.querySelector('#sur');
sur.addEventListener('click',function () {
    op1Value = isNaN(parseInt(op1.value, 10)) ? 0 : parseInt(op1.value,10);
    op2Value = isNaN(parseInt(op2.value, 10)) ? 0 : parseInt(op2.value,10);
    resultat.value=operate("divide", op1Value, op2Value);
})

