<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">What would I improve?</div>
                    <div class="card-body">
                        <ol>
                            <li>First has to be the back-end logic, it does seem a bit hardcode-y, right? It will work fine with the example csv and its format,
                                but it does limit functionality.
                            </li>
                            <li>Talking about the back-end, what could open functionality with all types of csv files is using a dependency like
                                Laravel-Excel by Maatwebsite. This will also allow for bigger datasets to be used.
                            </li>
                            <li>Using a front-end dependency like Papa Parse which should allow for all types of csv files to be easily cleaned up,
                                reducing the need for complex back-end logic.
                            </li>
                            <li>Step up the front-end more, likely add a framework like Vuetify. Bootstrap does the trick for the low-key look,
                                but for me personally, maybe it's a bit too low-key?
                            </li>
                            <li>If this was a proper project, I'd add unit/automated tests.</li>
                        </ol>
                        <!-- Hi, I'm Abdu Dafiri. This is my version of a very basic CSV to Text converter using Vue.js and Laravel.
                        Make sure to check my <a href="https://github.com/ADafiri/BasicCsvConverter" target=_blank>GitHub repo</a> 
                        for what my future improvements would be. Have a good day! -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "About",
    }
</script>