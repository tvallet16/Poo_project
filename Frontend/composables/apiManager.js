import { ref, onMounted, onUnmounted } from 'vue'

const API_BASE_URL = "http://localhost:8080/api"


export function useApiManager() {

    function initApi() {
    }

    async function apiGET(route) {
        const resp = await fetch(
            `${API_BASE_URL}/${route}`,
            {
                method: 'GET',
            }
        );
        const result = await resp.json()
        console.log(result);

        return result?.data
    }

    async function apiPOST(route, body) {
        const resp = await fetch(
            `${API_BASE_URL}/${route}`,
            {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(body)
            }
        );
        console.log(await resp.json());
    }

    return { initApi, apiGET, apiPOST }
}