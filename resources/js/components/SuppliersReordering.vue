<template>
    <div class="suppliersreordering">
        <ApolloQuery :query="$options.query">
            <template slot-scope="{result: {isLoading, data, error }}">
                <div v-if="isLoading">Loading....</div>
                <div v-else-if="data">
                    <a href="#" v-for="supplier of data.suppliers" :key="supplier.person_id" class="link-margin">
                        {{ supplier.person_id }} - {{ supplier.company_name }} : {{ supplier.person.phone_number }}
                    </a>
                </div>
            </template>
        </ApolloQuery>
    </div>
</template>


<script>
    import gql from 'graphql-tag';

    export default {
        query: gql`
            query {
                suppliers(deleted: false) {
                    person_id
                    company_name
                    account_number
                    deleted
                    person {
                        last_name
                        first_name
                        phone_number
                        email
                    }
                }
            }
        `
    }
</script>
