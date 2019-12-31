<template>
    <div v-if="validationErrors">
        <div  v-for="(value, key, index) in validationErrors"
              :key="index"
              class="alert alert-danger alert-dismissible fade show"
              role="alert">
            <strong>Error!</strong> {{value}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RequestErrors",
        props: ['errors'],
        computed:{
            validationErrors(){
                let errors = Object.values(this.errors);
                errors = errors.flat();
                return errors;
            }
        }
    }
</script>

<style scoped>

</style>