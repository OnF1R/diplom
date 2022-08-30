function sendRegForm() {

  const xhr = new XMLHttpRequest();
  xhr.open('POST', document.forms.reg.action);
  xhr.responseType = 'json';
  xhr.onload = () => {
    if (xhr.status !== 200) {
      return;
    }
    const response = xhr.response;
    if(xhr.response.status)
    {
      document.querySelector('#reg_error').classList.remove("none");
      document.querySelector('#reg_error').classList.remove("text-danger");
      document.querySelector('#reg_error').classList.add("text-success");
      document.querySelector('#reg_error').innerHTML = `<p>${response.message}</p>`;
    }
    else
    {
      document.querySelector('#reg_error').classList.remove("none");
      document.querySelector('#reg_error').innerHTML = `<p>${response.message}</p>`;

    }


  }
  let formData = new FormData(document.forms.reg);
  xhr.send(formData);

}

document.forms.reg.addEventListener('submit', (e) => {
  if (e) {
    e.preventDefault();
    sendRegForm();
  }
});
