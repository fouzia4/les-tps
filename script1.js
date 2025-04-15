
const maDiv = document.getElementById('conteneur');

const monParagraphe = document.createElement('p');


monParagraphe.textContent = 'Ceci est un paragraphe';


maDiv.appendChild(monParagraphe);


monParagraphe.textContent = 'Le texte a été modifié';


monParagraphe.style.backgroundColor = 'lightblue';
monParagraphe.style.textAlign = 'center';
monParagraphe.style.padding = '10px';

maDiv.addEventListener('click', function () {
    monParagraphe.textContent = 'Un clic a été détecté';
});
