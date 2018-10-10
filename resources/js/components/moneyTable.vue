<template>
    <div class="money-table">
        <table class="table table-dark" v-if="currencies">
            <thead>
            <tr>
                <th scope="col">Название валюты</th>
                <th scope="col">Цена</th>
                <th scope="col">Количество</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="currency in currencies">
                <td>{{currency.name}}</td>
                <td>{{currency.volume}}</td>
                <td>{{currency.amount}}</td>
            </tr>
            </tbody>
        </table>

        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button @click="updateCurrencies" class="nav-link active" aria-selected="true">Обновить данные</button>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                currencies: false
            }
        },
        created() {
            this.updateCurrencies();

            setInterval(() => {
                this.updateCurrencies();
            }, 15000);
        },
        methods:{
            updateCurrencies(){
                axios.get('/getCurrencies').then((response) => {
                    this.currencies = response.data;
                });
            }
        }
    }
</script>
<style>
    .money-table {
        display: flex;

    }

    .money-table nav {
        align-items: flex-start;
    }
</style>
