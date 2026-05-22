function consumir_api() {
    var endpoint = "https://jsonplaceholder.typicode.com/posts";

    fetch(endpoint)
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {

        // --- GRÁFICA 1: Barras - longitud de títulos por post ---
        var valores_x = [];
        var valores_y = [];

        for (let i = 0; i < 10; i++) {
            valores_x.push("Post " + data[i].id);
            valores_y.push(data[i].title.length);
        }

        var grafica1 = [{
            x: valores_x,
            y: valores_y,
            type: 'bar'
        }];

        Plotly.newPlot('grafica1', grafica1, { title: 'Longitud de títulos' });

        // --- GRÁFICA 2: Pie - posts por usuario ---
        var conteo = {};

        for (let i = 0; i < data.length; i++) {
            var userId = "Usuario " + data[i].userId;
            conteo[userId] = (conteo[userId] || 0) + 1;
        }

        var grafica2 = [{
            labels: Object.keys(conteo),
            values: Object.values(conteo),
            type: 'pie'
        }];

        Plotly.newPlot('grafica2', grafica2, { title: 'Posts por usuario' });
    });
}