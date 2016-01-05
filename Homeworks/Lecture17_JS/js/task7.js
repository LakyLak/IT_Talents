function calculateConversion() {
    var fromUnit = document.getElementById('from').value;
    var toUnit = document.getElementById('to').value;
    var convertFrom = document.getElementById('convert_input').value;
    if (fromUnit === 'kg' && toUnit === 'lb') {
        var convertTo = convertFrom * 2.20462262;
    } else if (fromUnit === 'lb' && toUnit === 'kg') {
        var convertTo = convertFrom / 2.20462262;
    } else {
        var convertTo = convertFrom;
    }
    document.getElementById('result_convert').innerHTML = 'Result: ' + convertTo;
}
function switchUnits () {
    var fromUnit = document.getElementById('from').value;
    var toUnit = document.getElementById('to').value;
    document.getElementById('from').value = toUnit;
    document.getElementById('to').value = fromUnit;
}