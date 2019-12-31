<template>
    <div class="form-group">
        <div class="form-group">
            <label for="formGroupExampleInput">First Name</label>
            <input
                type="text"
                required
                :value="first_name"
                class="form-control"
                @change="setInputState"
                name="first_name"
                placeholder="John">
        </div>
        <div class="form-group">
            <label for="">Last Name</label>
            <input
               type="text"
               required
               :value="last_name"
               class="form-control"
               @change="setInputState"
               name="last_name"
               placeholder="Doe">
        </div>
        <div class="form-group">
            <label for=""> Telephone</label>
            <input
               type="tel"
               required
               :value="phone_number"
               class="form-control"
               @change="setInputState"
               name="phone_number"
               placeholder="+233242424244">
            <p class="text-info" style="font-size: smaller">
                Phone number should include country code
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PersonalInformation",
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