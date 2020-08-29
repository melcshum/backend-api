<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Chart Component</div>

          <div class="small">
            <h4>rader</h4>
            <rader-chart
              v-if="loaded"
              :chart-data="datacollection"
              :options="options"
              :height="200"
            ></rader-chart>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import RaderChart from "./RaderChart.js";

export default {
  components: {
    RaderChart,
  },
  data() {
    return {
      loaded: false,
      datacollection: {},
      options: {
        scale: {
          ticks: {
            beginAtZero: true,
            min: 0,
            max: 100,
            stepSize: 20,
          },
          pointLabels: {
            fontSize: 18,
          },
        },
        legend: {
          position: "left",
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
          labels: [
            "English",
            "Maths",
            "Physics",
            "Chemistry",
            "Biology",
            "History",
          ],
          datasets: [
            {
              label: "Student A",
              backgroundColor: "transparent",
              borderColor: "rgba(200,0,0,0.6)",
              fill: false,
              radius: 6,
              pointRadius: 6,
              pointBorderWidth: 3,
              pointBackgroundColor: "orange",
              pointBorderColor: "rgba(200,0,0,0.6)",
              pointHoverRadius: 10,
              data: [65, 75, 70, 80, 60, 80],
            },
            {
              label: "Student B",
              backgroundColor: "transparent",
              borderColor: "rgba(0,0,200,0.6)",
              fill: false,
              radius: 6,
              pointRadius: 6,
              pointBorderWidth: 3,
              pointBackgroundColor: "cornflowerblue",
              pointBorderColor: "rgba(0,0,200,0.6)",
              pointHoverRadius: 10,
              data: [54, 65, 60, 70, 70, 75],
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
