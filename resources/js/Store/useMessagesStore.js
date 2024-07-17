import { defineStore } from "pinia";


export const useMessagesStore = defineStore('messages', {
    // state
    state: () => ({
        page: 1,
        messages: []
    }),

    // getters
    getters: {
        allMessages(state) {
            return state.messages
        }
    }
    
    // actions
})