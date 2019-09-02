<template>
    <nav style="background-color:black; color:white; text-align:center;">
        <div id="time" style="display:inline-block; margin-left:10px; float:left;"></div>
        <div style="display:inline-block">Open Source Financials</div>
        <div style="display:inline-block;float:right; margin-right:10px;color:mediumseagreen">{{ loggedInUser}} | Logout</div>
    </nav>
</template>

<script>
    export default {
        name: "FirstTopNavbar",
        created() {
            window.setInterval(this.showTime, 1000);
        },
        data: {
          loggedInUser: "Steve Ireland",
        },
        data() {
            return {
                loggedInUser: "Steve Ireland"
            }
        },
        methods: {
            showTime() {
                var date = new Date(),
                    utc = new Date(Date.UTC(
                        date.getFullYear(),
                        date.getMonth(),
                        date.getDate(),
                        date.getHours(),
                        date.getMinutes(),
                        date.getSeconds()
                    ));
                document.getElementById('time').innerHTML = utc.toLocaleString();
            }
        }
    }
</script>

<style scoped>

</style>
