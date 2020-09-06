<template>
  <div class="card m-2">
    <div class="card-header">
      <strong>{{ title }}</strong>
    </div>
    <div class="card-body">
      <bar-chart v-if="loaded" :chart-data="datacollection" :options="options"></bar-chart>
    </div>
  </div>
</template>

<script>
import BarChart from "../basic/BarChart.js";

export default {
  components: {
    BarChart,
  },
   props: ["sid", "title", "url"],
  data() {
    return {
      loaded: false,
      datacollection: {},
      options: {
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
              },
              gridLines: {
                display: true,
              },
            },
          ],
          xAxes: [
            {
              gridLines: {
                display: false,
              },
            },
          ],
        },
        legend: {
          display: true,
        },
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
        let chartLabels = [];
        let chartData = [];
        let chartLabel = "Card Count ";
      console.log(data);
        Object.keys(data).forEach(function (k, v) {

          chartLabels.push(k);
          chartData.push(data[k]);
        });

        this.datacollection = {
          labels: chartLabels,
          datasets: [
            {
              label: chartLabel,
              backgroundColor: "#FF0066",
              pointBackgroundColor: "white",
              borderWidth: 1,
              pointBorderColor: "#249EBF",
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
    //  this.url = `/api/gamedata/session/${this.sid}/defintion`;

      return `${this.url}`;
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
