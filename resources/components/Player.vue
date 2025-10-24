<template>
  <div class="d-flex flex-column align-items-center justify-content-center bg-dark text-light p-4 rounded-4 shadow-lg" style="max-width: 400px; margin: auto;">
    <h5 class="mb-3 fw-semibold text-uppercase text-info">🎙️ Radio Live</h5>

    <div class="position-relative w-100 bg-secondary rounded-3 p-4 text-center">
      <audio id="audio-live" class="d-none">
        <source src="http://5.135.194.225:8000/live" />
      </audio>

      <button
        class="btn btn-lg btn-outline-light rounded-circle shadow"
        @click="togglePlay"
      >
        <i v-if="!isPlaying" class="bi bi-play-fill fs-2"></i>
        <i v-else class="bi bi-pause-fill fs-2"></i>
      </button>

      <div class="d-flex justify-content-center align-items-end mt-3 gap-1" style="height: 24px;">
        <div
          v-for="n in 5"
          :key="n"
          :class="['bg-success rounded-1', isPlaying ? 'eq-bar' : '']"
          :style="{ width: '4px', height: isPlaying ? `${8 + n * 4}px` : '4px' }"
        ></div>
      </div>

      <p class="text-muted mt-3 small fst-italic">En direct 🎧</p>
    </div>
  </div>
</template>

<script>
import OpenPlayerJS from 'openplayerjs';
import 'openplayerjs/dist/openplayer.css';

export default {
  data() {
    return {
      player: null,
      isPlaying: false,
    };
  },
  mounted() {
    this.player = new OpenPlayerJS('audio-live', {
      live: { showLabel: false, showProgress: false },
    });
    this.player.init();
  },
  methods: {
    togglePlay() {
      const audio = document.getElementById('audio-live');
      if (audio.paused) {
        audio.play();
        this.isPlaying = true;
      } else {
        audio.pause();
        this.isPlaying = false;
      }
    },
  },
};
</script>

<style scoped>
.eq-bar {
  animation: bounce 1s infinite ease-in-out;
}

@keyframes bounce {
  0%, 100% {
    transform: scaleY(0.4);
    opacity: 0.5;
  }
  50% {
    transform: scaleY(1.3);
    opacity: 1;
  }
}
</style>
