<template>
  <div class="card">
    <div class="card-header">
      <strong>Card Count per session
           <!-- ({{ sid }}) -->

      </strong>
    </div>
    <div class="card-body">
      <!-- <div class="small"> -->
        <bar-chart v-if="loaded" :chart-data="datacollection" :options="options" ></bar-chart>
      <!-- </div> -->
    </div>
  </div>
</template>

<script>
import BarChart from "./BarChart.js";

export default {
  components: {
    BarChart,
  },
  props: ["sid"],
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
      return `http://localhost/api/gamedata/session/${this.sid}/defintion`;
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
