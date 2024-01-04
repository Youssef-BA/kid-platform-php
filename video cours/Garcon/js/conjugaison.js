let videoList = document.querySelectorAll('.video-list-container .list');

videoList.forEach((vid, index) => {
   vid.onclick = () => {
      videoList.forEach(remove => {
         remove.classList.remove('active');
      });
      vid.classList.add('active');
      let videoTitles = ["Le présent des verbes du 1er groupe", "Présent de l'indicatif - 2e et 3e groupe", "Le Passé Composé - Cours COMPLET", "L'Imparfait - Cours COMPLET", "Le Futur simple - Cours COMPLET", "Le Passé Simple - Cours COMPLET", "Le Subjonctif - Cours COMPLET"];
      let videoIds = ["gJ25k0J_kXQ", "IbgI1xlqDRY", "mpeHI3zbPWk", "culF1WXnaOw", "ahjPm3-IrVY", "o1iEAqer1xA", "wdKogBCxACY"];

      let title = videoTitles[index];
      let videoId = videoIds[index];
      let src = `https://www.youtube.com/embed/${videoId}`;

      document.querySelector('.main-video-container .main-video').src = src;
      document.querySelector('.main-video-container .main-vid-title').innerHTML = title;
   };
});
