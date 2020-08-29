<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Chart Component</div>

          <div class="small">
            <h4>Month</h4>
            <line-chart v-if="loaded" :chart-data="datacollection" :options="options" :height="200"></line-chart>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LineChart from "./LineChart.js";

export default {
  components: {
    LineChart,
  },
  data() {
    return {
      loaded: false,
      datacollection: {},
      options: {

      },
    };
  },
  created() {
    // this method is called after the instance is created
    this.fetch(this.endpoint);
  },
  methods: {
    fetch(endpoint) {
      axios.get(endpoint).then(({ data }) => {
        console.log(data);
        let months = data.month;
        let chartData = data.data;
        let chartLabel = data.label;

        this.datacollection = {
          labels: months,
          datasets: [
            {
              label: chartLabel,
              backgroundColor: "#FF0066",
              data: chartData,
            },
          ],
        };
        this.loaded = true;
      });
    },
  },
  computed: {
    endpoint() {
      return `/api/chartjs`;
    },
  },
};
</script>

<style lang="css">
.small {
  max-width: 800px;
  /* max-height: 500px; */
  margin: 50px auto;
}
</style
