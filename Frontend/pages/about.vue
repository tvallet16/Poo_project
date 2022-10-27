<script setup>
import { ref, computed } from "vue";

const layout = [
  { x: 0, y: 0, w: 2, h: 2, i: 0 },
  { x: 2, y: 0, w: 2, h: 4, i: 1 },
  { x: 4, y: 0, w: 2, h: 5, i: 2 },
  { x: 6, y: 0, w: 2, h: 3, i: 3 },
  { x: 8, y: 0, w: 2, h: 3, i: 4 },
  { x: 8, y: 0, w: 2, h: 3, i: 5 },
  { x: 0, y: 5, w: 2, h: 5, i: 6 },
  { x: 2, y: 5, w: 2, h: 5, i: 7 },
  { x: 4, y: 5, w: 2, h: 5, i: 8 },
  { x: 6, y: 3, w: 2, h: 4, i: 9 },
];

const options = {
  toolbox: {
    show: true,
    feature: {
      dataZoom: {
        yAxisIndex: "none",
      },
      dataView: { readOnly: false },
      restore: {},
      saveAsImage: {},
    },
  },
  xAxis: {
    type: "category",
    data: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
  },
  yAxis: {
    type: "value",
  },
  series: [
    {
      data: [20, 20, 0, 20, 0, 20, 0],
      type: "bar",
    },
  ],
};
</script>

<template>
  <div style="width: 600px; height: 400px">
    <ChartBasic :option="options" />
  </div>
</template>

<script>
definePageMeta({
  layout: "home",
});
</script>
