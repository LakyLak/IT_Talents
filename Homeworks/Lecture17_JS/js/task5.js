function calculateVolumeOfSphere () {
    var r = document.getElementById('radius').value;
    var volume = ((4/3) * Math.PI) * Math.pow(r, 3);
    document.getElementById('resultSphere').innerHTML = volume;
}


