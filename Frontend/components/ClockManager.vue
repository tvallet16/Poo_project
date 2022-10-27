<script setup>
import { ref, onMounted, computed } from "vue";

const timer1 = ref(0);
const timer2 = ref(Date.now());

const timer_value = computed({
  get() {
    return timer2.value;
  },
  set(val) {
    timer2.value += val;
  },
});

setInterval(() => {
  timer2.value += 1000;
}, 1000);
</script>

<template>
  <v-card class="mx-auto" height="100%">
    <v-card-text>
      <p class="text-h4 text--primary">Work done today</p>
      <p class="text-h3 text--primary" v-text="timer_value"></p>
    </v-card-text>
    <v-card-text>
      <p class="text-h4 text--primary">Work done yesterday</p>
      <p class="text-h3 text--primary" v-text="timer1"></p>
    </v-card-text>
    <v-card-actions>
      <v-btn text color="teal accent-4" @click="reveal = true">
        Learn More
      </v-btn>
    </v-card-actions>

    <v-expand-transition>
      <v-card
        v-if="reveal"
        class="transition-fast-in-fast-out v-card--reveal"
        style="height: 100%"
      >
        <v-card-text class="pb-0">
          <p class="text-h4 text--primary">Origin</p>
          <p>
            late 16th century (as a noun denoting a place where alms were
            distributed): from medieval Latin eleemosynarius, from late Latin
            eleemosyna ‘alms’, from Greek eleēmosunē ‘compassion’
          </p>
        </v-card-text>
        <v-card-actions class="pt-0">
          <v-btn text color="teal accent-4" @click="reveal = false">
            Close
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-expand-transition>
  </v-card>
</template>