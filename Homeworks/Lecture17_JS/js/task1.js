var arr1=[3, 'a', 'a', 'a', 2, 3, 'a', 3, 'a', 2, 4, 9, 3];
var count = 1;
var maxCount = 0;
var element = '';

for(var i = 0, len = arr1.length-1; i < len; i+=1) {
    for(var j = i+1, len = arr1.length; j < len; j+=1) {
        if (arr1[i] == arr1[j]) {
            count++;
        }
    }
    if(count > maxCount) {
        maxCount = count;
        element = arr1[i];
        count = 1;
    }
    else {
        count = 1;
    }
}
document.write(element + ' ( ' + maxCount + ' times)');
