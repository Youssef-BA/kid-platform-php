let videoList = document.querySelectorAll('.video-list-container .list');

videoList.forEach((vid, index) => {
   vid.onclick = () => {
      videoList.forEach(remove => {
         remove.classList.remove('active');
      });
      vid.classList.add('active');
      let videoTitles = ["les articles le, la, les et un, une, des (définis et indéfinis)", "Le singulier et le pluriel - Cours Complet", "Les noms masculin et féminin - Cours Complet", "Les mots contraires", "L'adjectif - Cours COMPLET", "Les pronoms relatifs (QUI, QUE)"];
      let videoIds = ["xEUqImeFyJE", "28yyLejhM2A", "d7ouAN5qt38", "hFaxxtOWOvA", "CoFoz-mIHrg", "gN2D5X5OSHI"];

      let title = videoTitles[index];
      let videoId = videoIds[index];
      let src = `https://www.youtube.com/embed/${videoId}`;

      document.querySelector('.main-video-container .main-video').src = src;
      document.querySelector('.main-video-container .main-vid-title').innerHTML = title;
   };
});
