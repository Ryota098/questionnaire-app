@extends('layouts.app')

@section('content')
<main class="sm:max-w-4xl sm:mx-auto px-2 sm:px-6">
    
    <div class="w-full p-6 bg-white sm:border-1 sm:rounded-sm sm:shadow-md">
        <button type="button" onClick="history.back()" class="flex items-center justify-center w-9 h-9 bg-gray-200 rounded-full inline-block text-xl hover:opacity-80 transition-all">
            <i class="fas fa-angle-double-left"></i> 
        </button> 
        
        <h1 class="font-bold text-xl text-center">
            {{ $question->question }}
        </h1>
        <div id="piechart" class="w-full h-3/5"></div>
    </div>
    
</main>
@endsection

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    function drawChart() {
    
        var data = google.visualization.arrayToDataTable([
            ['answer', 'Percentage'],
            <?php echo $data; ?>
        ]);
        
        var options = {
            title: 'アンケート回答人数 {{ $responser->count() }} 人',
            fontSize: 15,
        };
        
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        
        chart.draw(data, options);
    }
</script>