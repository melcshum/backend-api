<script>
import { Bar, mixins } from "vue-chartjs";
const { reactiveProp } = mixins

export default {
  extends: Bar,
  mixins: [reactiveProp],
  props: ['options', "sid"],
  data() {
    return {
      chartData: {
        labels: [],
        datasets: [
          {
            label: "Bar Chart",
            borderWidth: 1,
            // backgroundColor: [
            //   'rgba(255, 99, 132, 0.2)',
            //   'rgba(54, 162, 235, 0.2)',
            //   'rgba(255, 206, 86, 0.2)',
            //   'rgba(75, 192, 192, 0.2)',
            //   'rgba(153, 102, 255, 0.2)',
            //   'rgba(255, 159, 64, 0.2)',
            //   'rgba(255, 99, 132, 0.2)',
            //   'rgba(54, 162, 235, 0.2)',
            //   'rgba(255, 206, 86, 0.2)',
            //   'rgba(75, 192, 192, 0.2)',
            //   'rgba(153, 102, 255, 0.2)',
            //   'rgba(255, 159, 64, 0.2)'
            // ],
            // borderColor: [
            //   'rgba(255,99,132,1)',
            //   'rgba(54, 162, 235, 1)',
            //   'rgba(255, 206, 86, 1)',
            //   'rgba(75, 192, 192, 1)',
            //   'rgba(153, 102, 255, 1)',
            //   'rgba(255, 159, 64, 1)',
            //   'rgba(255,99,132,1)',
            //   'rgba(54, 162, 235, 1)',
            //   'rgba(255, 206, 86, 1)',
            //   'rgba(75, 192, 192, 1)',
            //   'rgba(153, 102, 255, 1)',
            //   'rgba(255, 159, 64, 1)'
            // ],
            pointBorderColor: "#2554FF",
            data: [],
          },
        ],
      },
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
  async created() {
    var url =  `http://localhost/api/gamedata/session/${this.sid}/defintion`;

    console.log(url);
    this.fetch(url);

  },
  methods: {
    fetch(endpoint) {
      axios.get(endpoint).then(({ data }) => {
        //    console.log(data);
        var labels = [];
        var dataset = [];

        Object.keys(data).forEach(function (k, v) {
          labels.push(k);
          dataset.push(v);
        });

        console.log(dataset);
        this.chartData.labels = ["abc", "xzy"];
        this.chartData.datasets.data = [10, 2];

        this.renderChart(this.chartData, this.options);
      });
    },
  },
  mounted() {
    this.renderChart(this.chartData, this.options);
  },
};
</script>
