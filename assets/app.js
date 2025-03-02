import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

import './bootstrap.js';
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

function redirectToPage() {
    const input = document.getElementById("book-letter");
    const inputValue = input.value.trim();

    if (inputValue === "") {
        console.log("Veuillez saisir une valeur avant de soumettre.");
        alert("Veuillez saisir une valeur avant de soumettre.");
        return;
    }

    console.log(inputValue);
    console.log("clicked");
    input.value = "";
    window.location.href = `/book/authorsWithMultipleBooks/${inputValue}`;
}


document.getElementById("button-addon1")?.addEventListener("click", redirectToPage);


