<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIS</title>


    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('/ClinicaLog.ico') }}" type="image/x-icon"/>
</head>

<body>
    <h2>Welcome, {{ $client->patient_fname }}</h2> 
    <p>ID: {{ $client->patient_id }}  Role: {{ $client->patient_patienttype}}</p>
</body> 

</html>
 