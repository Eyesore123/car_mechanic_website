function toggleEnlargeImg(gallerypicture) {
    var img = gallerypicture.querySelector('img');
    var enlarged = gallerypicture.classList.contains('enlarged');
    if (!enlarged) {
      img.style.transform = "scale(2.5)";
      img.style.transition = "transform 0.25s ease";
      gallerypicture.classList.add('enlarged');
      gallerypicture.style.zIndex = '1000';
    } else {
      img.style.transform = "scale(1)";
      img.style.transition = "transform 0.25s ease";
      gallerypicture.classList.remove('enlarged');
      gallerypicture.style.zIndex = '';
    }
  }
  
  var galleryPictures = document.querySelectorAll('.gallerypicture');
  galleryPictures.forEach(function(galleryPicture) {
    galleryPicture.addEventListener('click', function() {
      toggleEnlargeImg(galleryPicture);
      // Remove the 'active' class from all other gallery pictures
      galleryPictures.forEach(function(otherGalleryPicture) {
        if (otherGalleryPicture !== galleryPicture) {
          otherGalleryPicture.classList.remove('active');
        }
      });
      // Add the 'active' class to the clicked gallery picture
      galleryPicture.classList.add('active');
    });
  });

