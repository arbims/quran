<template>
  <div>
    <div class="wrapper" v-for="episode in episodes">
      <a href="#" class="link__wrapper" @click.prevent="setSelectedId(episode.id)">
        <div class="program__wrapper">
          <span class="program__thumb">
            <img src="">
          </span>
          <span class="program__title">test</span>
          <span class="program__episode__number">
             {{ episode.title }}
          </span>
        </div>
      </a>
      <VideoPlayer v-if="selectedid == episode.id " :youtubeId="episode.youtube"></VideoPlayer>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import VideoPlayer from '../components/VideoPlayer.vue'

export default {
  props: {
    id: String
  },
  data () {
    return {
      episodes: {},
      selectedid: 0
    }
  },
  methods: {
    setSelectedId(episodeid) {
      this.selectedid = episodeid
    }
  },
  components: {
    VideoPlayer
  },
  mounted() {
    console.log(this.id)
    axios.get('http://localhost:8000/api/episodes/' +  this.id + '.json').then((response) => {
      this.episodes = response.data.episodes
    }).catch((response) => {
      console.error(response)
    })
  },
}
</script>

<style>
.fadeHeight-enter-active,
.fadeHeight-leave-active {
  transition: all 0.2s;
  max-height: 230px;
}
.fadeHeight-enter,
.fadeHeight-leave-to
{
  opacity: 0;
  max-height: 0px;
}
</style>
