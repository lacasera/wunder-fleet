<template>
    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{getTitle}}</div>
                    <div class="card-body">
                        <errors v-if="errors" :errors="errors"></errors>
                        <form class="form" method="post"  v-if="!notification">
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
                        <div v-else class="completeted">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Completed!</strong> {{notification}}.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-secondary"  @click="currentForm--" :disabled="currentForm === 1">
                            Back
                        </button>
                        <button v-if="currentForm !==3" class="btn btn-success float-right" @click="nextButtonHandler">
                            Next
                        </button>
                        <button v-else class="btn btn-success float-right" type="button" @click="submitData">
                            <i v-if="isBusy" class="fa fa-spinner fa-spin"></i>
                            Submit
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
    import RequestErrors from './RequestErrors'
    import Payment from './Payment'
    import PersonalInformation from './PersonalInformation'

    export default {
        mounted(){
            const stage = localStorage.getItem('stage')
            this.currentForm = (stage) ? parseInt(stage) : 1
        },
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
                currentForm: 1,
                isBusy: false,
                notification: '',
                errors: ''
            }
        },
        methods: {
            nextButtonHandler: function () {
                if (this.currentForm !== 3) {
                    this.currentForm++
                    localStorage.setItem('stage', this.currentForm)
                }
            },
            submitData:  function () {
                this.errors = ''
                this.isBusy = true
                const data = this.$store.state
                axios.post('/api/store', data )
                    .then(({ data : { data } }) => {
                        this.isBusy =false
                        this.notification = data.paymentDataId
                        setTimeout(() => {
                            localStorage.clear()
                            window.location.reload()
                        }, 3000)
                    }).catch(error => {
                        this.errors = error.response.data.data
                        this.isBusy = false;
                    })
            }
        },
        components: {
            Payment,
            PersonalInformation,
            'address-info' : Address,
            'errors': RequestErrors
        }
    }
</script>
