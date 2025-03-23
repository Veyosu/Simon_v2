function creer_sequence(liste, n){
   var liste =[];

   for(i=0;i<n;i++){
      liste[i]= Math.floor(Math.random()*4)
   }
   return liste
}

function jouer_son(element){
   var audio_1 = new Audio("sons/son_1.mp3");
   var audio_2 = new Audio("sons/son_2.mp3");
   var audio_3 = new Audio("sons/son_3.mp3");
   var audio_4 = new Audio("sons/son_4.mp3");

   if(element==0){
      console.log("Jouer son 1");
      audio_1.play()
   }

   else if (element==1){
      console.log ("Jouer son 2")
      audio_2.play()
      }

   else if(element==2){
      console.log("Jouer son 3")
      audio_3.play()
      }

   else{
      console.log("Jouer son 4")
      audio_4.play()
      } 
}

function jouer_sequence(liste, n) {
   function delay(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
   }

   async function playSequence() {
      for (let i = 0; i < n; i++) {
         jouer_son(liste[i]);
         await delay(1000); // 1 second delay between sounds
      }
   }

   playSequence();
}

function game_loop(){
   let sequence = [];
   let n = 15;
   sequence = creer_sequence(sequence,n)
   console.log(sequence)
   jouer_sequence(sequence,n)
}

game_loop()
