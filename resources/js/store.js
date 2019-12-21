import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        first_name: '',
        last_name: '',
        phone_number: '',
        street: '',
        house_number: '',
        zip_code: '',
        city: '',
        iban: '',
        account_owner: ''
    },
    mutations: {
        setState(state, {name, value}){
            state[name] = value
        }
    },
    actions: {
        setState(context, payload){
            context.commit('setState', payload)
        }
    }
})

export default  store