<template>
  <v-chart class="chart" :option="option" autoresize />
</template>

<script>
import VChart, { THEME_KEY } from "vue-echarts";
import { ref, defineComponent } from "vue";

import * as echarts from "echarts/core";
import {
  TitleComponent,
  ToolboxComponent,
  TooltipComponent,
  GridComponent,
  LegendComponent,
  MarkLineComponent,
  MarkPointComponent,
} from "echarts/components";
import { BarChart } from "echarts/charts";
import { UniversalTransition } from "echarts/features";
import { CanvasRenderer } from "echarts/renderers";

echarts.use([
  TitleComponent,
  ToolboxComponent,
  TooltipComponent,
  GridComponent,
  LegendComponent,
  MarkLineComponent,
  MarkPointComponent,
  BarChart,
  CanvasRenderer,
  UniversalTransition,
]);

export default defineComponent({
  name: "HelloWorld",
  components: {
    VChart,
  },
  setup() {
    const option = ref({
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
          data: [8, 10, 2, 5, 10, 15, 1],
          type: "bar",
        },
      ],
    });

    return { option };
  },
});
</script>

<style>
body {
  margin: 0;
}
</style>
