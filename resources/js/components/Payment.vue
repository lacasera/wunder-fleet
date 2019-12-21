<template>
    <div class="form-group">
        <div class="form-group">
            <label for="formGroupExampleInput">Account Owner</label>
            <input
               autofocus
               type="text"
               required
               class="form-control"
               @change="setInputState"
               :value="getAccountOwner"
               name="account_owner"
               placeholder="John Doe">
        </div>
        <div class="form-group">
            <label for="">IBAN</label>
            <input
               type="text"
               required
               :value="iban"
               @change="setInputState"
               class="form-control"
               name="iban"
               placeholder="">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Payment",
        computed:{
          getAccountOwner: function () {
              return this.$store.state.first_name +' ' + this.$store.state.last_name
          }
        },
        data(){
            return {
                ...this.$store.state
            }
        },
        methods: {
            setInputState: function (e) {
                const name = e.target.name
                const value = e.target.value
                this.$store.dispatch('setState', { name , value })
            }
        }
    }
</script>

<style scoped>

</style>