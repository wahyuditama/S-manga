// Pencarian dengan JavaScript
// Tunggu sampai dokumen sepenuhnya dimuat
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('searchInput');
  searchInput.addEventListener('keyup', function() {
      const searchQuery = this.value.toLowerCase();
            const cards = document.querySelectorAll('.card-item');
            cards.forEach(card => {
          const title = card.querySelector('.card-title').textContent.toLowerCase();
          const description = card.querySelector('.deskripsi p').textContent.toLowerCase();
          if (title.includes(searchQuery) || description.includes(searchQuery)) {
              card.style.display = ''; // Tampilkan kartu
          } else {
              card.style.display = 'none'; // Sembunyikan kartu
          }
      });
  });
});


//summernote
$(document).ready(function() {
  $('#editor').summernote({
    height: 100, // Tinggi editor
    placeholder: 'Tulis sesuatu di sini...',
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
});



function addContent($spring){
  switch ($spring) {
    case '1':
      
      break;
  
    default:
      break;
  }
}

document.addEventListener('DOMContentLoaded',function(){
  const searchInput = document.getElementById('searchInput');

  searchInput.addEventListener('keyup', function(){
    const searchQuery = this.value.toLowerCase();

    const cards = document.querySelectorAll('.card-item');

    cards.forEach(card => {
      const title = card.querySelector(".card-title").textContent.toLocaleLowerCase();
      const description = card.querySelector('.deskripsi').textContent.toLocaleLowerCase();

      if(title.includes(searchQuery) || description.includes(searchQuery)){
        card.style.display = '';
      }else{
        card.style.display = 'none';
      }
    });
  });

});