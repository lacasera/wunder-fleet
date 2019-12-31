import Vuex from 'vuex'
import Vue from 'vue'
import SecureLS from 'secure-ls'
import createPersistedState from 'vuex-persistedstate'

Vue.use(Vuex)
const ls = new SecureLS({ isCompression: false })

const store = new Vuex.Store({
    state: {
        first_name: '',
        last_name: '',
        phone_number: '',
        street: '',
        house_number: '',
        zip_code: '',
        city: '',
        iban: ''
    },
    plugins: [
        createPersistedState({
            storage: {
                getItem: key => ls.get(key),
                setItem: (key, value) => ls.set(key, value),
                removeItem: key => ls.remove(key)
            }
        }),
    ],
    mutations: {
        setState(state, {name, value}){
            state[name] = value
        },
    },
    actions: {
        setState(context, payload){
            context.commit('setState', payload)
        }
    }
})

export default  store