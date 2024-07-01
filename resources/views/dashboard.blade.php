<!DOCTYPE html>
<html lang="en">
<head>
    <title>Traffic Monitoring Dashboard</title>
</head>
<body>
    <h1>Total Unique Visitors: {{ $totalVisitors }}</h1>
    @foreach ($visitorStages as $stageName => $count)
        <p>{{ $stageName }}: {{ $count }}</p>
    @endforeach
</body>
</html>
