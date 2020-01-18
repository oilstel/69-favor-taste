var unicodes = ['&#10012;', '&#11047;', '&#36;', '&#165;', '&#5848;', '&#10687;', '&#9317;', '&#9320;', '&#10107;', '&#10110;', 'ᖗ', '☂']

function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;
    // While there remain elements to shuffle...
    while (0 !== currentIndex) {
        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }
    return array;
}

function randomItem(items){
    return items[Math.floor(Math.random()*items.length)];
}

shuffleIngredients = shuffle(ingredients);
var fourIngredients = shuffleIngredients.slice(0, 4);

// Slideshow Image
function loadBgImage() {
    shuffleImages = shuffle(slideshowImages);
    console.log(shuffleImages[0]);
    document.querySelector('#slideshow').style.background = `url('${shuffleImages[0]}') repeat center center`;
}

function generateRecipe() {
    var recipeEl = document.getElementById('recipe');
    recipeEl.innerHTML = `
        <p>
            ${randomItem(unicodes)} ${randomItem(ingredients)}<br />
            ${randomItem(unicodes)} ${randomItem(ingredients)}<br />
            ${randomItem(unicodes)} ${randomItem(ingredients)}<br />
            ${randomItem(unicodes)} ${randomItem(ingredients)}<br />
            ${randomItem(unicodes)} ${randomItem(ingredients)}<br />
            ${randomItem(unicodes)} ${randomItem(ingredients)}
        </p>
    `;
}

function randomInt(min, max) { // min and max included 
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function imageViewer() {
    var image_viewer = document.getElementById("image-viewer");
    var images = document.getElementsByTagName("img");

    [].slice.call(images).forEach(function ( img ) {
        // var img = document.getElementById("myImg");
        var image_viewer_img = document.getElementById("image-full");
        var caption_text = document.getElementById("caption");

        // console.log(img);
        img.addEventListener("click", function() {
            image_viewer.style.display = "block";
            image_viewer_img.src = this.src;
            image_viewer_img.setAttribute("style", `top: ${randomInt(1, 50)}vh; left: ${randomInt(1, 50)}vw;`);
            // caption_text.innerHTML = this.alt;
        });
    });

    image_viewer.onclick = function() { 
        image_viewer.style.display = "none";
    }
}

function play(el, epi){
    var epi_el = document.getElementById(epi);
    var symbol = document.getElementById(epi + '-symbol');
    if (epi_el.duration > 0 && !epi_el.paused) {
        epi_el.pause();
        console.log('paused');
        el.innerHTML = 'Play'
        symbol.innerHTML = ''
    } else {
        console.log('play');
        epi_el.play();
        el.innerHTML = 'Pause';
    }
}

function rewind(epi) {
    var epi_el = document.getElementById(epi);
    epi_el.currentTime -= 30.0;
}

function toggleEl(button, el) {
    var x = document.getElementById(el);
    if (x.style.display === "none") {
        x.style.display = "block";
        button.style.textDecoration = "none";
    } else {
        x.style.display = "none";
        button.style.textDecoration = "underline";
    }
} 

function generateUnicode() {
    var unicodeElements = document.getElementsByClassName('unicode');
    // console.log(unicodeElements);
    [].slice.call( unicodeElements ).forEach(function ( el ) {
        el.innerHTML = randomItem(unicodes);
    });
}

document.addEventListener("DOMContentLoaded", function(){
    generateUnicode();
    generateRecipe();
    imageViewer();
    loadBgImage();
});

document.addEventListener('mousemove', e => {
    generateUnicode();
    // generateRecipe();
});
