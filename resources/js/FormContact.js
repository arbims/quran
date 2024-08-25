import axios from "axios"

const removeErrorsKeyUp = (key) => {
  const ele = document.getElementById(key)
  ele.addEventListener('keyup', () => {
    ele.classList.remove('form-error')
    if (ele.nextSibling !== null) {
      ele.nextSibling.remove()
    }
  })
}

const removeErrors = (key) => {
  const ele = document.getElementById(key)
  ele.classList.remove('form-error')
  if (ele.nextSibling !== null) {
    ele.nextSibling.remove()
  }
}

const createFormErorrs = (key, errors, submit_btn) => {
  const ele = document.getElementById(key)
  ele.classList.add('form-error')
  let div = document.createElement('div')
  div.classList.add('invalid-feedback')
  div.append(Object.values(errors[key])[0])
  ele.after(div)
  submit_btn.disabled = false
}
export const executeForm = (submitForm, submit_btn) =>{
  submitForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    submit_btn.disabled = true
    const body = new FormData(submitForm)
    axios.post('/contact.json', body).then((response) => {
      const flash = document.getElementById('success-send')
      flash.classList.add('alert', 'alert-success')
      flash.append('إرسال الرسالة بنجاح')
      submit_btn.disabled = false
    }).catch((response) => {
      if (response.response.status === 403) {
        const errors = response.response.data.result.errors
        Object.keys(errors).forEach(key => {
          removeErrors(key)
          createFormErorrs(key, errors, submit_btn)
          removeErrorsKeyUp(key)
        });
      }
    })
  })
}
