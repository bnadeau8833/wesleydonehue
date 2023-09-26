lightGallery(document.getElementById('light-gallery'), {
    licenseKey: '94A95F7F-545D4E38-897DEB40-914F15B5',
    thumbnail: true,
    plugins: [lgVideo, lgThumbnail, lgShare],
    addClass: 'gallery-themed',
});
  
lightGallery(document.getElementById('light-gallery-single'), {
    licenseKey: '94A95F7F-545D4E38-897DEB40-914F15B5',
    plugins: [lgVideo, lgHash, lgShare],
    addClass: 'gallery-themed',
});