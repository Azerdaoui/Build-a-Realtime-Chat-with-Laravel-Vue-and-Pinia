<script setup>
    import { useUsersStore } from "@/Store/useUsersStore";

    const usersStore = useUsersStore()
</script>

<template>
    <h2 class="text-lg font-semibold">Users online ({{ usersStore.count  }})</h2>

    <ul class="space-y-1 mt-3">
        <li class="bg-gray-100 rounded-lg px-3 py-1"
            v-for="(user, index) in usersStore.allUsers" :key="index">
            {{ user.name }}
        </li>
    </ul>
</template>
