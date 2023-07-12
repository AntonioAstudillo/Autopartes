const xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let jsonData = JSON.parse(xhttp.responseText);

        let data = [["Marca", "Cantidad"]];

        for (let i = 0; i < jsonData.length; i++) {
            let marca = jsonData[i].marca;
            let cantidad = jsonData[i].cantidad;
            data.push([marca, cantidad]);
        }

        google.charts.load("current", { packages: ["corechart"] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var chartData = google.visualization.arrayToDataTable(data);

            var options = {
                title: "Conteo de marcas",
                is3D: true,
            };

            var chart = new google.visualization.PieChart(
                document.getElementById("piechart_3d")
            );
            chart.draw(chartData, options);
        }
    }
};

xhttp.open("get", `/dashboard/getDataChart`);
xhttp.send();
