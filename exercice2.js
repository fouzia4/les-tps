
/*
Math.random() génère un nombre entre 0 et 1 (exemple : 0.534).

* 10 donne un nombre entre 0 et 9.999...

Math.floor(...) arrondit à l'entier inférieur → de 0 à 9.

+ 1 donne un nombre entre 1 et 10, comme demandé ✅. */
let nbraleatoire = Math.floor(Math.random() * 10) + 1;
let nombre; //pour stocker chaque proposition de l’utilisateur.
let c = 0; //compte combien d’essais l’utilisateur a faits.
while(true){
    nombre=parseInt(prompt("Devinez un nombre entre 1 et 10 :"));
    c++;
if ( nombre < nbraleatoire) {
        alert("C'est plus grand !");
} else if ( nombre>nbraleatoire) {
        alert("C'est plus petit !");
    }
    
else if (nombre === nbraleatoire) {
        alert(" Vous avez trouvé le nombre en " + c+ " essais");
        break;
}
    
    }