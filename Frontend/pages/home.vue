<script setup>
import { ref, computed } from "vue";
import { GridItem, GridLayout } from "../node_modules/vue3-drr-grid-layout";

const layout = [
  {
    chart: true,
    x: 0,
    y: 0,
    w: 8,
    h: 4,
    minW: 0,
    minH: 0,
    i: 0,
    static: false,
    option: {
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
          data: [10, 8, 12, 13, 10, 5, 15],
          type: "bar",
        },
      ],
    },
  },
  {
    card: true,
    x: 8,
    y: 0,
    w: 4,
    h: 4,
    minW: 4,
    minH: 4,
    i: 1,
    static: false,
    option: {},
  },
  {
    chart: true,
    x: 4,
    y: 0,
    w: 12,
    h: 4,
    minW: 0,
    minH: 0,
    i: 2,
    static: false,
    option: {
      toolbox: {
        show: true,
        feature: {
          dataZoom: {
            yAxisIndex: "none",
          },
          dataView: { readOnly: false },
          magicType: { type: ["line", "bar"] },
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
          type: "line",
        },
      ],
    },
  },
  // { x: 6, y: 0, w: 2, h: 3, i: 3, static: false },
  // { x: 8, y: 0, w: 2, h: 3, i: 4, static: false },
  // { x: 10, y: 0, w: 2, h: 3, i: 5, static: false },
  // { x: 0, y: 5, w: 2, h: 5, i: 6, static: false },
  // { x: 2, y: 5, w: 2, h: 5, i: 7, static: false },
  // { x: 4, y: 5, w: 2, h: 5, i: 8, static: false },
  // { x: 6, y: 3, w: 2, h: 4, i: 9, static: false },
];
</script>

<template>
  <grid-layout v-model:layout="layout" :col-num="12" :row-height="120">
    <template #default="{ gridItemProps }">
      <grid-item
        v-for="item in layout"
        :key="item.i"
        v-bind="gridItemProps"
        :x="item.x"
        :y="item.y"
        :w="item.w"
        :h="item.h"
        :minH="item.minH"
        :minW="item.minW"
        :i="item.i"
        drag-allow-from=".vue-draggable-handle"
        drag-ignore-from=".no-drag"
      >
        <template #default>
          <ChartBar v-if="item.chart" :option="item.option" />
          <ClockManager v-if="item.card" />
        </template>
      </grid-item>
    </template>
  </grid-layout>
</template>

<script>
definePageMeta({
  layout: "home",
});
</script>
