function delay(ms) {
   return new Promise(resolve => setTimeout(resolve, ms));
}

function creer_sequence(liste, n){
   var liste =[];

   for(i=0;i<n;i++){
      liste[i]= Math.floor(Math.random()*4)
   }
   return liste
}

async function jouer_son(element){
   var audio_1 = new Audio("sons/son_1.mp3");
   var audio_2 = new Audio("sons/son_2.mp3");
   var audio_3 = new Audio("sons/son_3.mp3");
   var audio_4 = new Audio("sons/son_4.mp3");

   if(element==0){
      console.log("Jouer son 1");
      audio_1.play()
      document.getElementById("red_button").style.backgroundColor = '#DEDDDD';
      await delay(250)
      document.getElementById("red_button").style.backgroundColor = 'red';
   }

   else if (element==1){
      console.log ("Jouer son 2")
      audio_2.play()
      document.getElementById("blue_button").style.backgroundColor = '#DEDDDD';
      await delay(250)
      document.getElementById("blue_button").style.backgroundColor = 'blue';
      }

   else if(element==2){
      console.log("Jouer son 3")
      audio_3.play()
      document.getElementById("yellow_button").style.backgroundColor = '#DEDDDD';
      await delay(250)
      document.getElementById("yellow_button").style.backgroundColor = 'yellow';
      }

   else{
      console.log("Jouer son 4")
      audio_4.play()
      document.getElementById("green_button").style.backgroundColor = '#DEDDDD';
      await delay(250)
      document.getElementById("green_button").style.backgroundColor = 'green';
      } 
}

async function jouer_sequence(liste,n) {
   for (let i = 0; i < n; i++) {
      jouer_son(liste[i]);
      await delay(1000); // 1 seconde de pause entre chaque son
   }
}

function listenAndCompare(sequence) {
   return new Promise((resolve) => {
      let playerSequence = [];
      let currentStep = 0;

      const handleClick = (event) => {
         const buttonId = event.target.id;
         let playerInput;

         if (buttonId === 'red_button') {
            playerInput = 0;
         } else if (buttonId === 'blue_button') {
            playerInput = 1;
         } else if (buttonId === 'yellow_button') {
            playerInput = 2;
         } else if (buttonId === 'green_button') {
            playerInput = 3;
         }
         playerSequence.push(playerInput);
         // Compare the player's input with the sequence
         if (playerInput !== sequence[currentStep]) {
            alert("Game over! Vous avez perdu.");
            document.querySelectorAll('.button').forEach(button => {
               button.removeEventListener('click', handleClick); // Remove event listeners
            });
            resolve(false); // Game over
         } 
         else {
            currentStep++;
            if (currentStep == sequence.length) {
               document.querySelectorAll('.button').forEach(button => {
                  button.removeEventListener('click', handleClick); // Remove event listeners
               });
               resolve(true); // Player completed the sequence
            }
         }
      };

      document.querySelectorAll('.button').forEach(button => {
         button.addEventListener('click', handleClick);
      });
   });
}

async function game_loop(){
   let sequence = [];
   let n = 4;
   let jeu = true;
   while(jeu == true) {
      await delay(1000); // 1 second pause before starting the sequence
      sequence = creer_sequence(sequence, n);
      console.log(sequence);
      await jouer_sequence(sequence, n);
      jeu = await listenAndCompare(sequence);
      n++;
      await delay(1000); // 1 second pause before next round
   }
   
}


game_loop()
