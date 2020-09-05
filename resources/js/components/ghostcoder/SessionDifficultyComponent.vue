<template>
  <div class="card m-2">
    <div class="card-header">

      <h4>Player Vs Scenario</h4>
    </div>

    <div class="card-body">
      <line-chart v-if="loaded" :chart-data="datacollection" :options="options"></line-chart>
    </div>
  </div>
</template>

<script>
import LineChart from "../basic/LineChart.js";

export default {
  components: {
    LineChart,
  },
  props: ['sid'],
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
        let playerData = [];
        let playerLabel = "player ";
        let sccenarioData = [];
        let sccenarioLabel = "Sccenario  ";

        Object.keys(data).forEach(function (k, v) {
          chartLabels.push(k);
          playerData.push(data[k].player_difficulty_rating);
          sccenarioData.push(data[k].scenario_difficulty_rating);
        });


        this.datacollection = {
          labels: chartLabels,
          datasets: [
            {
              label: playerLabel,
              // backgroundColor: "#f87979",
              pointBackgroundColor: "white",
              borderWidth: 1,
              pointBorderColor: "#249EBF",
              data: playerData,
            },
            {
              label: sccenarioLabel,
              //  backgroundColor: "#f87979",
              pointBackgroundColor: "red",
              borderWidth: 1,
              pointBorderColor: "#249EBF",
              data: sccenarioData,
            },
          ],
        };
        this.loaded = true;
      });
    },
  },
  computed: {
    endpoint() {
     return `/api/gamedata/session/${this.sid}/difficultyTrace`;
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
