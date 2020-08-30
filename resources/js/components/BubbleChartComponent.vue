<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Chart Component</div>

          <div class="small">
            <h4>Bubble</h4>
            <bubble-chart v-if="loaded" :chart-data="datacollection" :options="options" :height="200"></bubble-chart>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import BubbleChart from "./BubbleChart.js";

export default {
  components: {
    BubbleChart,
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
          labels: ["Data"],
          datasets: [
            {
              label: "Data One",
              backgroundColor: "#f87979",
              pointBackgroundColor: "white",
              borderWidth: 1,
              pointBorderColor: "#249EBF",
              data: [
                {
                  x: 100,
                  y: 0,
                  r: 10,
                },
                {
                  x: 60,
                  y: 30,
                  r: 20,
                },
                {
                  x: 40,
                  y: 60,
                  r: 25,
                },
                {
                  x: 80,
                  y: 80,
                  r: 50,
                },
                {
                  x: 20,
                  y: 30,
                  r: 25,
                },
                {
                  x: 0,
                  y: 100,
                  r: 5,
                },
              ],
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
