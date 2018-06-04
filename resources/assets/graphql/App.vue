<template>
    <div class="app">
        <UserList />
    </div>
</template>

<script>
    import UserList from './components/UserList'
    export default {
        name: 'app',

        components: {
            'UserList': UserList,
        },
    }
</script>

<style lang="scss">
    @import '~bootstrap/dist/css/bootstrap.css';
</style>
