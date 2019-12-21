<template>
    <div>
        <div class="form-group">
            <label for="">Street</label>
            <input
                type="text"
                required
                :value="street"
                class="form-control"
                name="street"
                @change="setInputState"
                placeholder="1234 Main St">
        </div>
        <div class="form-group">
            <label for="">House Number</label>
            <input
               type="text"
               required
               :value="house_number"
               class="form-control"
               @change="setInputState"
               name="house_number"
               placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="">City</label>
                <input
                   type="text"
                   required
                   :value="city"
                   class="form-control"
                   @change="setInputState"
                   name="city">
            </div>
            <div class="form-group col-md-4">
                <label for="">Zip</label>
                <input
                   type="text"
                   required
                   :value="zip_code"
                   class="form-control"
                   @change="setInputState"
                   name="zip_code">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Address",
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