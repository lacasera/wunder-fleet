<template>
    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{getTitle}}</div>
                    <div class="card-body">
                        <form action="" class="form">
                            <div class="persnal-info" v-if="currentForm === 1">
                                <personal-information />
                            </div>
                            <div class="address" v-if="currentForm === 2">
                                <address-info />
                            </div>
                            <div class="payment" v-if="currentForm === 3">
                                <payment />
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-secondary"
                            @click="currentForm--"
                            :disabled="currentForm === 1">
                            Back
                        </button>
                        <button
                            class="btn btn-success float-right"
                            @click="nextButtonHandler">
                            {{currentForm === 3 ? 'Submit' : 'Next'}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import Address from './Address'
    import Payment from "./Payment";
    import PersonalInformation from './PersonalInformation'

    export default {
        computed: {
           getTitle: function () {
               let pageTitle = ''
               switch (this.currentForm) {
                   case 1:
                       pageTitle = 'Personal Information'
                       break
                   case 2:
                       pageTitle = 'Address Information'
                       break
                   case 3:
                       pageTitle = 'Payment Information'
               }
               return pageTitle
           }
        },
        data() {
            return {
                currentForm: 1
            }
        },
        mounted(){

        },
        methods: {
            nextButtonHandler: function () {
                if (this.currentForm !== 3) {
                    this.currentForm++
                    return;
                }

                if (this.currentForm === 3) {
                   const data = this.$store.state
                    axios.post('/api/store', data )
                        .then(({ data }) => {
                            console.log(data)
                        })
                        .catch(error => console.log(error))
                }
            }
        },
        components: {
            Payment,
            PersonalInformation,
            'address-info' : Address
        }
    }
</script>
