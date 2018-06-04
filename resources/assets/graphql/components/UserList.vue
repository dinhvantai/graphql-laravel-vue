<template>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h2 class="title">Users</h2>
                    <table class="table is-striped is-narrow is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Full Name</th>
                                <th>Join At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users" :key="user.id">
                                <td>{{ user.email }}</td>
                                <td>{{ user.profile.address }}</td>
                                <td>{{ `${user.profile.first_name} ${user.profile.last_name}` }}</td>
                                <td>{{ user.created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { ALL_USERS_QUERY } from '../graphql'

    // Component def
    export default {
        name: 'UserList',

        // Local state
        data() {
            return {
                users: [],
            }
        },

        // Apollo GraphQL
        apollo: {
            users: {
                query: ALL_USERS_QUERY
            },
        },
    }
</script>
