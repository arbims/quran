<template>
  <div class="card">
    <div class="logo">RQ</div>

    <h1>إذاعة القرآن الكريم تونس</h1>
    <div class="subtitle">مباشر</div>

    <div class="status">
      <div :class="['status-dot', { playing: isPlaying }]"></div>
      <span>{{ statusText }}</span>
    </div>

    <div class="audio-wrapper">
      <audio
        ref="audio"
        controls
        preload="none"
        @play="onPlay"
        @pause="onPause"
        @waiting="onWaiting"
        @error="onError"
      >
        <source src="https://live.radioquran.tn/live" type="audio/mpeg" />
        متصفحك لا يدعم الصوت HTML5.
      </audio>
    </div>

    <div class="hint">{{ hint }}</div>

    <div class="footer">
      &copy; {{ year }} radioquran.tn
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const audio = ref(null);

const isPlaying = ref(false);
const statusText = ref("في انتظار القراءة…");
const hint = ref("انقر على ▶ لبدء البث. يُرجى الانتظار لبضع ثوانٍ إذا لزم الأمر.");
const year = new Date().getFullYear();

// Handlers
const onPlay = () => {
  isPlaying.value = true;
  statusText.value = "الآن أقرأ…";
  hint.value = "يتم تشغيل البث حاليًا.";
};

const onPause = () => {
  isPlaying.value = false;
  statusText.value = "البث متوقف";
  hint.value = "انقر فوق ▶ لبدء البث أو إعادة تشغيله.";
};

const onWaiting = () => {
  statusText.value = "جارٍ تحميل الخلاصة…";
  hint.value = "جاري التحميل… الرجاء الانتظار.";
};

const onError = () => {
  isPlaying.value = false;
  statusText.value = "خطأ في التدفق";
  hint.value = "البث غير متاح مؤقتًا. يُرجى المحاولة لاحقًا.";
};
</script>

<style scoped>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

.card {
  background: #020617;
  border-radius: 18px;
  padding: 24px 22px;
  width: 95%;
  max-width: 420px;
  margin: 40px auto;
  box-shadow: 0 20px 40px rgba(15, 23, 42, 0.9);
  border: 1px solid rgba(148, 163, 184, 0.3);
  text-align: center;
  color: #e5e7eb;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
}

.logo {
  width: 72px;
  height: 72px;
  border-radius: 50%;
  margin: 0 auto 14px;
  background: radial-gradient(circle at 30% 20%, #bbf7d0, #16a34a);
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 800;
  font-size: 22px;
  color: #022c22;
  border: 2px solid rgba(15, 23, 42, 0.7);
}

h1 {
  margin: 0 0 4px;
  font-size: 1.3rem;
}

.subtitle {
  font-size: 0.9rem;
  color: #9ca3af;
  margin-bottom: 16px;
}

.status {
  font-size: 0.8rem;
  color: #9ca3af;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  margin-bottom: 10px;
}

.status-dot {
  width: 9px;
  height: 9px;
  border-radius: 999px;
  background: #f97373;
  box-shadow: 0 0 10px rgba(248, 113, 113, 0.9);
}

.status-dot.playing {
  background: #22c55e;
  box-shadow: 0 0 12px rgba(34, 197, 94, 0.9);
}

.audio-wrapper {
  background: rgba(15, 23, 42, 0.8);
  border-radius: 12px;
  padding: 10px 12px;
  border: 1px solid rgba(148, 163, 184, 0.3);
}

audio {
  width: 100%;
}

.hint {
  margin-top: 10px;
  font-size: 0.8rem;
  color: #9ca3af;
}

.footer {
  margin-top: 16px;
  font-size: 0.75rem;
  color: #6b7280;
}
</style>
