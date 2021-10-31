<template>
  	<div> 
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
			<router-link class="navbar-brand text-primary" to="/">The Very Basic CSV Converter</router-link>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link mt-1">Home_</router-link>
                    <router-link to="/about" class="nav-item nav-link mt-1">Future Improvements_</router-link>
                </div>
            </div>
        </nav>

        <router-view> </router-view>
    </div>
</template>

<script>
	export default {
		name: "App",
	};
</script>