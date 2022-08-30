function sendAuthForm() {

  const xhr = new XMLHttpRequest();
  xhr.open('POST', document.forms.user.action);
  xhr.responseType = 'json';
  xhr.onload = () => {
    if (xhr.status !== 200) {
      return;
    }
    const response = xhr.response;
    if(xhr.response.status)
    {
      document.querySelector('#auth_error').classList.add("none");
      document.location.href = "profile.php"
    }
    else
    {
      document.querySelector('#auth_error').classList.remove("none");
      document.querySelector('#auth_error').innerHTML = `<p>${response.message}</p>`;

    }


  }
  let formData = new FormData(document.forms.user);
  xhr.send(formData);

}

document.forms.user.addEventListener('submit', (e) => {
  if (e) {
    e.preventDefault();
    sendAuthForm();
  }
});
