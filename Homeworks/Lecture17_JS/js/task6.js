var imgArray = ['1','2','3'];

function showImg() {
    var img = document.createElement("img");
    var random = Math.floor(Math.random() * imgArray.length);
    var image = imgArray[random];
    img.src = 'img/poster' + image + '.jpg';
    img.width = 200;
    img.height = 300;
    img.alt = 'Poster';
    document.body.appendChild(img);
}