<script>
    const Z = document.getElementById("salesChart");
    Z &&
        new q.kL(Z, {
            type: "line",
            options: {
                scales: {
                    y: {
                        ticks: {
                            callback: function(e) {
                                return "$" + e + "k";
                            },
                        },
                    },
                },
            },
            data: {
                labels: [
                    "Oct 1",
                    "Oct 3",
                    "Oct 6",
                    "Oct 9",
                    "Oct 12",
                    "Oct 5",
                    "Oct 18",
                    "Oct 21",
                    "Oct 24",
                    "Oct 27",
                    "Oct 30",
                ],
                datasets: [{
                    label: "All",
                    data: [
                        0, 0.6, 0.5, 15, 10, 20, 15, 25, 20, 40,
                        25,
                    ],
                }, ],
            },
        });
</script>
