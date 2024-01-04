let videoList = document.querySelectorAll('.video-list-container .list');

videoList.forEach((vid, index) => {
   vid.onclick = () => {
      videoList.forEach(remove => {
         remove.classList.remove('active');
      });
      vid.classList.add('active');
      let videoTitles = ["Addition - Cours Complet","Soustraction - Cours Complet", "Multiplication - Table de 2", "Multiplication - Table de 3", "Multiplication - Table de 4", "Multiplication - Table de 5", "Multiplication - Table de 6", "Multiplication - Table de 7","Multiplication - Table de 8","Multiplication - Table de 9","Division - Cours Complet"];
      let videoIds = ["iv_Mn2M90zY", "PqYHqWnT-MA", "ASrx4TBoceM", "X9vPgI6L3S0", "emh1KaUk7qQ", "EmAf6_Z17o8", "7iZIgC3SoCw","SFL7pAV8Y0c","5Kr_GglxGrk","oqZ3XC-g84Q","T0IPInBxrpA"];

      let title = videoTitles[index];
      let videoId = videoIds[index];
      let src = `https://www.youtube.com/embed/${videoId}`;

      document.querySelector('.main-video-container .main-video').src = src;
      document.querySelector('.main-video-container .main-vid-title').innerHTML = title;
   };
});
