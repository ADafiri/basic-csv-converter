<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Please click below to upload the CSV file:</div>
                    <csv-uploader></csv-uploader>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    const csvUploader = () => import('../components/CsvUploader.vue');

    export default {
        name: "Home",
        components: {
            csvUploader,
        },
    }
</script>