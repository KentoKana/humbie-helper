var quill = new Quill('#editor', {
  theme: 'snow'
});

var form = document.querySelector('form');
form.onsubmit = function() {
  // Populate hidden form on submit
  var notecontent = document.querySelector('input[name=content]');
  notecontent.value = JSON.stringify(quill.getContents());

  console.log("Submitted", $(form).serialize(), $(form).serializeArray());
  document.getElementById('print').innerHTML = notecontent;

  // No back end to actually submit to!
  alert('Open the console to see the submit data!')
  return false;
};
