<template>
 <span dir="ltr" >
    <audio class="op-player__media" id="audio-live" controls>
      <source src="http://5.135.194.225:8000/live" />
    </audio>
  </span>
</template>

<script>

import OpenPlayerJS from 'openplayerjs';

export default {

  mounted() {
    const player = new OpenPlayerJS('audio-live', {
      hls: {
        startLevel: -1
      },
      live: {
        showLabel: true,
        showProgress: true,
      },
    })
    player.init();
  }
}

</script>
