<form action="post">
<input id="file" type="file">
<button type="submit">Submit</button>
</form>
<script>
const form = document.querySelector('form');
form.addEventListener('submit', handleSubmit);

function handleSubmit(event) {
  event.preventDefault();
  uploadFiles();
}
function uploadFiles() {
  cont url = 'https://httpbin.org/post';
  const formData = new FormData(form);

  const fetchOptions = {
    method: 'post',
    body: formData
  };
console.log(fetchOptions.body);
//   fetch(url, fetchOptions);
}
</script>
<?php

?>