<template>
  <v-chart class="chart" :option="option" autoresize />
</template>

<script>
import { ref, defineComponent } from "vue";
import VChart, { THEME_KEY } from "vue-echarts";

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

import {
  BarChart,
  LineChart,
  MapChart,
  PieChart,
  TreeChart,
  GaugeChart,
} from "echarts/charts";

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
  LineChart,
  MapChart,
  PieChart,
  TreeChart,
  GaugeChart,
  CanvasRenderer,
  UniversalTransition,
]);

export default defineComponent({
  components: {
    VChart,
  },
  setup(props) {
    const { option } = toRef(props);
    return { option };
  },
});
</script>
