<script setup>
import { Head } from "@inertiajs/vue3";
import ChatTextarea from "@/Components/Chat/ChatTextarea.vue";
import ChatMessages from "@/Components/Chat/ChatMessages.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useMessagesStore } from "@/Store/useMessagesStore";

const props = defineProps({
  room: Object,
});

const messagesStore = useMessagesStore();

const channel = Echo.join(`room.${props.room.id}`);

channel
    .listen('MessageCreated', (e) => {
        messagesStore.pushMessage(e)
    });

messagesStore.fetchState(props.room.slug);  

const storeMessage = (payload) => {
  messagesStore.storeMessage(props.room.slug, payload);
};
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ room.title }}
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-12 gap-6">
        <div
          class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-3"
        >
          <div class="p-6 text-gray-900">Users online</div>
        </div>

        <div
          class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-9"
        >
          <div class="p-6 text-gray-900">
            <ChatMessages :room="room" />

            <ChatTextarea
              v-on:valid="storeMessage({ body: $event })"
              class="w-full"
              placeholder="Aa..."
            />
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
