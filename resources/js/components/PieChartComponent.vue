<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Chart Component</div>

          <div class="small">
            <h4>Pie</h4>
            <pie-chart v-if="loaded" :chart-data="datacollection" :options="options" :height="200"></pie-chart>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PieChart from "./PieChart.js";

export default {
  components: {
    PieChart,
  },
  data() {
    return {
      loaded: false,
      datacollection: {},
      options: {
        responsive: true,
        maintainAspectRatio: false,
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

        // this.datacollection = {
        //   labels: months,
        //   datasets: [
        //     {
        //       label: chartLabel,
        //       backgroundColor: "#FF0066",
        //       data: chartData,
        //     },
        //   ],
        // };

        this.datacollection = {
          label: "Views by Category",
          //Data to be represented on x-axis
          labels: ["Red", "Yellow", "Blue"],
          datasets: [
            {
              backgroundColor: ["#0074D9", "#FF4136", "#2ECC40"],
              data: [10, 20, 30],
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
