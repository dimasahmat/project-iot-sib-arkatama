@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <!-- Sensor -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2 fs-3 fw-bold text-dark">Monitoring</h5>
                </div>
                <p class="mt-3"><span class="fw-medium">Total 48.5% growth</span> 😎 this month</p>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <!-- Temperature Card -->
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-header">
                                <h6 class="card-title fs-3 fw-bold text-primary">Temperature</h6>
                                <p class="card-title text-secondary fw-bold">DHT-11</p>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h5 class="card-title fs-1 fw-bold" id="temperature">Loading...</h5>
                                <p class="unit"> °C</p>
                            </div>
                        </div>
                    </div>
                    <!-- Humidity Card -->
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-header">
                                <h6 class="card-title fs-3 fw-bold text-primary">Humidity</h6>
                                <p class="card-title text-secondary fw-bold">DHT-11</p>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h5 class="card-title fs-1 fw-bold" id="humidity">Loading...</h5>
                                <p class="unit"> %</p>
                            </div>
                        </div>
                    </div>
                    <!-- Sensor Gas Card -->
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-header">
                                <h6 class="card-title fs-3 fw-bold text-primary">Gas</h6>
                                <p class="card-title text-secondary fw-bold">MQ-2</p>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h5 class="card-title fs-1 fw-bold" id="gas">Loading...</h5>
                                <p class="unit"> ppm</p>
                            </div>
                        </div>
                    </div>
                    <!-- Sensor Hujan Card -->
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-header">
                                <h6 class="card-title fs-3 fw-bold text-primary">Rain</h6>
                                <p class="card-title text-secondary fw-bold">Rain sensor</p>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h5 class="card-title fs-1 fw-bold" id="rain">Loading...</h5>
                                <p class=""> mm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Sensor -->

        <!-- Control -->
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2 fs-3 fw-bold text-dark">Control</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <!-- Led 1 Red -->
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-header">
                                <p class="card-title text-secondary fw-bold">LED 1</p>
                                <h6 class="card-title fs-3 fw-bold text-danger">Red</h6>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <button id="redBtn" class="btn btn-danger" onclick="toggleLED('red')">Turn On</button>
                            </div>
                        </div>
                    </div>
                    <!-- Humidity Card -->
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-header">
                                <h6 class="card-title fs-3 fw-bold text-primary">Humidity</h6>
                                <p class="card-title text-secondary fw-bold">DHT-11</p>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <button id="greenBtn" class="btn btn-success" onclick="toggleLED('green')">Turn On</button>
                            </div>
                        </div>
                    </div>
                    <!-- Sensor Gas Card -->
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-header">
                                <h6 class="card-title fs-3 fw-bold text-primary">Gas</h6>
                                <p class="card-title text-secondary fw-bold">MQ-2</p>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <button id="blueBtn" class="btn btn-primary" onclick="toggleLED('blue')">Turn On</button>
                            </div>
                        </div>
                    </div>
                    <!-- Sensor Hujan Card -->
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-header">
                                <h6 class="card-title fs-3 fw-bold text-primary">Rain</h6>
                                <p class="card-title text-secondary fw-bold">Rain sensor</p>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <button id="buzzerBtn" class="btn btn-warning" onclick="toggleBuzzer()">Turn On</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Control -->

        <script>
            // function Sensor
            let previousTemperature = null;
            let previousHumidity = null;
            let previousGas = null;
            let previousRain = null;

            const temperatureUrl = '{{ route('api.sensors.temperature.index') }}';
            const humidityUrl = '{{ route('api.sensors.humidity.index') }}';
            const gasUrl = '{{ route('api.sensors.gas.index') }}';
            const rainUrl = '{{ route('api.sensors.rain.index') }}';

            async function fetchData(url, elementId, previousValue) {
                try {
                    let response = await fetch(url);
                    let data = await response.json();

                    // Log data for debugging
                    console.log(`Data from ${elementId}:`, data);

                    // Pastikan data adalah array dan ambil nilai dari objek pertama
                    if (data.data && Array.isArray(data.data) && data.data.length > 0 && data.data[0].value !== undefined) {
                        const newValue = data.data[0].value;

                        // Bandingkan dengan nilai sebelumnya, jika berbeda perbarui
                        if (newValue !== previousValue) {
                            document.getElementById(elementId).innerText = newValue;
                            return newValue; // Update nilai sebelumnya
                        }
                    } else {
                        document.getElementById(elementId).innerText = 'Data not available';
                    }
                } catch (error) {
                    console.error(`Error fetching ${elementId} data:`, error);
                    document.getElementById(elementId).innerText = 'Error';
                }
                return previousValue; // Return nilai sebelumnya jika tidak diperbarui
            }

            window.onload = function() {
                updateData();
                setInterval(updateData, 10000); // 10000 ms = 10 seconds
            }

            async function updateData() {
                previousTemperature = await fetchData(temperatureUrl, 'temperature', previousTemperature);
                previousHumidity = await fetchData(humidityUrl, 'humidity', previousHumidity);
                previousGas = await fetchData(gasUrl, 'gas', previousGas);
                previousRain = await fetchData(rainUrl, 'rain', previousRain);

                // Check if gas value is greater than 300 and change font color accordingly
                const gasElement = document.getElementById('gas');
                if (previousGas !== null && parseFloat(previousGas) > 299) {
                    gasElement.style.color = 'red';
                } else {
                    gasElement.style.color = ''; // Reset color if gas value is less than or equal to 300
                }
            }


            // Function to toggle LED
            function toggleLED(color, btn) {
                let url;
                if (color === 'red') {
                    url = "{{ route('api.control.ledred.store') }}";
                } else if (color === 'green') {
                    url = "{{ route('api.control.ledgreen.store') }}";
                } else if (color === 'blue') {
                    url = "{{ route('api.control.ledblue.store') }}";
                }

                if (btn.innerText === 'Turn On') {
                    // Call backend API to turn on the LED with specified color
                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                value: 1
                            }), // Send value 1 (on)
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log(data);
                            btn.innerText = 'Turn Off';
                            btn.classList.remove('btn-' + color);
                            btn.classList.add('btn-secondary');
                            btn.style.opacity = "0.5"; // Reduce button opacity
                            btn.value = '1'; // Set button value to 1 (on)
                        })
                        .catch(error => {
                            console.error('There was a problem with the fetch operation:', error);
                        });
                } else {
                    // Call backend API to turn off the LED with specified color
                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                value: 0
                            }), // Send value 0 (off)
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log(data);
                            btn.innerText = 'Turn On';
                            btn.classList.remove('btn-secondary');
                            btn.classList.add('btn-' + color);
                            btn.style.opacity = "1"; // Restore button opacity
                            btn.value = '0'; // Set button value to 0 (off)
                        })
                        .catch(error => {
                            console.error('There was a problem with the fetch operation:', error);
                        });
                }
            }
        </script>
    @endsection
