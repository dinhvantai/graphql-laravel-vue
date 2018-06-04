import gql from 'graphql-tag'

export const ALL_USERS_QUERY = gql`
    query Users {
        users {
            id
            email
            created_at
            profile {
                first_name
                last_name
                address
            }
        }
    }
`
