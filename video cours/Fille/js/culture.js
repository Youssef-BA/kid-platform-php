let videoList = document.querySelectorAll('.video-list-container .list');

videoList.forEach((vid, index) => {
   vid.onclick = () => {
      videoList.forEach(remove => {
         remove.classList.remove('active');
      });
      vid.classList.add('active');
      let videoTitles = ["Les Drapeaux du Monde -1-","Les Drapeaux du Monde -2-","Les Drapeaux du Monde -3","Les Drapeaux du Monde -4-","Les Métiers -1-","Les Métiers -2-","Les Métiers -3-","Les Fruits et Légumes","Les Animaux"];
      let videoIds = ["SWamyqtNzcg","paUw88btmKI","VsnEYyGYbD4","3kKB2veiLnw","bQ6mf7HUan0","8s_F2gRJ_tI","fQHR9lvguzI","xvkWHY39L74","nR6v3GrmwBE"];

      let title = videoTitles[index];
      let videoId = videoIds[index];
      let src = `https://www.youtube.com/embed/${videoId}`;

      document.querySelector('.main-video-container .main-video').src = src;
      document.querySelector('.main-video-container .main-vid-title').innerHTML = title;
   };
});
