import { defineStore } from "pinia";
import axios from "axios";

export const useMessagesStore = defineStore('messages', {
    state: () => ({
        page: 1,
        messages: []
    }),

    getters: {
        allMessages(state) {
            return state.messages
        }
    },

    actions: {
        fetchState(roomSlug, page = 1) {
            axios.get(`/rooms/${roomSlug}/messages?page=${page}`)
                .then(response => {
                    this.page = response.data.meta.current_page
                    this.messages = [...this.messages, ...response.data.data]
                })
        },

        fetchPreviousState(roomSlug) {
            this.fetchState(roomSlug, this.page + 1)
        }
    },
})
