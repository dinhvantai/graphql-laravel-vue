import Vue from 'vue'
import { ApolloClient } from 'apollo-client'
import { HttpLink } from 'apollo-link-http'
import { setContext } from 'apollo-link-context'
import { InMemoryCache } from 'apollo-cache-inmemory'
import VueApollo from 'vue-apollo'
import App from './App'

const httpLink = new HttpLink({
    // You should use an absolute URL here
    uri: 'http://localhost:8080/graphql'
})

const authLink = setContext((_, { headers }) => {
    return {
        ...headers,
    //   authorization: token //for authentication
    }
})

// Create the apollo client
const apolloClient = new ApolloClient({
    link: authLink.concat(httpLink),
    cache: new InMemoryCache(),
    connectToDevTools: true,
})

// Install the vue plugin
Vue.use(VueApollo)

const apolloProvider = new VueApollo({
    defaultClient: apolloClient
})

/* eslint-disable no-new */
new Vue({
    el: '#root',
    provide: apolloProvider.provide(),
    template: '<App/>',
    components: { App }
})
