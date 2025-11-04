<template>
  <div class="radio-card d-flex align-items-center gap-3 p-3 rounded-4 shadow-sm">
    <img
      src="/img/bg-radio.jpg"
      alt="Radio Logo"
      class="radio-logo rounded-circle border border-2 border-light"
    />

    <div class="flex-grow-1">
      <h6 class="mb-1 text-truncate fw-semibold">
        إذاعة القرآن الكريم
      </h6>
      <span class="badge bg-danger text-uppercase small fw-bold me-1">Live</span>
      <span class="text-danger fw-bold">●</span>
    </div>

    <button class="btn btn-light rounded-circle shadow-sm" @click="togglePlay" :disabled="isLoadingAudio">
      <i v-if="!isPlaying" class="bi bi-play-fill fs-4 text-primary"></i>
      <i v-else class="bi bi-pause-fill fs-4 text-primary"></i>
    </button>

    <div class="position-relative">
      <button
        class="btn btn-light rounded-circle shadow-sm"
        @click="toggleVolumeControl"
      >
        <i class="bi bi-volume-up-fill fs-5 text-primary"></i>
      </button>

      <input
        v-if="showVolume"
        type="range"
        min="0"
        max="1"
        step="0.01"
        v-model.number="volume"
        @input="changeVolume"
        class="form-range volume-slider position-absolute"
      />
    </div>

    <audio id="audio-live" class="d-none">
      <source src="http://102.204.206.14:8000/live" />
    </audio>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isPlaying: false,
      showVolume: false,
      volume: 1.0,
      isLoadingAudio: false,
    };
  },
  methods: {
    async togglePlay() {
      const audio = document.getElementById('audio-live');
      if (this.isLoadingAudio) return;
      this.isLoadingAudio = true;

      try {
        if (audio.paused) {
          await audio.play();
          this.isPlaying = true;
        } else {
          audio.pause();
          this.isPlaying = false;
        }
      } catch (err) {
        console.warn('Erreur lecture audio :', err.message);
      } finally {
        this.isLoadingAudio = false;
      }
    },
    toggleVolumeControl() {
      this.showVolume = !this.showVolume;
    },
    changeVolume() {
      const audio = document.getElementById('audio-live');
      audio.volume = this.volume;
    },
  },
};
</script>

<style scoped>
.radio-card {
  background-color: #4e7a99;
  color: #fff;
  max-width: 420px;
  margin: auto;
}

.radio-logo {
  width: 48px;
  height: 48px;
  object-fit: cover;
}

h6 {
  font-size: 0.95rem;
  color: #fff;
}

/* 🔊 Slider inversé (haut = fort, bas = faible) */
.volume-slider {
  width: 100px;
  top: -60px;
  left: -30px;
  transform: rotate(90deg); /* au lieu de -90deg */
  opacity: 0.9;
  transition: opacity 0.3s ease;
}

.volume-slider:hover {
  opacity: 1;
}
</style>
