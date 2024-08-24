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
            @php
                $first = Carbon\Carbon::now()->firstOfMonth();
                $last = Carbon\Carbon::now()->lastOfMonth();
                $number_of_days = $first->diffInDays($last);
                // dd($number_of_days)
                $labels = [];
                $sum = [];

                for ($i = 1; $i <= $number_of_days; $i++) {
                    array_push($labels, $i);
                }

                foreach($labels as $label){
                    $date = Carbon\Carbon::now()->subDays($label)->toDateString();
                    $dep = App\Models\Transactions::where('created_at','=',$date)->where('type','=','deposit')->sum('amount');
                    array_push($sum,$dep);
                }
                
            @endphp
            data: {
                labels: [
                    @foreach ($labels as $label)
                        {!! end($labels) == $label ? "'" . $label . "'" : "'" . $label . "'," !!}
                    @endforeach
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
