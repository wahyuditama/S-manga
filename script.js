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