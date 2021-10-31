<template>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="input-group">
                    <div class="custom-file pr-4">
                        <input class="custom-file-input" type="file" accept=".csv" @change="storeFile">
                        <label class="custom-file-label">{{ csvFile ? csvFile.name : '_' }}</label>
                    </div>
                    <button class="btn btn-primary" type="button" @click.prevent="submit">Convert</button>
                </div>
            </div>

            <div class="card border-0 py-4 px-4" v-if="results.length > 0">
                <div class="card-header">Results</div>
                <div class="card-body">
                    <div class="columns medium-4 pt-6" v-for="(result, index) in results" :key="index">
                        <div class="col-md-12">{{ index }} => {{ result }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CsvUploader",
        data: () => ({
            csvFile: null,
            results: [],
        }),
        methods: {
            storeFile(event) {
                this.csvFile = event.target.files[0];
            },
            submit() {
                let formData = new FormData();

                formData.append('file', this.csvFile);
                
                axios.post('convert-csv', formData)
                .then(response => {
                    let results = Object.values(response.data);
                    console.log("Raw Response: ", response);
                    console.log("Clean Results: ", results);
                    this.results.splice(0, 20, ...results);
                })
                .catch(error => {  
                    console.log("Error: ", error);
                });
            },
        }, 
    }
</script>