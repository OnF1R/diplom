  function sendFeedbackForm() {

      const xhr = new XMLHttpRequest();
      xhr.open('POST', document.forms.user_feedback.action);
      xhr.responseType = 'json';
      xhr.onload = () => {
        if (xhr.status !== 200) {
          return;
        }
        const response = xhr.response;
        document.querySelector('#feedback_message').classList.remove("none");
        document.querySelector('#feedback_message_2').classList.remove("none");
        let el = document.querySelectorAll('.feedback_form');
        el.forEach((element) => {
          element.remove();
        });

        document.querySelector('#feedback_message').innerHTML = `<p>${response.message}</p>`;

      }
      let formData = new FormData(document.forms.user_feedback);
      xhr.send(formData);
    }

    document.forms.user_feedback.addEventListener('submit' , (e) => {
      if (e) {
        e.preventDefault();
        sendFeedbackForm();
      }
    });
