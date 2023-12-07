// mouse.js
import { ref, onMounted, onUnmounted } from "vue";

export interface User {
    name: string;
    price: string;
    bedrooms: string;
    bathrooms: string;
    storeys: string;
    garages: string;
}

export interface Filters {
    [key: string]: string;
    name?: string;
    priceFrom?: string;
    priceTo?: string;
    bedrooms?: string;
    bathrooms?: string;
    storeys?: string;
    garages?: string;
}

const loading = ref(false);
const errorMessage = ref(null);
const users = ref<User[]>([]);

async function fetchUsers(filters: Filters) {
    errorMessage.value = null;
    loading.value = true;

    // imitate long loading
    await new Promise((r) => setTimeout(() => r(true), 1000));

    try {
        var url = new URL(window.location.origin + "/api/users");
        url.search = new URLSearchParams(filters).toString();

        const response = await fetch(url).then((res) => res.json());

        users.value = response?.users || [];
    } catch (e) {
        console.log(e);
        errorMessage.value = e.message;
    } finally {
        loading.value = false;
    }
}

export default function useUserTable() {
    return {
        users,
        loading,
        errorMessage,
        fetchUsers,
    };
}
