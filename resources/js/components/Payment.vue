<template>
    <div class="form-group">
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