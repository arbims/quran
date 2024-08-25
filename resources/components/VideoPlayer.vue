<template>
  <div class="youtube_container">
    <div id="player" class="youtube_video"></div>
    <div id="custom_youtube_player"></div>
  </div>
</template>

<script>
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
export default {
  props: {
    youtubeId: String
  },
  data() {
    return {
      id: null,
      player: null
    }
  },
  mounted() {
    this.onYouTubeIframeAPIReady()
  },
  methods: {
    onYouTubeIframeAPIReady() {
      this.player = new YT.Player('player', {
        height: '360',
        width: '640',
        videoId: this.youtubeId,
        events: {
          'onStateChange': this.onPlayerStateChange
        }
      });
    },
    onPlayerReady(event) {
      event.target.playVideo();
    },
    stopVideo() {
      this.player.stopVideo();
    }
  }
}
</script>

<style>
.youtube_container {
  position: relative;
  width: 100%;
  height: 450px;
}

.youtube_video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
