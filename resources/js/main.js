import Turbolinks from 'turbolinks';
import { createApp } from 'vue';
import Player from '../components/Player.vue';
import Episodes from '../components/Episodes.vue';
import { executeForm } from './FormContact';
import '../scss/main.scss';


document.addEventListener('turbolinks:load', function () {

  const submitForm = document.getElementById('submit-contact')
  const submit_btn = document.getElementById('submit-btn')

  if (submitForm) {
    executeForm(submitForm, submit_btn)
  }

  let el = document.querySelector('#player_vue')
  if (el) {
    const app = createApp(Player)
    app.mount(el)
  }

  let el_episode = document.querySelector('#episode')
  if (el_episode) {
    const episode = createApp(Episodes, { id: el_episode.getAttribute('data-id') })
    episode.mount(el_episode)
  }
})

document.addEventListener('turbolinks:click', e => {
  const anchorElement = e.target
  const isSamePageAnchor =
      anchorElement.hash &&
      anchorElement.origin === window.location.origin &&
      anchorElement.pathname === window.location.pathname

  if (isSamePageAnchor) {
      Turbolinks.controller.pushHistoryWithLocationAndRestorationIdentifier(e.data.url, Turbolinks.uuid())
      e.preventDefault()
      window.dispatchEvent(new Event('hashchange'))
  }
})

Turbolinks.start()
