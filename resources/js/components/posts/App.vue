<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Laravel Vue CRUD Example</span>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a href="/coronas" class="nav-item nav-link">coronas</a>
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/add" class="nav-item nav-link">Add Post</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <example-component></example-component>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {}
</script>
