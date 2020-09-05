<template>
  <div class="card">
    <div class="card-header">Bar</div>
    <div class="card-body">
      <div class="small">
        <bar-chart v-if="loaded" :chart-data="datacollection" :options="options" :height="200"></bar-chart>
      </div>
    </div>
  </div>
</template>

<script>
import BarChart from "./BarChart.js";

export default {
  components: {
    BarChart,
  },
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
          //Data to be represented on x-axis
          labels: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
          ],
          datasets: [
            {
              label: "Expern",
              backgroundColor: "#f87979",
              pointBackgroundColor: "white",
              borderWidth: 1,
              pointBorderColor: "#249EBF",
              //Data to be represented on y-axis
              data: [40, 20, 30, 50, 90, 10, 20, 40, 50, 70, 90, 100],
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
