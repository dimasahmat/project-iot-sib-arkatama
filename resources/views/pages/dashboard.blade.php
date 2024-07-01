@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <!-- Sensor -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2 fs-3 fw-bold text-dark">SENSOR</h5>
                </div>
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
                    <h5 class="card-title m-0 me-2 fs-3 fw-bold text-dark">ACTUATOR</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <!-- Led 1 Red -->
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-header">
                                <h6 class="card-title fs-3 fw-bold text-primary">LED 1</h6>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div id="ledred-icon" class="mdi mdi-lightbulb-off-outline fs-1"></div>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="ledred" id="ledred0" autocomplete="off"
                                        onchange="toggleLED('red', 0)">
                                    <label class="btn btn-outline-primary waves-effect" for="ledred0">OFF</label>

                                    <input type="radio" class="btn-check" name="ledred" id="ledred1" autocomplete="off"
                                        onchange="toggleLED('red', 1)">
                                    <label class="btn btn-outline-primary waves-effect" for="ledred1">ON</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Led 2 Green -->
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-header">
                                <h6 class="card-title fs-3 fw-bold text-primary">LED 2</h6>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div id="ledgreen-icon" class="mdi mdi-lightbulb-off-outline fs-1"></div>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="ledgreen" id="ledgreen0"
                                        autocomplete="off" onchange="toggleLED('green', 0)">
                                    <label class="btn btn-outline-primary waves-effect" for="ledgreen0">OFF</label>

                                    <input type="radio" class="btn-check" name="ledgreen" id="ledgreen1"
                                        autocomplete="off" onchange="toggleLED('green', 1)">
                                    <label class="btn btn-outline-primary waves-effect" for="ledgreen1">ON</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Led 3 Blue -->
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-header">
                                <h6 class="card-title fs-3 fw-bold text-primary">LED 3</h6>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div id="ledblue-icon" class="mdi mdi-lightbulb-off-outline fs-1"></div>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="ledblue" id="ledblue0"
                                        autocomplete="off" onchange="toggleLED('blue', 0)">
                                    <label class="btn btn-outline-primary waves-effect" for="ledblue0">OFF</label>

                                    <input type="radio" class="btn-check" name="ledblue" id="ledblue1"
                                        autocomplete="off" onchange="toggleLED('blue', 1)">
                                    <label class="btn btn-outline-primary waves-effect" for="ledblue1">ON</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Buzzer -->
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-header">
                                <h6 class="card-title fs-3 fw-bold text-primary">Buzzer</h6>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div id="buzzer-icon" class="mdi mdi-volume-off fs-1"></div>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Control -->

    <script>
        let previousTemperature = null;
        let previousHumidity = null;
        let previousGas = null;
        let previousRain = null;
        let previousLedRed = null;
        let previousLedGreen = null;
        let previousLedBlue = null;
        let previousBuzzer = null;

        const temperatureUrl = '{{ route('api.sensors.temperature.index') }}';
        const humidityUrl = '{{ route('api.sensors.humidity.index') }}';
        const gasUrl = '{{ route('api.sensors.gas.index') }}';
        const rainUrl = '{{ route('api.sensors.rain.index') }}';
        const ledRedUrl = '{{ route('api.control.ledred.index') }}';
        const ledGreenUrl = '{{ route('api.control.ledgreen.index') }}';
        const ledBlueUrl = '{{ route('api.control.ledblue.index') }}';
        const buzzerUrl = '{{ route('api.control.buzzer.index') }}';

        async function fetchData(url, elementId, previousValue) {
            try {
                let response = await fetch(url);
                let data = await response.json();

                if (data.data && Array.isArray(data.data) && data.data.length > 0 && data.data[0].value !== undefined) {
                    const newValue = data.data[0].value;

                    if (newValue !== previousValue) {
                        document.getElementById(elementId).innerText = newValue;
                        return newValue;
                    }
                } else {
                    document.getElementById(elementId).innerText = 'Data not available';
                }
            } catch (error) {
                console.error(`Error fetching ${elementId} data:`, error);
                document.getElementById(elementId).innerText = 'Error';
            }
            return previousValue;
        }

        async function fetchControlData(url, elementId, previousValue, onClass, offClass) {
            try {
                let response = await fetch(url);
                let data = await response.json();

                if (data.data && Array.isArray(data.data) && data.data.length > 0 && data.data[0].value !== undefined) {
                    const newValue = data.data[0].value;

                    if (newValue !== previousValue) {
                        const element = document.getElementById(elementId);
                        if (newValue == 1) {
                            element.classList.remove(offClass);
                            element.classList.add(onClass);
                            element.classList.add('text-warning');
                        } else {
                            element.classList.remove(onClass);
                            element.classList.add(offClass);
                            element.classList.remove('text-warning');
                        }
                        return newValue;
                    }
                } else {
                    console.error(`Invalid data format for ${elementId}`);
                }
            } catch (error) {
                console.error(`Error fetching ${elementId} data:`, error);
            }
            return previousValue;
        }

        window.onload = function() {
            updateData();
            setInterval(updateData, 5000);
        }

        async function updateData() {
            previousTemperature = await fetchData(temperatureUrl, 'temperature', previousTemperature);
            previousHumidity = await fetchData(humidityUrl, 'humidity', previousHumidity);
            previousGas = await fetchData(gasUrl, 'gas', previousGas);
            previousRain = await fetchData(rainUrl, 'rain', previousRain);
            previousLedRed = await fetchControlData(ledRedUrl, 'ledred-icon', previousLedRed, 'mdi-lightbulb-on',
                'mdi-lightbulb-off-outline');
            previousLedGreen = await fetchControlData(ledGreenUrl, 'ledgreen-icon', previousLedGreen,
                'mdi-lightbulb-on', 'mdi-lightbulb-off-outline');
            previousLedBlue = await fetchControlData(ledBlueUrl, 'ledblue-icon', previousLedBlue, 'mdi-lightbulb-on',
                'mdi-lightbulb-off-outline');
            previousBuzzer = await fetchControlData(buzzerUrl, 'buzzer-icon', previousBuzzer, 'mdi-volume-high',
                'mdi-volume-off');

            const gasElement = document.getElementById('gas');
            if (previousGas !== null && parseFloat(previousGas) > 299) {
                gasElement.style.color = 'red';
            } else {
                gasElement.style.color = '';
            }
        }

        async function toggleLED(color, value) {
            let url;
            if (color === 'red') {
                url = "{{ route('api.control.ledred.store') }}";
            } else if (color === 'green') {
                url = "{{ route('api.control.ledgreen.store') }}";
            } else if (color === 'blue') {
                url = "{{ route('api.control.ledblue.store') }}";
            }

            try {
                let response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        value
                    }),
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                let data = await response.json();
                console.log(data);
                updateData();
            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        }
    </script>
@endsection
